<?php
$loggedIn = isset($_SESSION['user_id']);
?>
<nav class="navbar">
    <div class="container nav_container">
    
        <a href="index.php" class="logo"><img src="assets/images/logo.png" alt="Bitlog"> Bitlog</a>
        <ul class="nav_links">
            <li><a href="index.php">Home</a></li>
            <?php if ($loggedIn): ?>
                <li><a href="create_blog.php">Create</a></li>
                <li><a href="my_blogs.php">My Blogs</a></li>
                <li><a href="backend/auth/logout.php">Logout (<?php echo $_SESSION['username']; ?>)</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
