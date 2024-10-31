<?php
require_once('conexion.php');
class listado{
    private $bd;
    private $conn;
    private $sql;
    private $listado;

    public function listado_de_usuarios(){
        $this->bd = new conexion();
        $this->conn = $this->bd->crear_conexion();
        $this->sql = "SELECT IDENTIFICACION, NOMBRE, APELLIDO1, APELLIDO2, CORREO,PERFIL FROM USUARIO ORDER BY IDENTIFICACION";
        $this->listado = $this->conn->prepare($this->sql);
        $this->listado->execute();
        $this->listado = $this->listado->fetchAll(PDO::FETCH_ASSOC);
        $this->bd->cerrar_conexion();
        return $this->listado;
    }
}
?>