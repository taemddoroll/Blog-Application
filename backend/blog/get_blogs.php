<?php
include('../config/db.php');
$result = $conn->query("SELECT b.*, u.username FROM blogPost b JOIN user u ON b.user_id = u.id ORDER BY b.created_at DESC");
$blogs = [];

while ($row = $result->fetch_assoc()) {
    $blogs[] = $row;
}

echo json_encode($blogs);
?>
