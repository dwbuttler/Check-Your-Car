<?php

require_once 'User.php';

// Logging the user in.
$user = new User();
$email = $_POST['email'];
$password = $_POST['password'];

if ($user->loginUser($email, $password)) {
    echo "You are logged in!";
} else {
    echo "Incorrect credentials provided";
}