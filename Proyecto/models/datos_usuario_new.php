<?php

require_once('conexion.php');
class datos{
    private $num_identificacion;
    private $dsc_nombre;
    private $dsc_apellido1;
    private $dsc_apellido2;
    private $dsc_correo;
    private $tipo_usuario;
    private $contrasena;
    private $bd;
    private $conn;
    private $sql;
    private $resultado;

    public function set_num_identificacion($num_identificacion){
        $this->num_identificacion = $num_identificacion;
    }

    public function get_num_identificacion(){
        return $this->num_identificacion;
    }

    public function set_dsc_nombre($dsc_nombre){
        $this->dsc_nombre = $dsc_nombre;
    }

    public function get_dsc_nombre(){
        return $this->dsc_nombre;
    }    

    public function set_dsc_apellido1($dsc_apellido1){
        $this->dsc_apellido1 = $dsc_apellido1;
    }

    public function get_dsc_apellido1(){
        return $this->dsc_apellido1;
    }   
    
    public function set_dsc_apellido2($dsc_apellido2){
        $this->dsc_apellido2 = $dsc_apellido2;
    }

    public function get_dsc_apellido2(){
        return $this->dsc_apellido2;
    } 
       
    public function set_dsc_correo($dsc_correo){
        $this->dsc_correo = $dsc_correo;
    }

    public function get_dsc_correo(){
        return $this->dsc_correo;
    }   
     
    public function set_tipo_usuario($tipo_usuario){
        $this->tipo_usuario = $tipo_usuario;
    }

    public function get_tipo_usuario(){
        return $this->tipo_usuario;
    }     
    
    public function set_contrasena($contrasena){
        $this->contrasena = $contrasena;
    }

    public function get_contrasena(){
        return $this->contrasena;
    } 
     
    public function insertar_usuario(){
        $this->bd = new conexion();
        $this->conn = $this->bd->crear_conexion();
        $this->sql = "INSERT INTO USUARIO (
            IDENTIFICACION,
            NOMBRE,
            APELLIDO1, 
            APELLIDO2,
            CORREO,
            PERFIL,
            CONTRASENA
        ) VALUES (
            :num_identificacion,
            :dsc_nombre,
            :dsc_apellido1,
            :dsc_apellido2,
            :dsc_correo,
            :tipo_usuario,
            :contrasena
        )";
        $this->resultado = $this->conn->prepare($this->sql);
        $this->resultado->bindParam(':num_identificacion', $this->num_identificacion, PDO::PARAM_INT, 10);
        $this->resultado->bindParam(':dsc_nombre', $this->dsc_nombre, PDO::PARAM_STR, 20);
        $this->resultado->bindParam(':dsc_apellido1', $this->dsc_apellido1, PDO::PARAM_STR, 20);
        $this->resultado->bindParam(':dsc_apellido2', $this->dsc_apellido2, PDO::PARAM_STR, 20);
        $this->resultado->bindParam(':dsc_correo', $this->dsc_correo, PDO::PARAM_STR, 40);
        $this->resultado->bindParam(':tipo_usuario', $this->tipo_usuario, PDO::PARAM_STR, 10);
        $this->resultado->bindParam(':contrasena', $this->contrasena, PDO::PARAM_STR, 20);
        if($this->resultado->execute()){
            echo "<div class=\"alert alert-danger\">Registro Insertado</div>";
        }else{
            echo "<div class=\"alert alert-danger\">Registro No Insertado</div>";
        }
        $this->bd->cerrar_conexion();
    }

    public function consultar_usuario(){

        $this->bd = new conexion();
        $this->conn = $this->bd->crear_conexion();
        $this->sql = "SELECT * FROM USUARIO WHERE IDENTIFICACION = :num_identificacion";
        $this->resultado = $this->conn->prepare($this->sql);
        $this->resultado->bindParam(":num_identificacion", $this->num_identificacion, PDO::PARAM_INT, 10);
        $this->resultado->execute();
        $this->resultado = $this->resultado->fetchAll(PDO::FETCH_ASSOC);
        $this->bd->cerrar_conexion();   
        $this->llenar_objeto($this->resultado);

    }

    public function llenar_objeto($resultado){
        $this->set_dsc_nombre($resultado[0]["NOMBRE"]);
        $this->set_dsc_apellido1($resultado[0]["APELLIDO1"]);
        $this->set_dsc_apellido2($resultado[0]["APELLIDO2"]);
        $this->set_dsc_correo($resultado[0]["CORREO"]);
        $this->set_tipo_usuario($resultado[0]["PERFIL"]);
        $this->set_contrasena($resultado[0]["CONTRASENA"]);
        
    }


    public function actualizar_usuario(){
        
        $this->bd = new conexion();
        $this->conn = $this->bd->crear_conexion();   
        $this->sql = "UPDATE USUARIO SET 
        NOMBRE = :dsc_nombre,
        APELLIDO1 = :dsc_apellido1,
        APELLIDO2 = :dsc_apellido2,
        CORREO = :dsc_correo,
        PERFIL = :tipo_usuario,
        CONTRASENA = :contrasena
        WHERE IDENTIFICACION = :num_identificacion";
        $this->resultado = $this->conn->prepare($this->sql);
        $this->resultado->bindParam(':dsc_nombre', $this->dsc_nombre, PDO::PARAM_STR, 20);
        $this->resultado->bindParam(':dsc_apellido1', $this->dsc_apellido1, PDO::PARAM_STR, 20);
        $this->resultado->bindParam(':dsc_apellido2', $this->dsc_apellido2, PDO::PARAM_STR, 20);
        $this->resultado->bindParam(':dsc_correo', $this->dsc_correo, PDO::PARAM_STR, 40);
        $this->resultado->bindParam(':tipo_usuario', $this->tipo_usuario, PDO::PARAM_STR, 10);
        $this->resultado->bindParam(':contrasena', $this->contrasena, PDO::PARAM_STR, 20);
        $this->resultado->bindParam(':num_identificacion', $this->num_identificacion, PDO::PARAM_INT, 10);
      
        if($this->resultado->execute()){
            echo "<div class=\"alert alert-danger\">Registro Actualizado</div>";
            
        }else{
            echo "<div class=\"alert alert-danger\">Error en Actualizacion</div>";
        }
        $this->bd->cerrar_conexion();       
                
            
        
    }


    public function eliminar_usuario(){
        $this->bd = new conexion();
        $this->conn = $this->bd->crear_conexion();
        $this->sql = "DELETE FROM USUARIO WHERE IDENTIFICACION = :num_identificacion";
            $this->resultado = $this->conn->prepare($this->sql);
            $this->resultado->bindParam(":num_identificacion", $this->num_identificacion, PDO::PARAM_INT, 10);
            if($this->resultado->execute()){
                $this->bd->cerrar_conexion();
                return true;  
            }
            else{
                $this->bd->cerrar_conexion();
                return false;  
            }
            
    }






}

?>