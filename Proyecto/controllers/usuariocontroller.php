<?php

require_once __DIR__ .'/../models/usuario.php';

class UsuarioController
{
    public function lista_usuario()
    {
        $usuario = new Usuario();        
        echo json_encode([
            'data' => $usuario->obtenerUsuarios()
        ]);
        
    }    

    public function editar_usuario($identificacion)
    {
        $usuario = new Usuario();        
        $usuarioData= $usuario-> obtenerUsuarioPorId($identificacion);
        return $usuarioData;
    }

    public function insertar_usuario()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $identificacion = $_POST['identificacion'] ?? null;
        $nombre = $_POST['nombre'] ?? null;
        $apellido1 = $_POST['apellido1'] ?? null;
        $apellido2 = $_POST['apellido2'] ?? null;
        $correo = $_POST['correo'] ?? null;
        $perfil = $_POST['perfil'] ?? null;
        $contrasena = $_POST['contrasena'] ?? null;

        if ($identificacion && $nombre && $apellido1 && $apellido2 && $correo && $perfil && $contrasena) {
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

            // Respuesta de éxito en JSON
            echo json_encode([
                "status" => "success",
                "message" => "Usuario agregado exitosamente"
            ]);

            // Redireccionar
            header("Location: /Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios");
            exit();
        } else {
            // Respuesta de error si faltan datos
            echo json_encode([
                "status" => "error",
                "message" => "Faltan datos requeridos"
            ]);
        }
    } else {
        // Respuesta en caso de que no sea POST
        echo json_encode([
            "status" => "error",
            "message" => "Método no permitido"
        ]);
    }
}



    public function actualizar_usuario($id, $data)
    {
        $usuario = new Usuario();
        
            $resultado = $usuario->actualizarUsuario(
                $id,
                $data['nombre'],
                $data['apellido1'],
                $data['apellido2'],
                $data['correo'],
                $data['perfil'],
                $data['contrasena']
            );            
        
    }

    public function eliminar_usuario($identificacion)
    {
        $usuario = new Usuario();
            $resultado = $usuario->eliminarUsuario($identificacion);
    }
}
