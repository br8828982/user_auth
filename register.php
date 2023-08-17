<?php
require_once 'middleware.php';

redirectIfAuthenticated('index.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Registration</title>
</head>
<body>
    <h2>Registration Form</h2>
    <form id="register-form" method="post">
        <input type="hidden" name="register" value="true">
        <label for="username">Username:</label>
        <input type="text" name="username"><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password"><br><br>

        <input type="submit" value="Register">
    </form>

    <script src="ajax.js"></script>
</body>
</html>
