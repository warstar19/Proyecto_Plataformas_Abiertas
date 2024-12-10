<?php
// Cargar controladores
require_once __DIR__ . '/../Proyecto/controllers/usuariocontroller.php';
require_once __DIR__ . '/../Proyecto/controllers/prendacontroller.php';

// Instanciar controladores
$controllerUsuario = new UsuarioController();
$controllerPrendas = new PrendaController();

// Obtener la URL y método HTTP
$url = explode('?', $_SERVER['REQUEST_URI'])[0]; // Limpiar parámetros GET
$method = $_SERVER['REQUEST_METHOD'];

// Definir rutas con sus respectivos métodos y controladores
$routes = [
    'GET' => [
        '/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios' => function () use ($controllerUsuario) {
            $controllerUsuario->lista_usuario();
        },
        '/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios/agregar' => function () {
            include __DIR__ . '/../Vistas_Sitio_Web/usuarios/agregar_usuario.php';
        },
        '/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios/editar' => function () use ($controllerUsuario) {            
            $id = validateIdParam('ID de usuario no proporcionado.');
            $usuarioData = $controllerUsuario->editar_usuario($id);
            include __DIR__ . '/../Vistas_Sitio_Web/usuarios/editar_usuario.php';
        },
        '/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios/eliminar' => function () use ($controllerUsuario) {
            $id = validateIdParam('ID de usuario no proporcionado.');
            $controllerUsuario->eliminar_usuario($id);
            include __DIR__ . '/../Vistas_Sitio_Web/usuarios/lista_usuarios.php';
        },
        '/Proyecto_Plataformas_Abiertas/Proyecto/index.php/prendas' => function () use ($controllerPrendas) {
            $controllerPrendas->lista_prenda();
        },
        '/Proyecto_Plataformas_Abiertas/Proyecto/index.php/prendas/editar' => function () use ($controllerPrendas) {            
            $prenda_id = validateIdParam('ID de prenda no proporcionada.');
            $prendaData = $controllerPrendas->editar_prenda($prenda_id);
            include __DIR__ . '/../Vistas_Sitio_Web/prendas/editar_prenda.php';
        },
        '/Proyecto_Plataformas_Abiertas/Proyecto/index.php/prendas/agregar' => function () {
            include __DIR__ . '/../Vistas_Sitio_Web/prendas/agregar_prenda.php';
        },
    ],
    'POST' => [
        '/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios/insertar' => function () use ($controllerUsuario) {
            $controllerUsuario->insertar_usuario();
        },
        '/Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios/actualizar' => function () use ($controllerUsuario) {
            $id = validatePostParam('identificacion', 'ID del usuario no proporcionado.');
            $controllerUsuario->actualizar_usuario($id, $_POST);
            include __DIR__ . '/../Vistas_Sitio_Web/usuarios/lista_usuarios.php';
        },
        '/Proyecto_Plataformas_Abiertas/Proyecto/index.php/prendas/actualizar' => function () use ($controllerPrendas) {
            $prenda_id = validatePostParam('prenda_id', 'ID de la prenda no proporcionada.');
            $controllerPrendas->actualizar_prenda($prenda_id, $_POST);
            include __DIR__ . '/../Vistas_Sitio_Web/prendas/lista_prendas.php';
        },
        '/Proyecto_Plataformas_Abiertas/Proyecto/index.php/prendas/insertar' => function () use ($controllerPrendas) {
            $controllerPrendas->insertar_prenda();
        },
    ]
];

// Verificar si la ruta existe y ejecutar la función asociada
if (isset($routes[$method][$url])) {
    try {
        $routes[$method][$url]();
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    http_response_code(404);
    echo json_encode(["error" => "Ruta {$method} no encontrada."]);
}

// Función auxiliar para validar parámetros GET
function validateIdParam($errorMessage) {
    $id = $_GET['id'] ?? null;
    if (!$id) {
        http_response_code(400);
        echo json_encode(["error" => $errorMessage]);
        exit;
    }
    return $id;
}

// Función auxiliar para validar parámetros POST
function validatePostParam($param, $errorMessage) {
    $value = $_POST[$param] ?? null;
    if (!$value) {
        http_response_code(400);
        echo json_encode(["error" => $errorMessage]);
        exit;
    }
    return $value;
}
