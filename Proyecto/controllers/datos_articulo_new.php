<?php

require_once("models/datos_articulo_new.php");

$articulo = new datos();
$msj = "";
$error = false;
$btn_formulario = '<input type="submit" class="btn btn-dark" name="btn_enviar_art" value="Procesar">';


if(isset($_POST["hd_articulo"])){
    $articulo->set_num_identificacion($_POST["hd_articulo"]);
    if(empty($articulo->get_num_identificacion())){
        $msj = "<div class=\"alert alert-danger\">El n&uacute;mero de identificaci&oacute;n no debe ser vacio</div>";
        $error = true;
    } 
    
    if(!$error){
        $articulo->consultar_articulos();
    }

    $btn_formulario = '<input type="submit" name="btn_actualizar_art" value="Actualizar" class="btn btn-primary">';
}

    
if(isset($_POST["btn_enviar_art"]) || isset($_POST["btn_actualizar_art"])){
    

    //Numero de identificación del articulo
    $articulo->set_num_identificacion($_POST["num_id_art"]);
    if(empty($articulo->get_num_identificacion())){
        $msj = "<div class=\"alert alert-danger\">El n&uacute;mero de identificaci&oacute;n no debe ser vacio</div>";
        $error = true;
    }

    if(!is_numeric($articulo->get_num_identificacion()) && !$error){
        $msj = "<div class=\"alert alert-danger\">El n&uacute;mero de identificaci&oacute;n no debe contener caracteres</div>";
        $error = true;
    }

    if(strlen($articulo->get_num_identificacion()) > 10 && !$error){
        $msj = "<div class=\"alert alert-danger\">El n&uacute;mero de identificaci&oacute;n no puede contener mas de diez n&uacute;meros</div>";
        $error = true;
    } 
    
    //Nombre del Articulo
    $articulo->set_dsc_nombre($_POST["txt_nombre_articulo"]);
    if(empty($articulo->get_dsc_nombre()) && !$error){
        $msj = "<div class=\"alert alert-danger\">El nombre no debe ser vacio</div>";
        $error = true;       
    }

    if(strlen($articulo->get_dsc_nombre()) < 3 && !$error){
        $msj = "<div class=\"alert alert-danger\">El nombre no deber ser menos a 3 caracteres</div>";
        $error = true;
    }

    //Fecha de Ingreso del articulo
    $articulo->set_fech_ing($_POST["Fecha_ing_art"]);
    if(empty($articulo->get_fech_ing()) && !$error){
        $msj = "<div class=\"alert alert-danger\">La fecha no puede ser vacía</div>";
        $error = true;       
    }
    
    //Tipo de Material
    $articulo->set_dsc_tmaterial($_POST["txt_material"]);
    if(empty($articulo->get_dsc_tmaterial()) && !$error){
        $msj = "<div class=\"alert alert-danger\">El tipo de material no debe ser vacio</div>";
        $error = true;       
    }

    if(strlen($articulo->get_dsc_tmaterial()) < 3 && !$error){
        $msj = "<div class=\"alert alert-danger\">El tipo de material no debe ser menos de 3 caracteres</div>";
        $error = true;
    }  

    //Usuario que registra    
    
    $articulo->set_usuario_reg($_POST["sel_usuario_reg"]);
    if(empty($articulo->get_usuario_reg()) && !$error){
        $msj = "<div class=\"alert alert-danger\">El usuario que registra no debe ser vacio</div>";
        $error = true;        
    }
    if(!is_numeric($articulo->get_usuario_reg()) && !$error){
        $msj = "<div class=\"alert alert-danger\">El usuario no debe contener caracteres</div>";
        $error = true;
    }

    //Valor en libros del articulo
    $articulo->set_valor_articulo($_POST["valor_art"]);
    if(empty($articulo->get_valor_articulo()) && !$error){
        $msj = "<div class=\"alert alert-danger\">El tipo de material no debe ser vacio</div>";
        $error = true;       
    }

   if(!is_numeric($articulo->get_valor_articulo()) && !$error){
    $msj = "<div class=\"alert alert-danger\">El valor en libros no debe contener caracteres</div>";
    $error = true;
}



    if(!$error){
        if(isset($_POST["btn_enviar_art"])){
            $articulo->insertar_articulo();
            
        }
        if(isset($_POST["btn_actualizar_art"])){
            $articulo->actualizar_articulo();            
            
        }
        
    }
    
    
}

require_once("views/datos_articulo_new.php")

?>