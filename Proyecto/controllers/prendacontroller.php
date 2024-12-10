<?php
require_once 'models/prenda.php';

class PrendaController {
    public function lista_prenda() {
        $prenda = new Prenda();
        echo json_encode ( [
            'data' => $prenda->obtenerPrendas()
        ]);        
    }

    public function editar_prenda($prenda_id) {
        $prenda = new Prenda();
        $prendaData = $prenda->obtenerPrendaPorId($prenda_id);
        return $prendaData;
    }

    public function insertar_prenda()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"), associative: true);
            if (empty($data['prenda_id']) || empty($data['marca_id']) || empty($data['nombre_prenda']) || empty($data['precio']) || empty($data['stock'])) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Todos los campos son obligatorios.'
                ]);
                return;
            }
            $prenda = new Prenda();
            try {
                // Llamar al método para crear el usuario
                $resultado = $prenda->crearPrenda(
                    $data['prenda_id'],
                    $data['marca_id'],
                    $data['nombre_prenda'],
                    $data['precio'],
                    $data['stock']
                );

                // Verificar el resultado y devolver la respuesta adecuada
                if ($resultado) {
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'Prenda creada correctamente'
                    ]);
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Error al crear la prenda'
                    ]);
                }
            } catch (Exception $e) {
                // Capturar cualquier error y devolver un mensaje adecuado
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Error al crear la prenda',
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

    public function actualizar_prenda($prenda_id, $data) {
        $prenda = new Prenda();
        $resultado = $prenda->actualizarPrenda(
            $prenda_id,
            $data['marca_id'],
            $data['nombre_prenda'],
            $data['precio'],
            $data['stock']
        );        
    }
}
