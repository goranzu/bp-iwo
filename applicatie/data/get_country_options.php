<?php

function get_country_options($db)
{
    $sql = 'SELECT country_name FROM Country;';

    $query = $db->query($sql);
    $options = '';

    while ($r = $query->fetch()) {
        $country_name = $r['country_name'];
        $options = $options . '<option value="' . strtolower($country_name) . '">' . $country_name . '</option>';
    }

    return $options;
}
