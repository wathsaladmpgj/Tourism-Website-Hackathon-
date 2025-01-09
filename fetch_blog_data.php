<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'tour_database');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the latest blogs (e.g., 3 entries)
$sql = "SELECT id, image, title FROM blog_images ORDER BY id DESC LIMIT 3";
$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'id' => $row['id'],
            'imagePath' => $row['image'], // Assuming 'image' stores the file path
            'title' => $row['title']
        ];
    }
}

$conn->close();

// Output the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
