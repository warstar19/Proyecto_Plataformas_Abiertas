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
        <h1>Listado de usuarios de SIMAP</h1>
        <br/>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">N&uacute;mero de identificaci&oacute;n</th>    
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido Paterno</th>
                        <th scope="col">Apellido Materno</th>
                        <th scope="col">Correo electr&oacute;nico</th>
                        <th scope="col">Tipo de Usuario</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($registros as $registro) {
                    ?>
                    <tr>
                        <td><?=$registro["IDENTIFICACION"]?></td>
                        <td><?=$registro["NOMBRE"]?></td>
                        <td><?=$registro["APELLIDO1"]?></td>
                        <td><?=$registro["APELLIDO2"]?></td>
                        <td><?=$registro["CORREO"]?></td>
                        <td><?=$registro["PERFIL"]?></td>  
                        <td>
                            <form method="POST" action="index.php?modulo=2">
                                <input type="hidden" name="hd_usuario" value="<?=$registro["IDENTIFICACION"]?>" />
                                <input type="submit" name="actualizar" value="Actualizar" class="btn btn-primary"/>
                            </form>
                            </br>                             
                            <form method="POST" action="index.php?modulo=3">
                                <input type="hidden" name="hd_usuario" value="<?=$registro["IDENTIFICACION"]?>" />                                
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