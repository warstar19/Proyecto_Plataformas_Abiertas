<?php
class panel{
    private $accesos;

    public function __construct(){
        //consulta a la base de datos, que obtenga todos los modulos del sistema
        $this->accesos = array(
            array(1, "Inicio", "index.php?modulo=1"),
            array(2, "Crear Nuevo Usuario", "index.php?modulo=2"),
            array(3, "Usuarios", "index.php?modulo=3"),
            array(4, "Crear Nuevo Articulo", "index.php?modulo=4"),
            array(5, "Articulos", "index.php?modulo=5"),
            array(6, "Salir", "index.php?modulo=6")
        );
    }

    public function getAccesos(){
        return $this->accesos;
    }
}
?>