<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "tour_database");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
</head>
<body>
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
</body>
</html>
