<?php
// Database connection
include ('db_connection.php');

// Handle Delete Request
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete_sql = "DELETE FROM location WHERE Loc_id=$id";
    $conn->query($delete_sql);
    header("Location: admin_locationadd.php");
    exit;
}

// Handle Update Request
if (isset($_POST['update'])) {
    $id = $_POST['Loc_id'];
    $Loc_name = $conn->real_escape_string($_POST['Loc_name']);
    $Details = $conn->real_escape_string($_POST['Details']);
    $Image = $conn->real_escape_string($_POST['Image']);
    
    $update_sql = "UPDATE location SET Loc_name='$Loc_name', Details='$Details', Image='$Image' WHERE Loc_id=$id";
    $conn->query($update_sql);
    header("Location: admin_locationadd.php");
    exit;
}

// Handle Add Request
if (isset($_POST['add'])) {
    $Loc_name = $conn->real_escape_string($_POST['Loc_name']);
    $Details = $conn->real_escape_string($_POST['Details']);
    $Image = $conn->real_escape_string($_POST['Image']);
    
    $add_sql = "INSERT INTO location (Loc_name, Details, Image) VALUES ('$Loc_name', '$Details', '$Image')";
    $conn->query($add_sql);
    header("Location: admin_locationadd.php");
    exit;
}

// Fetch all records
$sql = "SELECT * FROM location";
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
    <link rel="stylesheet" href="./admin_locationadd.css">
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
                    <a href="./adminpanel_tour_add.php">
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
        <h1>Admin Panel - Manage Locations</h1>

<!-- Add Form -->
<form action="admin_locationadd.php" method="POST">
    <h3>Add New Location</h3>
    <label for="Loc_name">Location Name:</label>
    <input type="text" id="Loc_name" name="Loc_name" required>
    
    <label for="Details">Details:</label>
    <textarea id="Details" name="Details" rows="4" required></textarea>
    
    <label for="Image">Image URL:</label>
    <input type="text" id="Image" name="Image" required>
    
    <button type="submit" name="add">Add Location</button>
</form>

<!-- Table for Display -->
<table>
    <thead>
        <tr>
            <th>Loc_id</th>
            <th>Loc_name</th>
            <th>Details</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['Loc_id']; ?></td>
                    <td><?php echo $row['Loc_name']; ?></td>
                    <td><?php echo $row['Details']; ?></td>
                    <td><img src="<?php echo $row['Image']; ?>" alt="Image" style="width: 100px; height: auto;"></td>
                    <td>
                        <!-- Update Button -->
                        <form action="admin_locationadd.php" method="POST" style="display: inline-block;">
                            <input type="hidden" name="Loc_id" value="<?php echo $row['Loc_id']; ?>">
                            <input type="text" name="Loc_name" value="<?php echo $row['Loc_name']; ?>" required>
                            <textarea name="Details" rows="2"><?php echo $row['Details']; ?></textarea>
                            <input type="text" name="Image" value="<?php echo $row['Image']; ?>" required>
                            <button type="submit" name="update" class="update">Update</button>
                        </form>
                        <!-- Delete Button -->
                        <a href="admin_locationadd.php?delete=<?php echo $row['Loc_id']; ?>" onclick="return confirm('Are you sure?')">
                            <button type="button" class="delete">Delete</button>
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No records found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
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