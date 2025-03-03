<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Secure password hashing
    $registration_date = date('Y-m-d H:i:s'); // Store current date and time
    $status = 'active'; // Set default status

    // Check if email already exists
    $checkEmail = $conn->query("SELECT * FROM users WHERE email='$email'");
    if ($checkEmail->num_rows > 0) {
        echo "Email already registered!";
    } else {
        // Insert new user
        $sql = "INSERT INTO users (name, email, password, registration_date, status) VALUES ('$name', '$email', '$password', '$registration_date', '$status')";
        if ($conn->query($sql)) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>
