<?php
include ('db_connection.php');

// SQL query to select data
$sql = "SELECT first_name, last_name,flight_id,seats_to_book, email, phone, address1, address2, city, state, postal_code, country, birth_year, about_you, consent FROM bookings"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="./adminpanel_tour_add.css">
    <link rel="stylesheet" href="./admin_blogadd.css">
    
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
    <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                        <img src="./imges/4.png" style="width: 60px;" alt="">
                        </span>
                        <span class="title">Travel Lanka</span>
                    </a>
                </li>

                <li>
                    <a href="./adminpanel_tour_add.php.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Tour Add</span>
                    </a>
                </li>

                <li>
                    <a href="./adminpanel_benifit.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Benifi ADd</span>
                    </a>
                </li>
                <li>
                    <a href="./adminpanel_blog_add.php">
                        <span class="icon">
                        <img src="./imges/flight_icon.jpg" style="width: 40px;" alt="">
                        </span>
                        <span class="title">Blog Add</span>
                    </a>
                </li>
                <li>
                    <a href="./adminpanel_festival_add.php">
                        <span class="icon">
                        <img src="./imges/sub_icon.jpg" style="width: 40px;" alt="">
                        </span>
                        <span class="title">Festival Add</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon">
                        <img src="./imges/flight_icon.jpg" style="width: 40px;" alt="">
                        </span>
                        <span class="title">Available Flight</span>
                    </a>
                </li>
                
            </ul>
        </div>
        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Add New Blog Image</h2>
                    </div>
                    <div>
                        <?php
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
                                        if ($imageSize <= 5000000) { // Limit image size to 5MB
                                            // Generate a unique name for the image
                                            $imageNewName = uniqid('', true) . '.' . $imageExtension;

                                            // Set image upload directory
                                            $imageUploadPath = 'uploads/' . $imageNewName;

                                            // Move the uploaded image to the server directory
                                            if (move_uploaded_file($imageTmpName, $imageUploadPath)) {
                                                // Insert data into the database
                                                $sql = "INSERT INTO blog_images (title, image, description) VALUES ('$title', '$imageUploadPath', '$description')";
                                                if ($conn->query($sql) === TRUE) {
                                                    echo "<script>alert('Image added successfully!'); window.location.href='adminpanel_blog_add.php';</script>";
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

                            // Handle blog deletion
                            if (isset($_GET['delete_id'])) {
                                $deleteId = $_GET['delete_id'];

                                // Retrieve image path to delete from the server
                                $result = $conn->query("SELECT image FROM blog_images WHERE id = $deleteId");
                                $row = $result->fetch_assoc();

                                if ($row && file_exists($row['image'])) {
                                    unlink($row['image']); // Delete the image file
                                }

                                // Delete the blog entry from the database
                                $deleteSql = "DELETE FROM blog_images WHERE id = $deleteId";
                                if ($conn->query($deleteSql) === TRUE) {
                                    echo "<script>alert('Blog deleted successfully!'); window.location.href='adminpanel_blog_add.php';</script>";
                                } else {
                                    echo "Error deleting blog: " . $conn->error;
                                }
                            }
                        ?>
                        <div class="form-container">
                            <form action="adminpanel_blog_add.php" method="POST" enctype="multipart/form-data">
                                <label for="title">Title:</label>
                                <input type="text" id="title" name="title" required>

                                <label for="image">Image:</label>
                                <input type="file" id="image" name="image" accept="image/*" required>

                                <label for="description">Description:</label>
                                <textarea id="description" name="description" rows="5" required></textarea>

                                <button type="submit" name="submit">Add Image</button>
                            </form>
                        </div>

                        <div class="blog-container">
                            <h2>Uploaded Blogs</h2>
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $result = $conn->query("SELECT * FROM blog_images ORDER BY id DESC");
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>
                                                        <td>{$row['id']}</td>
                                                        <td>{$row['title']}</td>
                                                        <td><img src='{$row['image']}' alt='{$row['title']}' width='100'></td>
                                                        <td>{$row['description']}</td>
                                                        <td>
                                                            <a href='adminpanel_blog_add.php?delete_id={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this blog?');\">Delete</a>
                                                        </td>
                                                    </tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='5'>No blogs found.</td></tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>   
                </div>             
            </div> 
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="main.js"></script>

    <script>
        const userDiv = document.querySelector('.user');

        userDiv.addEventListener('click', function() {
        window.location.href = "logout.php";
        });
    </script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>