<?php

// Cargar controladores
require_once 'controllers/usuariocontroller.php';
require_once 'controllers/prendacontroller.php';


// Instanciar controladores

$controllerUsuario = new UsuarioController();
$controllerPrendas = new PrendaController();


// Obtener la URL solicitada
$url = $_SERVER['REQUEST_URI'];
$cleanUrl = explode('?', $url)[0]; // Limpiar parámetros GET

// Manejar las rutas según el método HTTP
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        handleGetRequests($cleanUrl, $controllerUsuario, $controllerPrendas);
        break;

    case 'POST':
        handlePostRequests($cleanUrl, $controllerUsuario, $controllerPrendas);
        break;

    default:
        http_response_code(405);
        echo "Método HTTP no permitido.";
        break;
}

// Función para manejar solicitudes GET
function handleGetRequests($url, $controllerUsuario, $controllerPrendas) {
    switch ($url) {
        case '/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios':
            $id = $_GET['id'] ?? null;
            if ($id) {                
                $controllerUsuario->editar_usuario($id);
            } else {
                $controllerUsuario->lista_usuario();
            }
            break;
        case '/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios/agregar':
            require 'views/usuarios/agregar_usuario.php';
            break;

        case '/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios/editar':
            $identificacion = $_GET['id'] ?? null;
            if ($identificacion) {
                $controllerUsuario->editar_usuario($identificacion);
            } else {
                http_response_code(400);
                echo "ID de usuario no proporcionado.";
            }
            break;
        case '/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios/eliminar':
            $identificacion = $_GET['id'] ?? null;
            error_log("Identificacion recibida para eliminar: " . $identificacion);
            if ($identificacion) {
                $controllerUsuario->eliminar_usuario($identificacion);
            } else {
                http_response_code(400);
                echo "ID del usuario no proporcionado.";
            }
            break;

        case '/Proyecto_Plataformas_Abiertas/Proyecto/index.php/prendas':
            $controllerPrendas->lista_prenda();
            break;

        

        default:
            '/Proyecto_Plataformas_Abiertas/Proyecto/index.php/prendas';
            $controllerPrendas->lista_prenda();
            break;
    }
}

// Función para manejar solicitudes POST
function handlePostRequests($url, $controllerUsuario, $controllerPrendas) {
    switch ($url) {
        case '/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios/insertar':
            $controllerUsuario->insertar_usuario();
            break;

        case '/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios/actualizar':
            $id = $_POST['identificacion'] ?? null;
            if ($id) {
                $controllerUsuario->actualizar_usuario($id,$_POST);
            } else {
                http_response_code(400);
                echo "ID del usuario no proporcionado.";
            }
            break;
            

        default:
            http_response_code(404);
            echo "Ruta POST no encontrada.";
            break;
    }
}
