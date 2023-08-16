<?php

function validateUsername($username) {
    return strlen($username) >= 4;
}

function validatePassword($password) {
    $passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/';
    return preg_match($passwordRegex, $password);
}