<?php
include('../config/db.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    // Escape special characters to prevent SQL errors and injection
    $title = $conn->real_escape_string($title);
    $content = $conn->real_escape_string($content);

    $imageName = '';
    if (!empty($_FILES['image']['name'])) {
        $imageName = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];
        $imagePath = '../../assets/uploads/' . $imageName;
        move_uploaded_file($imageTmp, $imagePath);
    }

    $sql = "INSERT INTO blogPost (title, content, image, user_id) 
            VALUES ('$title', '$content', '$imageName', '$user_id')";

    if ($conn->query($sql)) {
        header('Location: ../../my_blogs.php');
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
