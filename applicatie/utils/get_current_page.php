<?php
function get_current_page()
{
    $cur_page_name = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
    return $cur_page_name;
}
