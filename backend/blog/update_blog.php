<?php
session_start();
include('../config/db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    // Check if user owns this blog
    $check = $conn->prepare("SELECT id FROM blogPost WHERE id = ? AND user_id = ?");
    $check->bind_param("ii", $id, $user_id);
    $check->execute();
    $check_result = $check->get_result();

    if ($check_result->num_rows === 0) {
        die("Unauthorized action.");
    }
    $check->close();

    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $imageName = basename($_FILES['image']['name']);
        $imageTmp = $_FILES['image']['tmp_name'];
        $imagePath = '../../assets/uploads/' . $imageName;
        move_uploaded_file($imageTmp, $imagePath);

        $stmt = $conn->prepare("UPDATE blogPost SET title = ?, content = ?, image = ? WHERE id = ? AND user_id = ?");
        $stmt->bind_param("sssii", $title, $content, $imageName, $id, $user_id);
    } else {
        $stmt = $conn->prepare("UPDATE blogPost SET title = ?, content = ? WHERE id = ? AND user_id = ?");
        $stmt->bind_param("ssii", $title, $content, $id, $user_id);
    }

    if ($stmt->execute()) {
        header('Location: ../../my_blogs.php');
        exit;
    } else {
        echo "Error updating blog: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
