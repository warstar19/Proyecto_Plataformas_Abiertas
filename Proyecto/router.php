<?php
require_once 'controllers/usuariocontroller.php';

$controller = new UsuarioController();

$action = $_GET['action'] ?? 'usuarios';

if ($action === 'usuarios') {
    $controller->lista_usuario();
}
