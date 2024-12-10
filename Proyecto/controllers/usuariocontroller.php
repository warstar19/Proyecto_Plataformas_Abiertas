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
            // Decodificar los datos JSON del cuerpo de la solicitud
            $data = json_decode(file_get_contents("php://input"), true);

            // Verificar si los datos fueron recibidos correctamente
            if (empty($data['identificacion']) || empty($data['nombre']) || empty($data['apellido1']) || empty($data['apellido2']) || empty($data['correo']) || empty($data['perfil']) || empty($data['contrasena'])) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Todos los campos son obligatorios.'
                ]);
                return;
            }

            $usuario = new Usuario();

            try {
                // Llamar al método para crear el usuario
                $resultado = $usuario->crearUsuario(
                    $data['identificacion'],
                    $data['nombre'],
                    $data['apellido1'],
                    $data['apellido2'],
                    $data['correo'],
                    $data['perfil'],
                    $data['contrasena']
                );

                // Verificar el resultado y devolver la respuesta adecuada
                if ($resultado) {
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'Usuario creado correctamente'
                    ]);
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Error al crear el usuario'
                    ]);
                }
            } catch (Exception $e) {
                // Capturar cualquier error y devolver un mensaje adecuado
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Error al crear el usuario',
                    'error' => $e->getMessage()
                ]);
            }
        } else {
            // Si la solicitud no es un POST, retornar un error
            echo json_encode([
                'status' => 'error',
                'message' => 'Método no permitido'
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
