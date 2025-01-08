<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'tour_database');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the latest 3 blog entries (only image and title)
$result = $conn->query("SELECT image, title FROM blog_images ORDER BY id DESC LIMIT 3");

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'imagePath' => $row['image'],  // Assuming 'image' is the column storing the image path
            'title' => $row['title']      // Assuming 'title' column exists
        ];
    }
} else {
    // If no blog entries are found, set default values
    $data[] = [
        'imagePath' => 'images/default-image.jpg',  // Path to your default image
        'title' => 'No Blogs Available'
    ];
}

$conn->close();

// Output the data as JSON
echo json_encode($data);
?>
