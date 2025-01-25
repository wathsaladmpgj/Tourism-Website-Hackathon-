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
    <link rel="stylesheet" href="./adminpanel_benifit.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
    <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="title">Travel Lannka</span>
                    </a>
                </li>

                <li>
                    <a href="./adminpanel_tour_add.php.php">
                        <span class="title">Tour Add</span>
                    </a>
                </li>

                <li>
                    <a href="./adminpanel_benifit.php">
                        <span class="title">Benifit Add</span>
                    </a>
                </li>
                <li>
                    <a href="./adminpanel_blog_add.php">
                        <span class="title">Blog Add</span>
                    </a>
                </li>
                <li>
                    <a href="./adminpanel_festival_add.php">
                        <span class="title">Festival Add</span>
                    </a>
                </li>
                <li>
                    <a href="./admin_locationadd.php">
                        <span class="title">Location Add</span>
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
                        <h2>Manege Image</h2>
                    </div>
                    <div class="container">
                        <?php
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