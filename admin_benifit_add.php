<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'tour_database');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle image upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $image = $_FILES['image'];
    $imagePath = 'uploads/' . basename($image['name']);

    if (move_uploaded_file($image['tmp_name'], $imagePath)) {
        // Insert image path into database
        $sql = "INSERT INTO binifit_images (image) VALUES ('$imagePath')";
        if ($conn->query($sql) === TRUE) {
            echo "<p style='color:green;'>Image uploaded successfully!</p>";
        } else {
            echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
        }
    } else {
        echo "<p style='color:red;'>Failed to upload image!</p>";
    }
}

// Handle image deletion
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $sql = "SELECT image FROM binifit_images WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imagePath = $row['image'];

        // Delete image file from the server
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Delete record from the database
        $deleteSql = "DELETE FROM binifit_images WHERE id = $id";
        if ($conn->query($deleteSql) === TRUE) {
            echo "<p style='color:green;'>Image deleted successfully!</p>";
        } else {
            echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
        }
    }
}

// Fetch images from the database
$sql = "SELECT * FROM binifit_images ORDER BY created_at DESC";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Images</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            margin-bottom: 30px;
        }
        input[type="file"] {
            display: block;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .image-list {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .image-card {
            position: relative;
            display: inline-block;
        }
        .image-card img {
            width: 150px;
            height: 150px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .delete-button {
            position: absolute;
            top: 5px;
            right: 5px;
            background: #d9534f;
            color: #fff;
            padding: 5px 10px;
            font-size: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .delete-button:hover {
            background: #c9302c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Panel - Manage Images</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="image">Upload Image:</label>
            <input type="file" name="image" id="image" required>
            <input type="submit" value="Upload">
        </form>

        <h2>Uploaded Images</h2>
        <div class="image-list">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="image-card">';
                    echo '<img src="' . htmlspecialchars($row['image']) . '" alt="Image">';
                    echo '<a href="?delete=' . $row['id'] . '">';
                    echo '<button class="delete-button">Delete</button>';
                    echo '</a>';
                    echo '</div>';
                }
            } else {
                echo "<p>No images uploaded yet.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>
