<?php
require_once 'models/usuario.php';

class UsuarioController {
    public function lista_usuario() {
        $usuario = new Usuario();
        $usuarios = $usuario->obtenerUsuarios();
        require 'views/usuarios/lista_usuarios.php';
    }

    public function insertar_usuario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $identificacion = $_POST['identificacion'];
            $nombre = $_POST['nombre'];
            $apellido1= $_POST['apellido1'];
            $apellido2= $_POST['apellido2'];
            $correo = $_POST['correo'];
            $perfil = $_POST['perfil'];
            $contrasena = $_POST['contrasena'];

            $usuario = new Usuario();
            $usuario->crearUsuario(
                $identificacion,
                $nombre,
                $apellido1,
                $apellido2,
                $correo,
                $perfil,
                $contrasena
            );

            header("Location: /proyecto_plataformas_abiertas/proyecto/index.php?action=usuarios");
            exit();
        }
        require 'views/usuarios/agregar_usuario.php';
    }
}

