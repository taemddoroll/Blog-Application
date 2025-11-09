<?php include('backend/config/db.php');


if (!isset($_SESSION['user_id'])) header('Location: login.php');
$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM blogPost WHERE user_id='$user_id' ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>My Blogs</title> <br>
<link rel="stylesheet" href="assets/css/style.css">
<style>
.myblog_posts_container {
  display: block !important;
}
.myblog_post {
  display: block !important;
  width: 85% !important;
  margin: 5rem auto !important;
}
</style>


</head>
<body>
<div class="wrapper">
<?php include('navbar.php'); ?>
<main class="content">
<div class="title"> <h2>My Blogs</h2></div>
<section class="myblog_posts">
<div class="container myblog_posts_container">

<?php while ($row = $result->fetch_assoc()): ?>
<article class="myblog_post">
    <div class="myblog_post_thumbnail">
        <img src="assets/uploads/<?php echo $row['image']; ?>">
    </div>
    <div class="myblog_post_info">
        
    <h3>
        <a href="blog.php?id=<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['title']); ?></a>
    </h3>
        <p><?php echo substr($row['content'], 0, 150) . '...'; ?></p>
        <div class="actions">
            <a href="edit_blog.php?id=<?php echo $row['id']; ?>">Edit</a> |
            <a href="backend/blog/delete_blog.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this blog?')">Delete</a>
        </div>
    </div>
</article>


<?php endwhile; ?>
</div>
</section>
</main>
<?php include('footer.php'); ?>
</div>


</body>
</html>
