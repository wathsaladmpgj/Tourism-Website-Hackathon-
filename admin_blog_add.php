<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'tour_database');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if (isset($_POST['submit'])) {
    // Get form data
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);

    // Image upload handling
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $imageError = $_FILES['image']['error'];
    $imageType = $_FILES['image']['type'];

    // Check if the image is valid (i.e., no errors and image type is allowed)
    if ($imageError === 0) {
        $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($imageExtension, $allowedExtensions)) {
            if ($imageSize <= 5000000) {  // Limit image size to 5MB
                // Generate a unique name for the image
                $imageNewName = uniqid('', true) . '.' . $imageExtension;

                // Set image upload directory
                $imageUploadPath = 'uploads/' . $imageNewName;

                // Move the uploaded image to the server directory
                if (move_uploaded_file($imageTmpName, $imageUploadPath)) {
                    // Insert data into the database
                    $sql = "INSERT INTO blog_images (title, image, description) VALUES ('$title', '$imageUploadPath', '$description')";
                    if ($conn->query($sql) === TRUE) {
                        echo "<script>alert('Image added successfully!'); window.location.href='admin_blog_add.php';</script>";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "Error uploading the image.";
                }
            } else {
                echo "Image size is too large. Maximum size is 5MB.";
            }
        } else {
            echo "Invalid image format. Allowed formats are jpg, jpeg, png, and gif.";
        }
    } else {
        echo "There was an error uploading your image.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Add Blog Image</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .form-container {
            width: 60%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }
        .form-container input[type="text"],
        .form-container textarea,
        .form-container input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
        }
        .form-container button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add New Blog Image</h2>
        <form action="admin_blog_add.php" method="POST" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="5" required></textarea>

            <button type="submit" name="submit">Add Image</button>
        </form>
    </div>
</body>
</html>
