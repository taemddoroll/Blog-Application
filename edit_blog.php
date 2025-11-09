<?php include('backend/config/db.php');
if (!isset($_SESSION['user_id'])) header('Location: login.php');

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];
$res = $conn->query("SELECT * FROM blogPost WHERE id='$id' AND user_id='$user_id'");
$blog = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Blog</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="wrapper">
<?php include('navbar.php'); ?>
<main class="content">
<div class="form_container">
<form action="backend/blog/update_blog.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $blog['id']; ?>">
    <h2>Edit Blog</h2>
    <input type="text" name="title" value="<?php echo $blog['title']; ?>" required>
    <textarea name="content" rows="8" required><?php echo $blog['content']; ?></textarea>
    <input type="file" name="image">
    <button type="submit">Update</button>
</form>
</div>
</main>
<?php include('footer.php'); ?>
</div>
</body>
</html>
