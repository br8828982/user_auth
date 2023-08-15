<?php
session_start();

function isAuthenticated() {
    return isset($_SESSION['username']);
}

function redirectIfAuthenticated($redirectTo) {
    if (isAuthenticated()) {
        header("Location: $redirectTo");
        exit();
    }
}

function redirectIfNotAuthenticated($redirectTo) {
    if (!isAuthenticated()) {
        header("Location: $redirectTo");
        exit();
    }
}
?>
