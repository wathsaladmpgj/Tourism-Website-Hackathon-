<?php
include ('db_connection.php');

// Insert Data
if (isset($_POST['add'])) {
    $plain_name = $_POST['plain_name'];
    $sql = "INSERT INTO plain_name (Plain_name) VALUES (?)";  // Fixed column name
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $plain_name);

    if ($stmt->execute()) {
        header("Location: admin_tour.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Delete Data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM plain_name WHERE id = ?";  // Table name is plain_name
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: admin_tour.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch Data
$result = $conn->query("SELECT * FROM plain_name");  // Ensure table name is correct

// Check if query failed
if (!$result) {
    die("Query Failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        table { width: 50%; margin: auto; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid black; }
        button { padding: 8px 12px; cursor: pointer; }
    </style>
</head>
<body>

    <h2>Admin Panel</h2>

    <form method="POST">
        <input type="text" name="plain_name" placeholder="Enter Name" required>
        <button type="submit" name="add">Add Record</button>
    </form>

    <br>

    <table>
        <tr>
            <th>ID</th>
            <th>Plain Name</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['Plain_name']; ?></td>  <!-- Ensure column name is correct -->
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                    <a href="admin_tour.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>
