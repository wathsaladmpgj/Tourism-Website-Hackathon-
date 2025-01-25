<?php
include ('db_connection.php');

// Fetch event data
$sql = "SELECT event_name, event_date FROM events";
$result = $conn->query($sql);

$events = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($events);

$conn->close();
?>
