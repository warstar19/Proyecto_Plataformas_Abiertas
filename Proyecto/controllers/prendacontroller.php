<?php
require_once 'models/prenda.php';

class PrendaController {
    public function lista_prenda() {
        $prenda = new Prenda();
        $prendas = $prenda->obtenerPrendas();
        require 'views/prendas/lista_prendas.php';
    }

    public function editar_prenda($prenda_id) {
        $prenda = new Prenda();
        $prendaData = $prenda->obtenerPrendaPorId($prenda_id);
        require 'views/prendas/editar_prenda.php';
    }

    public function insertar_prenda() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $prenda = new Prenda();
            $prenda->crearPrenda(
                $_POST['prenda_id'],
                $_POST['marca_id'],
                $_POST['nombre_prenda'],                
                $_POST['precio'],
                $_POST['stock']
                
            );
            header("Location: /Proyecto_Plataformas_Abiertas/Proyecto/index.php/prendas");
            exit();
        }
    }

    public function actualizar_prenda($prenda_id, $data) {
        $prenda = new Prenda();
        $prenda->actualizarPrenda(
            $prenda_id,
            $data['marca_id'],
            $data['nombre_prenda'],
            $data['precio'],
            $data['stock']
        );
        header("Location: /Proyecto_Plataformas_Abiertas/Proyecto/index.php/prendas");
        exit();
    }
}
