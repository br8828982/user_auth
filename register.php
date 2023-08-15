<?php
require_once 'middleware.php';

redirectIfAuthenticated('index.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Registration</title>
</head>
<body>
    <h2>Registration Form</h2>
    <form action="auth.php" method="post">
        <input type="hidden" name="register" value="true">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>
