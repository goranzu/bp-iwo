<?php

function get_contract_types($db)
{
    $sql = 'SELECT contract_type, price_per_month, discount_percentage FROM [Contract];';

    $query = $db->query($sql);

    return $query;
}
