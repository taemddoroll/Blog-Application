<?php include('backend/config/db.php');
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Create Blog</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="wrapper">
<?php include('navbar.php'); ?>
<main class="content">
<div class="form_container">
<form action="backend/blog/add_blog.php" method="POST" enctype="multipart/form-data">
    <h2>Create a New Blog</h2>
    <input type="text" name="title" placeholder="Title" required>
    <textarea name="content" rows="8" placeholder="Content..." required></textarea>
    <input type="file" name="image" required>
    <button type="submit">Publish</button>
</form>
</div>
</main>
<?php include('footer.php'); ?>
</div>
</body>
</html>
