<?php

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$_SESSION['email'] = $email;

// save the user in database here`

header('Location: /index.php');