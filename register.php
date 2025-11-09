<?php include('backend/config/db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register</title>
<link rel="stylesheet" href="assets/css/style.css">
<style>
  .error-message {
    color: #ff3b3b;
    background: rgba(255, 59, 59, 0.1);
    border: 1px solid rgba(255, 59, 59, 0.4);
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 15px;
    text-align: center;
    font-weight: 500;
  }
  .success-message {
    color: #00c853;
    background: rgba(0, 200, 83, 0.1);
    border: 1px solid rgba(0, 200, 83, 0.4);
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 15px;
    text-align: center;
    font-weight: 500;
  }
</style>
</head>
<body>
<div class="wrapper">
<?php include('navbar.php'); ?>
<main class="content">
<div class="form_container">
    <form action="backend/auth/register.php" method="POST" class="auth_form">
        <h2>Create Account</h2>

        <!-- Inline messages -->
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] === 'exists') {
                echo '<div class="error-message">Email already exists! Please log in instead.</div>';
            } elseif ($_GET['error'] === 'server') {
                echo '<div class="error-message">Something went wrong. Please try again.</div>';
            }
        } elseif (isset($_GET['success']) && $_GET['success'] === 'true') {
            echo '<div class="success-message">Account created successfully! You can now log in.</div>';
        }
        ?>

        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </form>
</div>
</main>
<?php include('footer.php'); ?>
</div>
</body>
</html>
