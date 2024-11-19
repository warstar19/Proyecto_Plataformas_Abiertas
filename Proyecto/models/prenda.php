<?php
require_once 'Conexion.php';

class Prenda
{
    private $conn;

    public function __construct()
    {
        $this->conn = (new Conexion())->conectar();
    }

    public function obtenerPrendas()
    {
        $sql = "SELECT prenda_id, marca_id, nombre_prenda, precio, stock FROM prendas";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPrendaPorId($id)
    {
        $sql = "SELECT * FROM prenda WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crearPrenda($prenda_id, $marca_id, $nombre_prenda, $precio, $stock)
    {
        $sql = "INSERT INTO prendas (prenda_id, marca_id, nombre_prenda, precio, stock) 
                VALUES (:prenda_id, :marca_id, :nombre_prenda, :precio, :stock)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':prenda_id', $prenda_id);
        $stmt->bindParam(':marca_id', $marca_id);
        $stmt->bindParam(':nombre_prenda', $nombre_prenda);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':stock', $stock);        
        return $stmt->execute();
    }

    public function actualizarPrenda($prenda_id, $marca_id, $nombre_prenda, $precio, $stock)
    {
        $sql = "UPDATE prendas 
                SET marca_id = :marca_id, nombre_prenda = :nombre_prenda, precio = :precio, stock = :stock
                WHERE prenda_id = :prenda_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':prenda_id', $prenda_id);
        $stmt->bindParam(':marca_id', $marca_id);
        $stmt->bindParam(':nombre_prenda', $nombre_prenda);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':stock', $stock);        
        return $stmt->execute();
    }
}