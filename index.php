<?php include('backend/config/db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Blog Home</title>
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700&family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">

</head>
<body>
<div class="wrapper">
<?php include('navbar.php'); ?>
<main class="content">
    <!-- ===== Landing Section / Hero ===== -->
<section class="landing">
  <div class="landing-content">
    <h1>Welcome to Bitlog</h1>
    <p><i>Where tiny bits create big ideas.</i></p>

<p><i>Bitlog is your cozy corner on the internet for everything tech — from coding insights to creative explorations.
Whether you’re a curious learner, a developer, or just someone who loves the world of innovation, you’ll find something here to spark your mind. </i></p>
   <a href="#posts" class="btn">Start Reading</a>
  </div>
</section>
<!-- ====landing section end ========-->

<section class="posts" id="posts">
<div class="container posts_container">
<?php
$result = $conn->query("SELECT b.*, u.username FROM blogPost b JOIN user u ON b.user_id = u.id ORDER BY b.created_at DESC");
while ($row = $result->fetch_assoc()):
?>
<a href="blog.php?id=<?php echo $row['id']; ?>" class="post-link">
  <article class="post">
      <div class="post_thumbnail">
          <img src="assets/uploads/<?php echo $row['image']; ?>" alt="">
      </div>
      <div class="post_info">
          <h3 class="post_title">
              <?php echo htmlspecialchars($row['title']); ?>
          </h3>
          <p class="post_body"><?php echo substr($row['content'], 0, 150) . '...'; ?></p>
          <div class="post_author">
              <h5>By: <?php echo $row['username']; ?></h5>
              <small><?php echo $row['created_at']; ?></small>
          </div>
      </div>
  </article>
</a>

<?php endwhile; ?>
</div>
</section>
</main>
<?php include('footer.php'); ?>
</div>
<script src="assets/js/script.js" defer></script>
</body>
</html>
