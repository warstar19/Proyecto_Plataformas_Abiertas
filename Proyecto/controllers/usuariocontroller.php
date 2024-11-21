<?php
require_once 'models/usuario.php';

class UsuarioController
{
    public function lista_usuario()
    {
        $usuario = new Usuario();
        $usuarios = $usuario->obtenerUsuarios();
        echo json_encode(value: ["Resultado" =>   $usuario->obtenerUsuarios()]);
       
       //Comentario profesor:  La vista aca no se usa ya que estamos creando una API, por lo tanto cambie que devuelva un json.
        // require 'views/usuarios/lista_usuarios.php';
    }

    public function editar_usuario($identificacion)
    {
        $usuario = new Usuario();
        $usuarioData = $usuario->obtenerUsuarioPorId($identificacion);
        require 'views/usuarios/editar_usuario.php';
    }


    public function insertar_usuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario();
            $input = file_get_contents('php://input');
            $data = json_decode($input, true);

            $usuario->crearUsuario(
                identificacion: $data['identificacion'] ?? null,
                nombre: $data['nombre'] ?? null,
                apellido1: $data['apellido1'] ?? null,
                apellido2: $data['apellido2'] ?? null,
                correo: $data['correo'] ?? null,
                perfil: $data['perfil'] ?? null,
                contrasena: $data['contrasena'] ?? null
            );

            echo json_encode([
                "Resultado" => "Creacion exitosa"
            ]);


            var_dump($_POST); // Imprime todos los datos enviados por POST
           
          /*  echo json_encode(value: ["Resultado" =>   
                    $usuario->crearUsuario(
                        identificacion: $_POST['identificacion'],
                        $_POST['nombre'],
                        $_POST['apellido1'],
                        $_POST['apellido2'],
                        $_POST['correo'],
                        $_POST['perfil'],
                        $_POST['contrasena']
            )]);*/
            //Comentario profesor:  La vista aca no se usa ya que estamos creando una API, por lo tanto cambie que devuelva un json.
            //En la respuesta vamos a obtener el nuevo id creado.
            //header("Location: /Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios");
            ///exit();
        }
    }

    public function actualizar_usuario($id,$data)
    {
        
        $usuario = new Usuario();
        $usuario->actualizarUsuario(
            $id,
            $data['nombre'],
            $data['apellido1'],
            $data['apellido2'],
            $data['correo'],
            $data['perfil'],
            $data['contrasena']
        );
        header("Location: /Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios");
        exit();
    }

    public function eliminar_usuario($identificacion)
    {
        $usuario = new Usuario();

        // Llamamos a la función de eliminar del modelo
        $resultado = $usuario->eliminarUsuario($identificacion);

        if ($resultado) {
            header("Location: /Proyecto_Plataformas_Abiertas/Proyecto/index.php/usuarios");
            exit();
        } else {
            http_response_code(500);
            echo "Hubo un error al eliminar el usuario.";
        }
    }
    

}


