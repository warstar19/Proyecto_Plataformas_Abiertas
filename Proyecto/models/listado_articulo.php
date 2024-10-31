<?php
require_once('conexion.php');
class listado{
    private $bd;
    private $conn;
    private $sql;
    private $listado;

    public function listado_de_articulos(){
        $this->bd = new conexion();
        $this->conn = $this->bd->crear_conexion();
        $this->sql = "SELECT ID_ARTICULO,NOMBRE_ART, FECHA_ING, TIPO_MATERIAL,NOMBRE,APELLIDO1,APELLIDO2, VALOR FROM ARTICULO INNER JOIN USUARIO ON (IDENTIFICACION=USER) ORDER BY ID_ARTICULO; ";
        $this->listado = $this->conn->prepare($this->sql);
        $this->listado->execute();
        $this->listado = $this->listado->fetchAll(PDO::FETCH_ASSOC);
        $this->bd->cerrar_conexion();
        return $this->listado;
    }
}
?>