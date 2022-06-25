<?php
require_once 'utils/setup.php';

if (isset($_SESSION['email'])) {
    header('Location: index.php');
}

include('views/login_view.php');
