<?php
require_once('head.php');
?>
<?php
require_once('models/panel.php');
$cpanel = new panel();
$accesos = $cpanel->getAccesos();
require_once('views/panel.php');
?>
<div class="container">
    <div class="centrado">
        <h1>Listado de Articulos Registrados en SIMAP</h1>
        <br/>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Código de Identificaci&oacute;n</th>    
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha de Ingreso</th>
                        <th scope="col">Tipo de Material</th>
                        <th scope="col">Usuario que registr&oacute;</th>
                        <th scope="col">Valor en colones</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($registros as $registro) {
                    ?>
                    <tr>
                        <td><?=$registro["ID_ARTICULO"]?></td>
                        <td><?=$registro["NOMBRE_ART"]?></td>
                        <td><?=$registro["FECHA_ING"]?></td>
                        <td><?=$registro["TIPO_MATERIAL"]?></td>
                        <td><?=$registro["NOMBRE"]." ".$registro["APELLIDO1"]." ".$registro["APELLIDO2"]?></td>
                        <td><?=$registro["VALOR"]?></td>  
                        <td>
                            <form method="POST" action="index.php?modulo=4">
                                <input type="hidden" name="hd_articulo" value="<?=$registro["ID_ARTICULO"]?>" />
                                <input type="submit" name="actualizar" value="Actualizar" class="btn btn-primary"/>
                            </form>
                            </br>                             
                            <form method="POST" action="index.php?modulo=5">
                                <input type="hidden" name="hd_articulo" value="<?=$registro["ID_ARTICULO"]?>" />                                
                                <input type="submit" name="borrar" value="Borrar" class="btn btn-danger"/>
                            </form>
                        </td>                                           
                    </tr>                    
                    <?php
                    }
                    ?>                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
require_once('footer.php');
?>