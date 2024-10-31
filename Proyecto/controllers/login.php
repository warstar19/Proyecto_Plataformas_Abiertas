<?php
require_once('models/login.php');
$login = new login();
$error = false;

if(isset($_POST["btn_ingresar"])){
    //Boton de acceso presionado
    //asignar los valores y validar los datos ()
    $login->setUsuario($_POST["num_ide"]);
    if(empty($login->getUsuario())){
        $msj = '<div class="alert alert-danger">El n&uacute;mero de identificaci&oacute;n no de ser vac&iacute;o</div>';
        $error = true;
    }

    if(!is_numeric($login->getUsuario()) && !$error){
        $msj = '<div class="alert alert-danger">El n&uacute;mero de identificaci&oacute;n no de contener letras o caracteres especiales</div>';
        $error = true;       
    }

    $login->setContrasena($_POST["txt_contrasena"]);
    if(empty($login->getContrasena()) && !$error){
        $msj = '<div class="alert alert-danger">La contrase&ntilde; no de ser vac&iacute;a</div>';
        $error = true;
    }

    //ejecuto el metodo para validar el usuario
    if(!$error){
        $resultado = $login->acceder();
        if(empty($resultado)){
            $msj = '<div class="alert alert-danger">Usuario y/o contrase&ntilde;a incorrectos</div>';
            $error = true;           
        }

        if(!empty($resultado[0]["NOMBRE"]) && !empty($resultado[0]["APELLIDO1"]) && !empty($resultado[0]["APELLIDO2"]) && !empty($resultado[0]["CORREO"]) && !$error){
            //asignar las variables de sesiones
            $_SESSION["PROYECTO"]["NUM_IDENTIFICACION"] = $login->getUsuario();
            $_SESSION["PROYECTO"]["NOMBRE_COMPLETO"] = $resultado[0]["NOMBRE"]." ".$resultado[0]["APELLIDO1"]." ".$resultado[0]["APELLIDO2"];
            $_SESSION["PROYECTO"]["CORREO"] = $resultado[0]["CORREO"];
            echo "<script>setTimeout(\"location.href='index.php?modulo=1'\", 1000)</script>";
        }
    }

    //Devuelvo una respuesta
}



require_once('views/login.php');
?>