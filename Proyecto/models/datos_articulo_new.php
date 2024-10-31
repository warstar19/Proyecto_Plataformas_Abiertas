<?php
require_once('conexion.php');
class datos{
    private $num_identificacion;
    private $dsc_nombre;
    private $dsc_fech_ing;
    private $dsc_material;
    private $dsc_usuario_reg;
    private $valor_articulo;
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

    public function set_fech_ing($dsc_fech_ing){
        $this->dsc_fech_ing = $dsc_fech_ing;
    }

    public function get_fech_ing(){
        return $this->dsc_fech_ing;
    }   
    
    public function set_dsc_tmaterial($dsc_material){
        $this->dsc_material = $dsc_material;
    }

    public function get_dsc_tmaterial(){
        return $this->dsc_material;
    } 
       
    public function set_usuario_reg($dsc_usuario_reg){
        $this->dsc_usuario_reg = $dsc_usuario_reg;
    }

    public function get_usuario_reg(){
        return $this->dsc_usuario_reg;
    }   
     
    public function set_valor_articulo($valor_articulo){
        $this->valor_articulo = $valor_articulo;
    }

    public function get_valor_articulo(){
        return $this->valor_articulo;
    }     
    
    public function insertar_articulo(){
        $this->bd = new conexion();
        $this->conn = $this->bd->crear_conexion();
        $this->sql = "INSERT INTO ARTICULO (
            ID_ARTICULO,
            NOMBRE_ART,
            FECHA_ING, 
            TIPO_MATERIAL,
            USER,
            VALOR            
        ) VALUES (
            :num_identificacion,
            :dsc_nombre,
            :dsc_fech_ing,
            :dsc_material,            
            :dsc_usuario_reg,
            :valor_articulo
        )";
        $this->resultado = $this->conn->prepare($this->sql);        
        $this->resultado->bindParam(':num_identificacion', $this->num_identificacion, PDO::PARAM_INT, 10);
        $this->resultado->bindParam(':dsc_nombre', $this->dsc_nombre, PDO::PARAM_STR, 20);
        $this->resultado->bindParam(':dsc_fech_ing', $this->dsc_fech_ing, PDO::PARAM_STR, 20);
        $this->resultado->bindParam(':dsc_material', $this->dsc_material, PDO::PARAM_STR, 20);
        $this->resultado->bindParam(':dsc_usuario_reg', $this->dsc_usuario_reg, PDO::PARAM_INT, 10);
        $this->resultado->bindParam(':valor_articulo', $this->valor_articulo, PDO::PARAM_INT, 10);
        
        if($this->resultado->execute()){
            
            echo "<div class=\"alert alert-danger\">Registro Insertado</div>";
        }else{
            
            echo "<div class=\"alert alert-danger\">Registro No Insertado</div>";
        }
        $this->bd->cerrar_conexion();
    }


    public function consultar_articulos(){

        $this->bd = new conexion();
        $this->conn = $this->bd->crear_conexion();
        $this->sql = "SELECT * FROM ARTICULO WHERE ID_ARTICULO = :num_identificacion";
        $this->resultado = $this->conn->prepare($this->sql);
        $this->resultado->bindParam(":num_identificacion", $this->num_identificacion, PDO::PARAM_INT, 10);
        $this->resultado->execute();
        $this->resultado = $this->resultado->fetchAll(PDO::FETCH_ASSOC);
        $this->bd->cerrar_conexion();   
        $this->llenar_objeto_articulo($this->resultado);
        
    }

    public function llenar_objeto_articulo($resultado){
        $this->set_dsc_nombre($resultado[0]["NOMBRE_ART"]);
        $this->set_fech_ing($resultado[0]["FECHA_ING"]);
        $this->set_dsc_tmaterial($resultado[0]["TIPO_MATERIAL"]);
        $this->set_usuario_reg($resultado[0]["USER"]);
        $this->set_valor_articulo($resultado[0]["VALOR"]);
        
        
    }


    public function actualizar_articulo(){
        
        $this->bd = new conexion();
        $this->conn = $this->bd->crear_conexion();   
        $this->sql = "UPDATE ARTICULO SET 
        NOMBRE_ART = :dsc_nombre,
        FECHA_ING = :dsc_fech_ing,
        TIPO_MATERIAL = :dsc_material,
        USER = :dsc_usuario_reg,
        VALOR = :valor_articulo
        WHERE ID_ARTICULO = :num_identificacion";
        $this->resultado = $this->conn->prepare($this->sql);        
        $this->resultado->bindParam(':num_identificacion', $this->num_identificacion, PDO::PARAM_INT, 10);
        $this->resultado->bindParam(':dsc_nombre', $this->dsc_nombre, PDO::PARAM_STR, 20);
        $this->resultado->bindParam(':dsc_fech_ing', $this->dsc_fech_ing, PDO::PARAM_STR, 20);
        $this->resultado->bindParam(':dsc_material', $this->dsc_material, PDO::PARAM_STR, 20);
        $this->resultado->bindParam(':dsc_usuario_reg', $this->dsc_usuario_reg, PDO::PARAM_INT, 10);
        $this->resultado->bindParam(':valor_articulo', $this->valor_articulo, PDO::PARAM_INT, 10);
      
        if($this->resultado->execute()){
            echo "<div class=\"alert alert-danger\">Registro Actualizado</div>";
            
        }else{
            echo "<div class=\"alert alert-danger\">Error en Actualizacion</div>";
        }
        $this->bd->cerrar_conexion();       
                
            
        
    }

    public function eliminar_articulo(){
        $this->bd = new conexion();
        $this->conn = $this->bd->crear_conexion();
        $this->sql = "DELETE FROM ARTICULO WHERE ID_ARTICULO = :num_identificacion";
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