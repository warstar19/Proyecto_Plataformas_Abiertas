<?php 
    

    session_destroy();
?>
    <h3>****Saliendo de SIMAP****</h3>
    
    <?php 
    header("Refresh: 2");
    require_once("index.php");
    ?>

