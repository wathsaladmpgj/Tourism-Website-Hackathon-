<?php
// Database connection
include ('db_connection.php');
// Fetch all plain names for dropdown
$plainNameQuery = "SELECT * FROM plain_name";
$plainNames = $conn->query($plainNameQuery);

// Initialize variables
$days = [];
$groupedLocations = [];
$selectedPlainId = null;
$selectedDay = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['plain_id'])) {
        $selectedPlainId = intval($_POST['plain_id']);

        // Query to fetch days for the selected plain
        $daysQuery = "SELECT DISTINCT Days FROM plain WHERE Plain_name_id = $selectedPlainId";
        $daysResult = $conn->query($daysQuery);

        if ($daysResult) {
            while ($row = $daysResult->fetch_assoc()) {
                $days[] = $row['Days'];
            }
        } else {
            die("Error fetching days: " . $conn->error);
        }
    }

    if (isset($_POST['day']) && isset($selectedPlainId)) {
        $selectedDay = $_POST['day'];

        // Query to fetch location details grouped by each related plain
        $locationsQuery = "SELECT plain.id AS plain_id, plain.image AS plain_image, location.Loc_name, location.Details, location.Image
                           FROM plain
                           JOIN location ON location.Loc_id IN (plain.Loc1, plain.Loc2, plain.Loc3, plain.Loc4, plain.Loc5, plain.Loc6, plain.Loc7, plain.Loc8, plain.Loc9)
                           WHERE plain.Days = '$selectedDay' AND plain.Plain_name_id = $selectedPlainId
                           ORDER BY plain.id";

        $locationsResult = $conn->query($locationsQuery);

        if ($locationsResult) {
            while ($row = $locationsResult->fetch_assoc()) {
                $groupedLocations[$row['plain_id']][] = $row; // Group locations by plain ID
            }
        } else {
            die("Error fetching locations: " . $conn->error);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Details</title>
    <link rel="stylesheet" href="./plain_your_trip.css">
    <link rel="stylesheet" href="./nav_fotter.css">
</head>
<body>
    <?php include("./navigation.html") ?>
    <section class="hero">
    <div class="hero_select">
        <div class="one_select">
             <h2>Select a Plain</h2>
            <form method="POST" action="">
                <label for="plain_id">Plain:</label>
                <select name="plain_id" id="plain_id" onchange="this.form.submit()">
                   <option value="">Select a Plain</option>
                   <?php while ($plain = $plainNames->fetch_assoc()): ?>
                   <option value="<?= $plain['id']; ?>" <?= isset($selectedPlainId) && $selectedPlainId == $plain['id'] ? 'selected' : '' ?>>
                        <?= $plain['Plain_name']; ?>
                   </option>
                   <?php endwhile; ?>
                </select>
            </form>
        </div>
        <div class="one_select">
            <h2>Select a Day</h2>
            <form method="POST" action="">
                <input type="hidden" name="plain_id" value="<?= $selectedPlainId; ?>">
                <label for="day">Day:</label>
                <select name="day" id="day" onchange="this.form.submit()">
                     <option value="">Select a Day</option>
                     <?php foreach ($days as $day): ?>
                     <option value="<?= $day; ?>" <?= isset($selectedDay) && $selectedDay == $day ? 'selected' : '' ?>>
                     <?= $day; ?>
                     </option>
                     <?php endforeach; ?>
                </select>
            </form>
        </div>
    </div>
    </section>
    

    <?php if (!empty($groupedLocations)): ?>
        <h2>Location Details</h2>
        <section class="card-section">
        <div class="card-container">
        <?php foreach ($groupedLocations as $plainId => $locations): ?>
            <div class="card">
                <h3>Plain ID: <?= $plainId; ?></h3>
                <div class="card_image">
                    <?php 
                    // Fetch the plain's image
                    $plainImage = $locations[0]['plain_image'];
                    if ($plainImage): ?>
                        <img src="<?= $plainImage; ?>" alt="Plain Image" style="width:100%; height:200px;">
                    <?php endif; ?>
                </div>
                <div class="card_location">
                    <h4>Location:</h4>
                    <p>
                        <?php
                        $locationNames = array_map(function ($location) {
                            return $location['Loc_name'];
                        }, $locations);
                        echo implode(', ', $locationNames); // Display location names separated by commas
                        ?>
                    </p>
                </div>
                <a href="trip_page.php?plain_id=<?= $plainId; ?>" target="_blank">
                    <button class="card-button">View More</button>
                </a>
            </div>
            
        <?php endforeach; ?>
        </div>
        </section>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($selectedDay)): ?>
        <p>No locations available for the selected day.</p>
    <?php endif; ?>


    <section class="details">
        <div>
            <h2>Choose Your Travel Type</h2>
            <div class="travel-type">
                <div class="travel-type-details">
                    <p>Individual: Adventure-focused or budget-friendly options.</p>
                    <img src="./images/tour_plain/tour_tp1.png" alt="Travel Type 1">
                </div>
                <div class="travel-type-details">
                    <p>Couple: Romantic escapes, private tours, and serene locations.</p>
                    <img src="./images/tour_plain/tour_tp2.png" alt="Travel Type 1">
                </div>
                <div class="travel-type-details">
                    <p>Family: Kid-friendly activities, spacious accommodations, and balanced itineraries.</p>
                    <img src="./images/tour_plain/tour_tp3.png" alt="Travel Type 1">
                </div>
                <div class="travel-type-details">
                    <p>Group: Special discounts and larger accommodations.</p>
                    <img src="./images/tour_plain/tour_tp4.png" alt="Travel Type 1">
                </div>
            </div>
        </div>

        <div>
            <h2> Pick Your Guide Type</h2>
            <table class="guide-table">
                <tr class="table-header">
                    <th>Guide Type</th>
                    <th>Details</th>
                </tr>
                <tr class="table-row">
                    <td>Local Guide (Human)</td>
                    <td>Experience authentic Sri Lankan culture and traditions with a local guide. Gain insights into the country's history, customs, and hidden gems.</td>
                </tr>
                <tr class="table-row">
                    <td>Adventure Guide (Human)</td>
                    <td>Embark on thrilling adventures with an expert adventure guide. Explore Sri Lanka's natural wonders, wildlife, and adrenaline-pumping activities.</td>
                </tr>
                <tr class="table-row">
                    <td>Historical Guide (Human)</td>
                    <td>Discover Sri Lanka's rich history and heritage with a knowledgeable historical guide. Visit ancient sites, temples, and monuments with fascinating stories.</td>
                </tr>
                <tr class="table-row">
                    <td>Wildlife Guide (Human)</td>
                    <td>Encounter Sri Lanka's diverse wildlife and ecosystems with a wildlife guide. Spot rare species, go birdwatching, and explore national parks with expert guidance.</td>
                </tr>
                <tr class="table-row">
                    <td>AI Guide</td>
                    <td>Cost-effective, 24/7 support, real-time updates, and navigation. <b>We provide a mobile ai agent app. After paying for the tour, you can log into the app using the ID you receive.</b> </td>
                </tr>
            </table>
        </div>

        <div class="vehicle">
            <h2>Select Vehicle Options</h2>
            <div class="vehicle-details">
                <div class="vehicle-option">
                    <img src="./images/tour_plain/tour_tp4.png" alt="Travel Type 1">
                    <p>Bike: Comfortable and stylish for city tours and short distances.</p>
                </div>
                <div class="vehicle-option">
                    <img src="./images/tour_plain/tour_tp4.png" alt="Travel Type 1">
                    <p>Tuktuk:For adventurous individual travelers or couples</p>
                </div>
                <div class="vehicle-option">
                    <img src="./images/tour_plain/tour_tp4.png" alt="Travel Type 1">
                    <p>Car : Ideal for couples or small families.</p>
                </div>
                <div class="vehicle-option">
                    <img src="./images/tour_plain/tour_tp4.png" alt="Travel Type 1">
                    <p>Van/Minibus:Best for groups or larger families.</p>
                </div>
            </div>
        </div>

        <div>
            <h2> Add Meals</h2>
            <table class="meals-table">
                <tr class="tb-row">
                    <th>Breakfast and Dinner</th>
                    <th>Self-Catering</th>
                    <th>Barbecue Experience</th>
                </tr>
                <tr class="tb-row">
                    <td>Enjoy a hearty breakfast and a satisfying dinner at your accommodation, featuring a mix of local and international cuisines.</td>
                    <td>Stay at accommodations equipped with kitchen facilities, perfect for preparing your own meals with fresh, local ingredients</td>
                    <td>Savor a unique barbecue experience under the stars, complete with fresh seafood or marinated meats, grilled to perfection.</td>
                </tr>
            </table>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>
