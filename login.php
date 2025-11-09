<?php include('backend/config/db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
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
      <form action="backend/auth/login.php" method="POST" class="auth_form">
          <h2>Login</h2>

          <!-- PHP Error Handling -->
          <?php
          if (isset($_GET['error'])) {
              if ($_GET['error'] === 'invalid') {
                  echo '<div class="error-message">Incorrect password. Please try again.</div>';
              } elseif ($_GET['error'] === 'notfound') {
                  echo '<div class="error-message">User not found. Please register first.</div>';
              }
          } elseif (isset($_GET['login']) && $_GET['login'] === 'success') {
              echo '<div class="success-message">Login successful!</div>';
          }
          ?>

          <input type="email" name="email" placeholder="Email" required>
          <input type="password" name="password" placeholder="Password" required>
          <button type="submit">Login</button>
          <p>Don't have an account? <a href="register.php">Register</a></p>
      </form>
  </div>
</main>
<?php include('footer.php'); ?>
</div>
</body>
</html>
