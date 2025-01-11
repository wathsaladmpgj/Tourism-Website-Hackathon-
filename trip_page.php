<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "tour_database");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$detailsOutput = ""; // Initialize output for details
$plainId = isset($_GET['plain_id']) ? intval($_GET['plain_id']) : 0;

// Get plain name and multiple location details from database
$plainName = "";
$days = 0;
$locationDetails = [];

// First get the plain name
$query = "SELECT pn.Plain_name,p.Days
          FROM plain p 
          LEFT JOIN plain_name pn ON p.Plain_name_id = pn.id 
          WHERE p.id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $plainId);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $row = $result->fetch_assoc()) {
    $plainName = strtolower($row['Plain_name']);
    $days = intval($row['Days']);
}
$stmt->close();

// Get all location IDs for this plain
if ($plainId > 0) {
    $query = "SELECT Loc1, Loc2, Loc3, Loc4, Loc5, Loc6, Loc7, Loc8, Loc9,Loc10 
              FROM plain 
              WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $plainId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        // For each Loc column, get the location details if it's not 0
        for ($i = 1; $i <= 10; $i++) {
            $locId = $row["Loc$i"];
            if ($locId > 0) {
                // Get location details for this Loc_id
                $locQuery = "SELECT Loc_name, Details, Image 
                            FROM location 
                            WHERE Loc_id = ?";
                $locStmt = $conn->prepare($locQuery);
                $locStmt->bind_param("i", $locId);
                $locStmt->execute();
                $locResult = $locStmt->get_result();
                if ($locData = $locResult->fetch_assoc()) {
                    // Only add if image URL is not empty
                    if (!empty($locData['Image'])) {
                        $locationDetails[] = [
                            'name' => $locData['Loc_name'],
                            'details' => $locData['Details'],
                            'image' => $locData['Image']
                        ];
                    }
                }
                $locStmt->close();
            }
        }
    }
    $stmt->close();
}

// Initialize variables
$type = '';
$row = null;
$vehicle = '';
$adultCount = 0;
$childCount = 0;
$breakfastCount = 0;
$dinnerCount = 0;
$guideType = '';
$total_price = 0;
$guide_price = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $plainId = intval($_POST['plain_id']);
    $vehicle = strtolower(trim($_POST['vehicle']));
    $breakfastCount = intval($_POST['breakfastCount']);
    $dinnerCount = intval($_POST['dinnerCount']);
    $type = $_POST['type'];
    $guideType = $_POST['guide_type'];
    
    // Calculate adults and children based on type or form input
    $adultCount = 1; // Default
    $childCount = 0; // Default
    
    if ($type === 'individual') {
        $adultCount = 1;
    } elseif ($type === 'couple') {
        $adultCount = 2;
    } else {
        // For family and group, use the input values
        $adultCount = intval($_POST['adultCount']);
        $childCount = intval($_POST['childCount']);
    }

    // Allowed vehicle columns
    $query = "SELECT p.id, pn.Plain_name
             FROM plain p 
             LEFT JOIN plain_name pn ON p.Plain_name_id = pn.id 
             WHERE p.id = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $plainId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
}

/*--------Calculate price-------*/
$all_price_breakfast = 0;
$all_price_dinner = 0;
$all_human_guide = 0;
$all_ai_guide = 0;
$all_price_accommodation = 0;
$vehicle_price = 0;

$price_query = "SELECT * FROM price";
$price_result = $conn->query($price_query);
if($price_result->num_rows == 1) {
    $price = $price_result->fetch_assoc();

    $price_breakfast = $price['breakfast'];
    $price_dinner = $price['dinner'];
    $price_human_guide = $price['human_guide'];
    $price_ai_guide = $price['ai_guide'];
    $price_accommodation = $price['accommodation'];

    $price_bicycle = $price['bic'];
    $price_car = $price['car'];
    $price_van = $price['van'];
    $price_tuktuk = $price['tuktuk'];

    // Calculate meal prices
    $all_price_breakfast = $price_breakfast * $breakfastCount * ($adultCount + $childCount/2);
    $all_price_dinner = $price_dinner * $dinnerCount * ($adultCount + $childCount/2);
    
    // Calculate guide price based on selection
    if ($guideType === 'human') {
        $guide_price = $price_human_guide * $days;
    } else if ($guideType === 'ai') {
        $guide_price = $price_ai_guide * $days;
    }

    if ($vehicle === 'bic') {
        $vehicle_price = $price_bicycle * $days;
    } else if ($vehicle === 'car') {
        $vehicle_price = $price_car * $days;
    } else if ($vehicle === 'van') {
        $vehicle_price = $price_van * $days;
    } else if ($vehicle === 'tuktuk') {
        $vehicle_price = $price_tuktuk * $days;
    }
    
    // Calculate accommodation
    $all_price_accommodation = $price_accommodation * ($days-1) * ($adultCount + $childCount/2);

    // Calculate total price
    $total_price = $all_price_breakfast + $all_price_dinner + $guide_price + $all_price_accommodation + $vehicle_price;
}

session_start();
// Check if 'form_token' is set in the session
if (!isset($_SESSION['form_token'])) {
    $_SESSION['form_token'] = bin2hex(random_bytes(32)); // Generate a new token if it doesn't exist
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Vehicle Selection</title>
    <link rel="stylesheet" href="./trip_page.css">
    <link rel="stylesheet" href="./nav_fotter.css">
</head>
<body>
<nav class="navbar">
      <ul class="nav-links">
          <li><a href="./home_page.php">Home</a></li>
          <li><a href="./destination_page_1.html">Destination</a></li>
          <li class="nav-item">
            <a href="#">Activities</a>
            <ul>
                <li><a href="./adventure.php">Adventure</a></li>
                <li><a href="./relaxation.html">Relaxation</a></li>
                <li><a href="./cultrul.html">Cultural </a></li>
            </ul>
          </li>
          <li><a href="#">Foods</a></li>
          <li><a href="#">Festival</a></li>
          <li><a href="#">Hotel</a></li>
          <li><a href="#">Plan Your Trip</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="">Benifit</a></li>
      </ul>
    </nav>
    <div class="container">
        <!-- Dynamic Slider -->
        <div>
            <div class="slider">
                <!-- list Items -->
                <div class="list">
                    <?php foreach ($locationDetails as $index => $location): ?>
                        <div class="item <?php echo $index === 0 ? 'active' : ''; ?>">
                            <img src="<?php echo htmlspecialchars($location['image']); ?>" 
                                 alt="<?php echo htmlspecialchars($location['name']); ?>"
                                 onerror="this.src='image/placeholder.jpg'">
                            <div class="content">
                                <p>Location <?php echo $index + 1; ?><p>
                                <h2><?php echo htmlspecialchars($location['name']); ?></h2>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- button arrows -->
                <div class="arrows">
                    <button id="prev"><</button>
                    <button id="next">></button>
                </div>
                <!-- thumbnail -->
                <div class="thumbnail">
                    <?php foreach ($locationDetails as $index => $location): ?>
                        <div class="item <?php echo $index === 0 ? 'active' : ''; ?>">
                            <img src="<?php echo htmlspecialchars($location['image']); ?>"
                                 alt="<?php echo htmlspecialchars($location['name']); ?>"
                                 onerror="this.src='image/placeholder.jpg'">
                            <div class="content">
                                <?php echo htmlspecialchars($location['name']); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="details-container">
              <?php if (isset($row)): ?>
                <table class="details-table">
                    <thead>
                        <tr>
                            <th>Plain ID</th>
                            <th>Plain Name</th>
                            <th>Days</th>
                            <th>Type</th>
                            <th>Adults</th>
                            <th>Children</th>
                            <th>Vehicle</th>
                            <th>Guide type</th>
                            <th>Breakfast Meals</th>
                            <th>Dinner Meals</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo htmlspecialchars($plainId); ?></td>
                            <td><?php echo htmlspecialchars($row['Plain_name']); ?></td>
                            <td><?php echo htmlspecialchars($days); ?></td>
                            <td><?php echo htmlspecialchars(ucfirst($type)); ?></td>
                            <td><?php echo htmlspecialchars($adultCount); ?></td>
                            <td><?php echo htmlspecialchars($childCount); ?></td>
                            <td><?php echo ucfirst($vehicle); ?></td>
                            <td><?php echo htmlspecialchars($guideType); ?></td>
                            <td><?php echo htmlspecialchars($breakfastCount); ?></td>
                            <td><?php echo htmlspecialchars($dinnerCount); ?></td>
                        </tr>
                    </tbody>
                </table>
              <?php else: ?>
                <div class="no-data">Please submit the form to view details</div>
              <?php endif; ?>

              <!-- Simple Location List -->
              
                <div class="timeline">
                    <h3 class="timeline_start">Tour Start</h3>
                    <div class="timeline-line"></div>
                        <?php if (!empty($locationDetails)): ?>
                            <?php foreach ($locationDetails as $index => $location): ?>
                                <div class="timeline-item">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">
                                        <h3 class="timeline-title">
                                            <?php echo htmlspecialchars($location['name']); ?>
                                            <span class="timeline-arrow" data-index="<?php echo $index; ?>">↓</span>
                                        </h3>
                                        <div class="timeline-details" id="details-<?php echo $index; ?>">
                                            <p><?php echo htmlspecialchars($location['details']); ?></p>
                                            <?php if (!empty($location['image'])): ?>
                                                <img class="timeline-image" 
                                                    src="<?php echo htmlspecialchars($location['image']); ?>"
                                                    alt="<?php echo htmlspecialchars($location['name']); ?>"
                                                    onerror="this.style.display='none'">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                        <p>No locations found for this tour.</p>
                        <?php endif; ?>
                    <h3 class="timeline_end">Tour End</h3>
                </div>
            </div>
            <?php
                if($guideType === 'ai') { ?>
                    <h1>heloo</h1>
            <?php } ?>
        </div>
        <!-- Form for selecting details-->
        <div class="Details_enter">
            <form id="vehicleForm" method="POST" action="">
            <div class="form-group">
                <label for="type">Select Type:</label>
                <select id="type" name="type" required>
                    <?php if ($plainName === 'honeymoon tour'): ?>
                        <option value="couple">Couple</option>
                    <?php else: ?>
                        <option value="">Choose an option</option>
                        <option value="individual">Individual</option>
                        <option value="couple">Couple</option>
                        <option value="family">Family</option>
                        <option value="group">Group</option>
                    <?php endif; ?>
                </select>
            </div>

            <div id="peopleCount" class="form-group hidden">
                <label for="adultCount">Number of Adults:</label>
                <input type="number" id="adultCount" name="adultCount" min="1">
                <label for="childCount">Number of Children:</label>
                <input type="number" id="childCount" name="childCount" min="0">
            </div>

            <div id="vehicleOptions" class="form-group">
                <label for="vehicle">Select Vehicle:</label>
                <select id="vehicle" name="vehicle" required>
                    <option value="">Select a vehicle</option>
                </select>
            </div>

            <div class="form-group">
                <label for="guide_type">Select Guide Type:</label>
                <select id="guide_type" name="guide_type" required>
                    <option value="">Select a guide type</option>
                    <option value="human">Human Guide</option>
                    <option value="ai">AI Guide</option>
                </select>
            </div>

            <div class="form-group">
                <label for="breakfastCount">Number of Breakfast Meals:</label>
                <input type="number" id="breakfastCount" name="breakfastCount" min="0">
            </div>

            <div class="form-group">
                <label for="dinnerCount">Number of Dinner Meals:</label>
                <input type="number" id="dinnerCount" name="dinnerCount" min="0">
            </div>

            <input type="hidden" name="plain_id" value="<?php echo $plainId; ?>">
            <button type="submit">Submit</button>
           </form>

           <div class="price-section">
            <h1>Price : $<?php echo htmlspecialchars($total_price); ?> </h1>
            <button class="book-button" onclick="showModal()">Booking Your Tour</button>
           </div>
        </div>
    </div>

    <div class="modal" id="bookingModal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2>Book Your Tour</h2>
            <form method="POST" action="./down_pdf.php" enctype="multipart/form-data">
            <input type="hidden" name="form_token" value="<?php echo $_SESSION['form_token']; ?>">
                <h3>Card Details</h3>
                <div class="from-sec">
                    <div class="form-group">
                        <label>Account Number</label>
                        <input type="number" name="account_number" required>
                    </div>
                    <div class="form-group">
                        <label>Exp Date</label>
                        <input type="text" name="exp_date" placeholder="MM/YY" required>
                    </div>
                </div>
                <div class="from-sec">
                    <div class="form-group">
                        <label>CVV</label>
                        <input type="text" name="cvv" maxlength="4" required>
                    </div>
                    <div class="form-group">
                        <label>Payment Price</label>
                        <select name="payment_type" id="payment_type" required>
                            <option value="Full Payment">Full Payment</option>
                            <option value="Half Payment">Half Payment</option>
                        </select>
                    </div>
                </div>
                <h3>Personal Details</h3>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="customer_name" name="customer_name" required>
                </div>
                <div class="from-sec">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="tel" name="phone" id="phpne">
                    </div>
                </div>
                <div class="from-sec">
                    <div class="form-group">
                        <label for="travel_date">Travel Date:</label>
                        <input type="date" id="travel_date" name="travel_date">
                    </div>
                    <div class="form-group">
                        <label for="image">Uplod image</label>
                        <input type="file" name="profile_image" id="profile_image" accept="image/*" required>
                    </div>
                </div>
                <input type="number" id="travel_duration" name="travel_duration" value="<?php echo $days; ?>" hidden>
                <button type="submit" class="book-button">Confirm Booking</button>
            </form>  
        </div>
    </div>

    <script src="./trip.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
    const travelDateInput = document.querySelector('input[name="travel_date"]');
    if (travelDateInput) {
        const today = new Date(); // Get today's date
        const minDate = new Date(today); 
        minDate.setDate(today.getDate() + 3); // Add 3 days to today's date

        // Format the date as YYYY-MM-DD
        const year = minDate.getFullYear();
        const month = String(minDate.getMonth() + 1).padStart(2, '0'); // Ensure 2-digit month
        const day = String(minDate.getDate()).padStart(2, '0'); // Ensure 2-digit day

        // Set the 'min' attribute for the input
        travelDateInput.min = `${year}-${month}-${day}`;
        console.log(`Minimum date set: ${travelDateInput.min}`); // Debugging information
    }
});
    </script>
</body>
</html>


