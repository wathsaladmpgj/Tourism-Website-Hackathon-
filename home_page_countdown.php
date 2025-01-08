<?php
// Database connection
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'tour_database';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
