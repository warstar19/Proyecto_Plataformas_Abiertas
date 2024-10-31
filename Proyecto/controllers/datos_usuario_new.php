<?php

require_once("models/datos_usuario_new.php");

$usuario = new datos();
$msj = "";
$error = false;
$btn_formulario = '<input type="submit" class="btn btn-dark" name="btn_enviar" value="Procesar">';


if(isset($_POST["hd_usuario"])){
    $usuario->set_num_identificacion($_POST["hd_usuario"]);
    if(empty($usuario->get_num_identificacion())){
        $msj = "<div class=\"alert alert-danger\">El n&uacute;mero de identificaci&oacute;n no debe ser vacio</div>";
        $error = true;
    } 
    
    if(!$error){
        $usuario->consultar_usuario();
    }

    $btn_formulario = '<input type="submit" name="btn_actualizar" value="Actualizar" class="btn btn-primary">';
}

    
if(isset($_POST["btn_enviar"]) || isset($_POST["btn_actualizar"])){
    

    //Numero de identificación
    $usuario->set_num_identificacion($_POST["num_ide"]);
    if(empty($usuario->get_num_identificacion())){
        $msj = "<div class=\"alert alert-danger\">El n&uacute;mero de identificaci&oacute;n no debe ser vacio</div>";
        $error = true;
    }

    if(!is_numeric($usuario->get_num_identificacion()) && !$error){
        $msj = "<div class=\"alert alert-danger\">El n&uacute;mero de identificaci&oacute;n no debe contener caracteres</div>";
        $error = true;
    }

    if(strlen($usuario->get_num_identificacion()) < 9 && !$error){
        $msj = "<div class=\"alert alert-danger\">El n&uacute;mero de identificaci&oacute;n no contener menos de nueve caracteres</div>";
        $error = true;
    } 
    
    //Nombre del Usuario
    $usuario->set_dsc_nombre($_POST["txt_nombre"]);
    if(empty($usuario->get_dsc_nombre()) && !$error){
        $msj = "<div class=\"alert alert-danger\">El nombre no debe ser vacio</div>";
        $error = true;       
    }

    if(strlen($usuario->get_dsc_nombre()) < 3 && !$error){
        $msj = "<div class=\"alert alert-danger\">El nombre no deber ser menos a 3 caracteres</div>";
        $error = true;
    }

    //Apellido 1 del usuario
    $usuario->set_dsc_apellido1($_POST["txt_apellido1"]);
    if(empty($usuario->get_dsc_apellido1()) && !$error){
        $msj = "<div class=\"alert alert-danger\">El primer apellido no debe ser vacio</div>";
        $error = true;       
    }

    if(strlen($usuario->get_dsc_apellido1()) < 3 && !$error){
        $msj = "<div class=\"alert alert-danger\">El primer apellido no deber ser menos de 5 caracteres</div>";
        $error = true;
    }   

    //Apellido 2 del usuario
    $usuario->set_dsc_apellido2($_POST["txt_apellido2"]);
    if(empty($usuario->get_dsc_apellido2()) && !$error){
        $msj = "<div class=\"alert alert-danger\">El segundo apellido no debe ser vacio</div>";
        $error = true;       
    }

    if(strlen($usuario->get_dsc_apellido2()) < 3 && !$error){
        $msj = "<div class=\"alert alert-danger\">El segundo apellido no deber ser menos de 5 caracteres</div>";
        $error = true;
    }  

    //Correo del usuario
    $usuario->set_dsc_correo($_POST["txt_email"]);
    if(empty($usuario->get_dsc_correo()) && !$error){
        $msj = "<div class=\"alert alert-danger\">El correo no debe ser vacio</div>";
        $error = true;        
    }

    if(filter_var($usuario->get_dsc_correo(), FILTER_VALIDATE_EMAIL) === false && !$error){
        $msj = "<div class=\"alert alert-danger\">Formato de correo electronico es incorrecto</div>";
        $error = true;          
    }

    //Tipo de usuario
    $usuario->set_tipo_usuario($_POST["sel_usuario"]);
    if(empty($usuario->get_tipo_usuario()) && !$error){
        $msj = "<div class=\"alert alert-danger\">El tipo de usuario no debe ser vacio</div>";
        $error = true;       
    }

    //Contraseña del usuario
    $usuario->set_contrasena($_POST["txt_contrasena"]);
    if(empty($usuario->get_contrasena()) && !$error){
        $msj = "<div class=\"alert alert-danger\">La contrasena no debe ser vacia</div>";
        $error = true;        
    }

    if(!$error){
        if(isset($_POST["btn_enviar"])){
            $usuario->insertar_usuario();
            
        }
        if(isset($_POST["btn_actualizar"])){
            $usuario->actualizar_usuario();            
            
        }
        
    }
    
    
}

require_once("views/datos_usuario_new.php")

?>