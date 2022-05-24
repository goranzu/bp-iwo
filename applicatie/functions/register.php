<?php

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$_SESSION['email'] = $email;
$_SESSION['password'] = $password;

header('Location: /index.php');