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
$locationDetails = [];

// First get the plain name
$query = "SELECT pn.Plain_name 
          FROM plain p 
          LEFT JOIN plain_name pn ON p.Plain_name_id = pn.id 
          WHERE p.id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $plainId);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $row = $result->fetch_assoc()) {
    $plainName = strtolower($row['Plain_name']);
}
$stmt->close();

// Get all location IDs for this plain
if ($plainId > 0) {
    $query = "SELECT Loc1, Loc2, Loc3, Loc4, Loc5, Loc6, Loc7, Loc8, Loc9 
              FROM plain 
              WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $plainId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        // For each Loc column, get the location details if it's not 0
        for ($i = 1; $i <= 9; $i++) {
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

// Rest of your variables initialization
$type = '';
$row = null;
$vehicle = '';
$adultCount = 0;
$childCount = 0;
$breakfastCount = 0;
$dinnerCount = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $plainId = intval($_POST['plain_id']);
    $vehicle = strtolower(trim($_POST['vehicle']));
    $breakfastCount = intval($_POST['breakfastCount']);
    $dinnerCount = intval($_POST['dinnerCount']);
    $type = $_POST['type'];
    
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
    $allowedVehicles = ['bic', 'car', 'van', 'tuktuk'];

    if (in_array($vehicle, $allowedVehicles)) {
        // Join with Plain name table to get plain_name
        $query = "SELECT p.id, pn.Plain_name, p.$vehicle 
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
}
/*--------Calulate price-------*/
$all_price_breakfast=0;
$price_query = "SELECT * FROM price";
$price_result = $conn->query($price_query);
if($price_result->num_rows == 1){
    $price = $price_result->fetch_assoc();

    $price_breakfast = $price['breakfast'];
    $price_dinner = $price['dinner'];
    $price_human_guide= $price['human_guide'];
    $price_ai_guide = $price['ai_guide'];
    $price_accommodation= $price['accommodation'];

    $all_price_breakfast = $price_breakfast*$breakfastCount*($adultCount+$childCount/2);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Vehicle Selection</title>
    <link rel="stylesheet" href="./trip_page.css">
    <style>
        .slider .list .item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .thumbnail .item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>
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
                                <p><?php echo htmlspecialchars($location['name']); ?></p>
                                <h2>Location <?php echo $index + 1; ?></h2>
                                <p><?php echo htmlspecialchars($location['details']); ?></p>
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
                            <th>Type</th>
                            <th>Adults</th>
                            <th>Children</th>
                            <th>Vehicle</th>
                            <th>Value</th>
                            <th>Breakfast Meals</th>
                            <th>Dinner Meals</th>
                            <th>Breakfast pice</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo htmlspecialchars($plainId); ?></td>
                            <td><?php echo htmlspecialchars($row['Plain_name']); ?></td>
                            <td><?php echo htmlspecialchars(ucfirst($type)); ?></td>
                            <td><?php echo htmlspecialchars($adultCount); ?></td>
                            <td><?php echo htmlspecialchars($childCount); ?></td>
                            <td><?php echo ucfirst($vehicle); ?></td>
                            <td><?php echo htmlspecialchars($row[$vehicle]); ?></td>
                            <td><?php echo htmlspecialchars($breakfastCount); ?></td>
                            <td><?php echo htmlspecialchars($dinnerCount); ?></td>
                            <td><?php echo htmlspecialchars($all_price_breakfast); ?></td>
                        </tr>
                    </tbody>
                </table>
              <?php else: ?>
                <div class="no-data">Please submit the form to view details</div>
              <?php endif; ?>

              <!-- Simple Location List -->
              <h3>Tour Locations</h3>
              <div class="location-list">
                   <?php if (!empty($location['name'])): ?>
                      <p><?php echo htmlspecialchars($location['name']); ?></p>
                   <?php else: ?>
                       <p>No locations found for this tour.</p>
                   <?php endif; ?>
              </div>
            </div>
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
                <label for="breakfastCount">Number of Breakfast Meals:</label>
                <input type="number" id="breakfastCount" name="breakfastCount" min="0" required>
            </div>

            <div class="form-group">
                <label for="dinnerCount">Number of Dinner Meals:</label>
                <input type="number" id="dinnerCount" name="dinnerCount" min="0" required>
            </div>

            <input type="hidden" name="plain_id" value="<?php echo $plainId; ?>">
            <button type="submit">Submit</button>
           </form>
        </div>
    </div>

    

    <script src="./trip.js"></script>
</body>
</html>