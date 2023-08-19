<?php
require_once 'user.php';
require_once 'validation.php';
require_once 'sanitization.php';

session_start();

function register() {
    $username = sanitizeInput($_POST["username"]);
    $password = sanitizeInput($_POST["password"]);

    if (empty($username) || empty($password)) {
        echo json_encode(["success" => false, "message" => "Both username and password are required."]);
        exit();
    }

    if (!validateUsername($username)) {
        echo json_encode(["success" => false, "message" => "Username must be at least 4 characters long."]);
        exit();
    }

    if (!validatePassword($password)) {
        echo json_encode(["success" => false, "message" => "Password must be between 8 and 20 characters and contain at least one uppercase letter, one lowercase letter, one number, and one special character."]);
        exit();
    }

    if (fetchUser($username)) {
        echo json_encode(["success" => false, "message" => "Username already exists."]);
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if (createUser($username, $hashedPassword)) {
        echo json_encode(["success" => true, "message" => "Registration successful!", "redirect" => "login.php"]);
    } else {
        echo json_encode(["success" => false]);
    }
}

function login() {
    $username = sanitizeInput($_POST["username"]);
    $password = sanitizeInput($_POST["password"]);

    if (empty($username) || empty($password)) {
        echo json_encode(["success" => false, "message" => "Both username and password are required."]);
        exit();
    }

    $user = fetchUser($username);

    if (!$user) {
        echo json_encode(["success" => false, "message" => "User not found."]);
        exit();
    }

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        echo json_encode(["success" => true, "message" => "Login successful!", "redirect" => "index.php"]);
    } else {
        echo json_encode(["success" => false, "message" => "Password not matched."]);
    }
}

function logout() {
    session_unset();
    session_destroy();

    echo json_encode(["success" => true, "message" => "Logout successful!", "redirect" => "index.php"]);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit();
}

if (isset($_POST["register"])) {
    register();
} elseif (isset($_POST["login"])) {
    login();
} elseif (isset($_POST["logout"])) {
    logout();
}
