<?php include('backend/config/db.php');
$id = $_GET['id'];
$result = $conn->query("SELECT b.*, u.username FROM blogPost b JOIN user u ON b.user_id = u.id WHERE b.id='$id'");
$blog = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo $blog['title']; ?></title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="wrapper">
<?php include('navbar.php'); ?>
<main class="viewblog_content">
<section class="single_post">
    <div class="container_1">
        <img src="assets/uploads/<?php echo $blog['image']; ?>" class="banner">
    </div>
    <div class="container_2">
        <h2><?php echo htmlspecialchars($blog['title']); ?></h2>
        <p class="author">By <?php echo $blog['username']; ?> | <?php echo $blog['created_at']; ?></p>
        <p><?php echo nl2br($blog['content']); ?></p>
    </div>
</section>
</main>
<?php include('footer.php'); ?>
</div>
</body>
</html>
