<?php
include('../config/db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $conn->real_escape_string(trim($_POST['email']));
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: ../../index.php?login=success');
            exit();
        } else {
            header('Location: ../../login.php?error=invalid');
            exit();
        }
    } else {
        header('Location: ../../login.php?error=notfound');
        exit();
    }
} else {
    header('Location: ../../login.php');
    exit();
}
?>
