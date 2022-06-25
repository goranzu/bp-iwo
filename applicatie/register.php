<?php
require_once 'db_connectie.php';
require_once 'utils/setup.php';
require_once 'data/get_country_options.php';
require_once 'data/get_payment_options.php';
require_once 'data/get_contract_types.php';

if (isset($_SESSION['email'])) {
    header('Location: index.php');
}

$db = maakVerbinding();

$country_options = get_country_options($db);
$payment_options = get_payment_options($db);

$contract_types_query = get_contract_types($db);

$contract_types = $contract_types_query->fetchAll(PDO::FETCH_ASSOC);
$contract_types_amount = count($contract_types);

$contract_types_html = '';
$contract_type_options = '';

foreach ($contract_types as $contract_type) {
    $name = $contract_type['contract_type'];
    $contract_types_html .= '
        <article class="contract-type">
            <p>' . $name . '</p>
            <p>Price per month: ' . $contract_type['price_per_month'] . ' euros</p>
            <p>You get a discount of ' . $contract_type['discount_percentage'] . '%</p>
        </article>
    ';

    $contract_type_options .= '<option value="' . $name . '">' . $name. '</option>';
}



include('views/register_view.php');
