<?php
require_once 'db_connectie.php';
require_once 'utils/setup.php';
require_once 'data/get_country_options.php';
require_once 'data/get_payment_options.php';

if (isset($_SESSION['email'])) {
    header('Location: index.php');
}

$db = maakVerbinding();

$country_options = get_country_options($db);
$payment_options = get_payment_options($db);

include('views/register_view.php');
