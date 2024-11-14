<?php
require_once 'Conexion.php';

class Usuario {
    private $conn;

    public function __construct() {
        $this->conn = (new Conexion())->conectar();
    }

    public function obtenerUsuarios() {
        $sql = "SELECT identificacion,nombre,apellido1,apellido2,correo,perfil FROM usuario";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crearUsuario($identificacion,$nombre,$apellido1,$apellido2,$correo,$perfil,$contrasena) {
        $sql = "INSERT INTO usuario (identificacion,nombre, apellido1,apellido2,correo,perfil,contrasena) VALUES (:identificacion,:nombre,:apellido1,:apellido2,:correo,:perfil,:contrasena)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':identificacion', $identificacion);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido1', $apellido1);
        $stmt->bindParam(':apellido2', $apellido2);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':perfil', $perfil);
        $stmt->bindParam(':contrasena', $contrasena);        
        return $stmt->execute();
    }

    
}
?>