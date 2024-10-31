<?php
session_start();

if(!isset($_SESSION["PROYECTO"]["NUM_IDENTIFICACION"])){
    require_once('controllers/login.php');
}else{
    require_once('models/util.php');
    $util =  new util();
    $modulo = $util->modulo($_GET["modulo"]);
    require_once('controllers/'.$modulo.'.php');
}

?>