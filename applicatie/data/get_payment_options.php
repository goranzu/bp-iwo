<?php

function get_payment_options($db)
{
    $sql = 'SELECT payment_method FROM Payment;';

    $query = $db->query($sql);
    $payment_options = '';

    while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
        $method = $r['payment_method'];
        $payment_options = $payment_options . '<option value="' . $method . '">' . $method . '</option>';
    }

    return $payment_options;
}
