<?php
include('../config/db.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../login.php');
    exit;
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$check = $conn->query("SELECT * FROM blogPost WHERE id='$id' AND user_id='$user_id'");
if ($check->num_rows === 0) {
    die("Unauthorized delete.");
}

$conn->query("DELETE FROM blogPost WHERE id='$id'");
header('Location: ../../my_blogs.php');
?>
