<?php
require_once('models/listado_usuario.php');
$error = false;
$listado = new listado();
$registros = $listado->listado_de_usuarios();

if(isset($_POST["hd_usuario"])){
    require_once("models/datos_usuario_new.php");
    $usuario = new datos();

    if(empty($_POST["hd_usuario"])){
        $msj = "<div class=\"alert alert-danger\">Hubo un error al eliminar los datos indicados</div>";
        $error = true;        
    }

    if(!$error){
        $usuario->set_num_identificacion($_POST["hd_usuario"]);
        $usuario->eliminar_usuario();
        
    }
}
$registros = $listado->listado_de_usuarios();
require_once('views/listado_usuario.php');
?>