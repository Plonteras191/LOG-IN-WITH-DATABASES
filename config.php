<?php
$host = "localhost";
$user = "root"; // Default user in XAMPP
$pass = ""; // No password by default
$db = "user_db";

// Connect to database
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
