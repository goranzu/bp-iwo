<?php

function get_select_options($db, $sql, $column_name)
{
    $query = $db->query($sql);
    $options = '';

    while ($r = $query->fetch(PDO::FETCH_ASSOC)) {
        $value = $r[$column_name];
        $options = $options . '<option value="' . strtolower($value) . '">' . $value . '</option>';
    }

    return $options;
}
