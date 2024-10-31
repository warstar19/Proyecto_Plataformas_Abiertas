<?php
require_once('models/listado_articulo.php');
$error = false;
$listado = new listado();
$registros = $listado->listado_de_articulos();

if(isset($_POST["hd_articulo"])){
    require_once("models/datos_articulo_new.php");
    $usuario = new datos();

    if(empty($_POST["hd_articulo"])){
        $msj = "<div class=\"alert alert-danger\">Hubo un error al eliminar los datos indicados</div>";
        $error = true;        
    }

    if(!$error){
        $usuario->set_num_identificacion($_POST["hd_articulo"]);
        $usuario->eliminar_articulo();
        
    }
}
$registros = $listado->listado_de_articulos();
require_once('views/listado_articulo.php');
?>