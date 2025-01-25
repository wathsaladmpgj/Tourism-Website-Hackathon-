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
    
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
    <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="title">Travel Lanka</span>
                    </a>
                </li>

                <li>
                    <a href="./adminpanel_tour_add.php.php">
                        <span class="title">Tour Add</span>
                    </a>
                </li>

                <li>
                    <a href="./adminpanel_benifit.php">
                        <span class="title">Benifi ADd</span>
                    </a>
                </li>
                <li>
                    <a href="./adminpanel_blog_add.php">
                        <span class="icon">
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
                        <h2>Tour plain design</h2>
                    </div>
                    <div>
                        <?php
                            // Fetch plain names for the dropdown
                            $plainNameQuery = "SELECT * FROM plain_name";
                            $plainNames = $conn->query($plainNameQuery);

                            // Handle form submissions
                            $message = "";

                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $action = $_POST['action'];

                                // Validate inputs
                                $plainNameId = isset($_POST['Plain_name_id']) ? intval($_POST['Plain_name_id']) : 0;
                                $days = isset($_POST['Days']) ? intval($_POST['Days']) : 0;
                                $locs = [];
                                for ($i = 1; $i <= 10; $i++) {
                                    $locs[] = isset($_POST["loc$i"]) ? intval($_POST["loc$i"]) : 0;
                                }

                                if ($action === 'insert') {
                                    // Insert new record
                                    $insertQuery = "
                                        INSERT INTO plain (Plain_name_id, Days, loc1, loc2, loc3, loc4, loc5, loc6, loc7, loc8, loc9, loc10)
                                        VALUES ($plainNameId, $days, " . implode(", ", $locs) . ")";
                                    if ($conn->query($insertQuery)) {
                                        $message = "Record added successfully!";
                                    } else {
                                        $message = "Error adding record: " . $conn->error;
                                    }
                                } elseif ($action === 'update') {
                                    // Update an existing record
                                    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
                                    if ($id > 0) {
                                        $updateQuery = "
                                            UPDATE plain
                                            SET Plain_name_id = $plainNameId, Days = $days, loc1 = $locs[0], loc2 = $locs[1], loc3 = $locs[2], loc4 = $locs[3], loc5 = $locs[4], loc6 = $locs[5], loc7 = $locs[6], loc8 = $locs[7], loc9 = $locs[8], loc10 = $locs[9]
                                            WHERE id = $id";
                                        if ($conn->query($updateQuery)) {
                                            $message = "Record updated successfully!";
                                        } else {
                                            $message = "Error updating record: " . $conn->error;
                                        }
                                    } else {
                                        $message = "Invalid ID for update.";
                                    }
                                } elseif ($action === 'delete') {
                                    // Delete a record
                                    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
                                    if ($id > 0) {
                                        $deleteQuery = "DELETE FROM plain WHERE id = $id";
                                        if ($conn->query($deleteQuery)) {
                                            $message = "Record deleted successfully!";
                                        } else {
                                            $message = "Error deleting record: " . $conn->error;
                                        }
                                    } else {
                                        $message = "Invalid ID for delete.";
                                    }
                                }
                            }

                            // Fetch all records
                            $plainDataQuery = "
                                SELECT plain.id, plain.Days, plain.loc1, plain.loc2, plain.loc3, plain.loc4, plain.loc5, plain.loc6, plain.loc7, plain.loc8, plain.loc9, plain.loc10, plain_name.Plain_name
                                FROM plain
                                JOIN plain_name ON plain.Plain_name_id = plain_name.id";
                            $plainData = $conn->query($plainDataQuery);
                        ?> 

                        <?php if (!empty($message)): ?>
                        <p style="color: green;"><?= $message; ?></p>
                        <?php endif; ?>
                        <form method="POST" action="">
                            <input type="hidden" name="id" id="id">
                            <label for="Plain_name_id">Plain Name:</label>
                            <select name="Plain_name_id" id="Plain_name_id" required>
                                <option value="">Select Plain Name</option>
                                    <?php while ($plainName = $plainNames->fetch_assoc()): ?>
                                <option value="<?= $plainName['id']; ?>"><?= $plainName['Plain_name']; ?></option>
                                    <?php endwhile; ?>
                            </select>
                            <label for="Days">Days:</label>
                            <input type="number" name="Days" id="Days" required>
        
                            <?php for ($i = 1; $i <= 10; $i++): ?>
                               <label for="loc<?= $i; ?>">Loc<?= $i; ?>:</label>
                               <input type="number" name="loc<?= $i; ?>" id="loc<?= $i; ?>">
                            <?php endfor; ?>

                            <button type="submit" name="action" value="insert">Add</button>
                            <button type="submit" name="action" value="update">Update</button>
                        </form>

                        <h3>Existing Records</h3>
                        <table border="1">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Plain Name</th>
                                    <th>Days</th>
                                    <th>Loc1</th>
                                    <th>Loc2</th>
                                    <th>Loc3</th>
                                    <th>Loc4</th>
                                    <th>Loc5</th>
                                    <th>Loc6</th>
                                    <th>Loc7</th>
                                    <th>Loc8</th>
                                    <th>Loc9</th>
                                    <th>Loc10</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $plainData->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= $row['Plain_name']; ?></td>
                                    <td><?= $row['Days']; ?></td>
                                    <td><?= $row['loc1']; ?></td>
                                    <td><?= $row['loc2']; ?></td>
                                    <td><?= $row['loc3']; ?></td>
                                    <td><?= $row['loc4']; ?></td>
                                    <td><?= $row['loc5']; ?></td>
                                    <td><?= $row['loc6']; ?></td>
                                    <td><?= $row['loc7']; ?></td>
                                    <td><?= $row['loc8']; ?></td>
                                    <td><?= $row['loc9']; ?></td>
                                    <td><?= $row['loc10']; ?></td>
                                    <td>
                                        <form method="POST" style="display:inline;">
                                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                            <button type="submit" name="action" value="delete">Delete</button>
                                        </form>
                                        <button onclick="editRecord(<?= htmlspecialchars(json_encode($row), ENT_QUOTES, 'UTF-8'); ?>)">Edit</button>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>   
                </div>             
            </div> 
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script>
        function editRecord(record) {
            document.getElementById('id').value = record.id;
            document.getElementById('Plain_name_id').value = record.Plain_name_id;
            document.getElementById('Days').value = record.Days;

            for (let i = 1; i <= 10; i++) {
                document.getElementById('loc' + i).value = record['loc' + i];
            }
        }
    </script>
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