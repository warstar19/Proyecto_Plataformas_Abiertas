<?php
require_once('conexion.php');
class login{
    private $usuario;
    private $contrasena;
    private $bd;
    private $conn;
    private $sql;
    private $resultado;

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function setContrasena($contrasena){
        $this->contrasena = $contrasena;
    }

    public function getContrasena(){
        return $this->contrasena;
    }

    public function acceder(){
        //Instanciar la conexion a la base datos
        $this->bd = new conexion();
        //Crear a la base de datos
        $this->conn = $this->bd->crear_conexion();
        //Declarar un query
        $this->sql = "SELECT NOMBRE, APELLIDO1, APELLIDO2, CORREO, PERFIL FROM USUARIO WHERE IDENTIFICACION = :usuario AND CONTRASENA = :contrasena";
        //Preparar una query
        $this->resultado = $this->conn->prepare($this->sql);
        //Asignacion de valores de la query
        $this->resultado->bindParam(':usuario', $this->usuario, PDO::PARAM_INT, 12);
        $this->resultado->bindParam(':contrasena', $this->contrasena, PDO::PARAM_STR, 50);
        //Ejecutar
        $this->resultado->execute();
        //Retornar
        $this->resultado = $this->resultado->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultado;
        
    }
}
?>