<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Events</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .form-container {
            margin: 20px 0;
        }

        .form-container input, .form-container button {
            padding: 10px;
            margin-right: 10px;
        }

        .delete-button {
            color: white;
            background-color: red;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>
    <h1>Admin Panel - Manage Events</h1>

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
// Database connection
$conn = new mysqli('localhost', 'root', '', 'tour_database');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
</body>
</html>
