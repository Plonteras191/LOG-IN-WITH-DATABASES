<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user from database
    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Update last login date
            $last_login_date = date('Y-m-d H:i:s');
            $conn->query("UPDATE users SET last_login_date='$last_login_date' WHERE email='$email'");
            echo "Login successful!";
            // You can start a session here
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }
}
?>
