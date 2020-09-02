<?php

require_once '../login/User.php';

// After some front-end validation.
$email = $_POST['email'];
$password = $_POST['password'];

$user = new User();
if ($user->registerUser($email, $password)) {
    echo 'Account created!';
} else {
    echo 'An error occurred, please try again';
}