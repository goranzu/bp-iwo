<?php
// Hier doe ik alles wat op alle pagina's moet gebeuren.
require_once 'get_current_page.php';

// cookie gebruiken voor GDPR?
// plaats de sessie cookie alleen na toestemming van de gebruiker
session_start();

$current_page = get_current_page();
