<?php

session_start();

// unset session variables
$_SESSION = array();

// delete the session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// destroy session
session_destroy();

// route to index.php
header('Location: /index.php');
