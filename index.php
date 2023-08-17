<?php
require_once 'middleware.php';

require_once 'sanitization.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php if (isAuthenticated()) : ?>
    <h1>Welcome, <?= sanitizeInput($_SESSION['username']); ?>!</h1>
    <form id="logout-form" method="post">
        <input type="hidden" name="logout" value="true">
        <input type="submit" value="Logout">
    </form>
    <?php else : ?>
        <h1>Welcome to the Home Page</h1>
        <a href="login.php">Login</a> | <a href="register.php">Register</a>
    <?php endif; ?>

    <script src="ajax.js"></script>
</body>
</html>
