<?php
require_once 'functions/setup.php';

if (isset($_SESSION['email'])) {
    header('Location: index.php');
}

include('views/login_view.php');
