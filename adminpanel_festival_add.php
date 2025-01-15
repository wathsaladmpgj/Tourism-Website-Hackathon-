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
    <link rel="stylesheet" href="./main_admin.css">
    
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
                        <span class="title">Festival add</span>
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
                        <h2>Admin Panel - Manage Events</h2>
                    </div>
                    <div>
                        <div class="form-container">
                            <form method="POST" action="">
                                <input type="text" name="event_name" placeholder="Event Name" required>
                                <input type="datetime-local" name="event_date" required>
                                <button type="submit" name="add_event">Add Event</button>
                            </form>
                        </div>

                        <table>
                            <tr>
                                <th>Event Name</th>
                                <th>Event Date</th>
                                <th>Actions</th>
                            </tr>
                            <?php
                                // Handle Add Event
                                if (isset($_POST['add_event'])) {
                                    $eventName = $conn->real_escape_string($_POST['event_name']);
                                    $eventDate = $conn->real_escape_string($_POST['event_date']);

                                    if ($conn->query("INSERT INTO events (event_name, event_date) VALUES ('$eventName', '$eventDate')")) {
                                        header("Location: save_festival.php"); // Refresh the page
                                        exit;
                                    } else {
                                        echo "Error: " . $conn->error;
                                    }
                                }

                                // Handle Delete Event
                                if (isset($_GET['delete_id'])) {
                                    $deleteId = intval($_GET['delete_id']);
                                    if ($conn->query("DELETE FROM events WHERE id = $deleteId")) {
                                        header("Location: save_festival.php"); // Refresh the page
                                        exit;
                                    } else {
                                        echo "Error: " . $conn->error;
                                    }
                                }

                                // Fetch All Events
                                $result = $conn->query("SELECT * FROM events ORDER BY event_date ASC");

                                // Check if query executed successfully
                                if ($result === false) {
                                    echo "Error in query: " . $conn->error;
                                    exit;
                                }

                                // Check if there are any events
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                                <td>" . htmlspecialchars($row['event_name']) . "</td>
                                                <td>" . date('F j, Y g:i A', strtotime($row['event_date'])) . "</td>
                                                <td>
                                                    <a href='?delete_id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this event?\")'>
                                                       <button class='delete-button'>Delete</button>
                                                    </a>
                                                </td>
                                              </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>No events found</td></tr>";
                                }

                                $conn->close();
                            ?>
                        </table>
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