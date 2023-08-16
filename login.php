<?php
require_once 'middleware.php';

redirectIfAuthenticated('index.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Login</title>
</head>
<body>
    <h2>Login Form</h2>
    <form id="login-form" method="post">
        <input type="hidden" name="login" value="true">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>

    <script src="ajax.js"></script>
</body>
</html>
