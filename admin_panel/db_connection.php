<?php
$host = 'tour-database.c30okigyo77h.us-east-1.rds.amazonaws.com';
$username = 'admin';
$password = 'Janith12niAB';
$database = 'tour_database';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
