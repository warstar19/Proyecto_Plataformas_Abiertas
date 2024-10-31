<?php
require_once('models/panel.php');
$cpanel = new panel();
$accesos = $cpanel->getAccesos();
require_once('views/panel.php');
require_once('views/vista_logo.php');
?>