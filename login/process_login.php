<?php

// Logging the user in.
$user = new User();
$email = $_POST['email'];
$password = $_POST['password'];

if ($user->checkUserExists($email, $password)) {
    echo "You are logged in!";
} else {
    echo "Incorrect credentials provided";
}