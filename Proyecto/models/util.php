<?php
class util{
    public function modulo($modulo){
        switch ($modulo) {
            case 1: $acceso = 'panel'; break;
            case 2: $acceso = 'datos_usuario_new'; break;
            case 3: $acceso = 'listado_usuario'; break;
            case 4: $acceso = 'datos_articulo_new'; break;
            case 5: $acceso = 'listado_articulo'; break;
            case 6: $acceso = 'salir';break;
        }
        return $acceso;
    }
}
?>