<?php

require_once 'middleware.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <?php if (isAuthenticated()) { ?>
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>

        <form action="auth.php" method="post">
            <input type="hidden" name="logout" value="true">
            <input type="submit" value="Logout">
        </form>
    <?php } else { ?>
        <h1>Welcome to the Home Page</h1>
        <a href="login.php">Login</a> | <a href="register.php">Register</a>
    <?php } ?>
</body>
</html>
