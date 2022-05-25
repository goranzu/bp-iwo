<?php
// Hier doe ik alles wat op alle pagina's moet gebeuren.
require_once 'getPage.php';
require_once 'echoFooter.php';

// cookie gebruiken voor GDPR?
// plaats de sessie cookie alleen na toestemming van de gebruiker
session_start();

$currentPage = getCurrentPage();
