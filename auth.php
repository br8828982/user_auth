<?php
require_once 'user.php';

session_start();

function register() {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Perform validation and sanitation

    if (createUser($username, $password)) {
        echo "Registration successful!";
        header("Location: login.php");
    } else {
        echo "Registration failed.";
    }
}

function login() {
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        $user = getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            echo "Login successful";
            header("Location: index.php");
        } else {
            echo "Invalid login credentials.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function logout() {
    session_start();
    session_unset();
    session_destroy();

    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["register"])) {
        register();
    } elseif (isset($_POST["login"])) {
        login();
    } elseif (isset($_POST["logout"])) {
        logout();
    }
}