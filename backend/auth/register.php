<?php
include('../config/db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $conn->real_escape_string(trim($_POST['username']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

    // Check if email already exists
    $checkEmail = $conn->query("SELECT * FROM user WHERE email='$email'");
    if ($checkEmail->num_rows > 0) {
        header('Location: ../../register.php?error=exists');
        exit();
    }

    // Insert new user
    $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
    if ($conn->query($sql)) {
        $_SESSION['user_id'] = $conn->insert_id;
        $_SESSION['username'] = $username;
        header('Location: ../../register.php?success=true');
        exit();
    } else {
        header('Location: ../../register.php?error=server');
        exit();
    }
} else {
    header('Location: ../../register.php');
    exit();
}
?>
