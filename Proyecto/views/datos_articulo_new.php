<?php
require_once("head.php");
?>
<?php
require_once('models/panel.php');
$cpanel = new panel();
$accesos = $cpanel->getAccesos();
require_once('views/panel.php');
if(isset($_POST["btn_enviar_art"]) || isset($_POST["btn_actualizar_art"])){

    require_once('models/listado_articulo.php');
    $listado = new listado();
    $registros = $listado->listado_de_articulos();
    require_once('views/listado_articulo.php');
    
}
else
{
?>
<body>
    <div class="container">
        <div class="centrado">
            <h1>Ingreso de Nuevos Articulos a SIMAP</h1>
        </div>
        </br>    
        </br>    
        <form method="POST" action="#" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-3">C&oacute;digo de Identificaci&oacute;n:</label>
                        <div class="col-md-9">
                            <input type="number" name="num_id_art" class="form-control m-b-5" required class="form-control" placeholder="C&oacute;digo de Identificaci&oacute;n" value="<?=$articulo->get_num_identificacion()?>"/>
                        </div>
                    </div> 
                    </br>    
                    <div class="col-md-6">
                    <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-3">Nombre:</label>
                        <div class="col-md-9">
                            <input type="text" name="txt_nombre_articulo" class="form-control m-b-5" required class="form-control" placeholder="Nombre" value="<?=$articulo->get_dsc_nombre()?>"/>
                        </div>
                    </div> 
</br>               
                    <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-3">Fecha de Ingreso de Articulo:</label>
                        <div class="col-md-9">
                        <input type="DATE" required class="form-control" name="Fecha_ing_art" value="<?=$articulo->get_fech_ing()?>"/>
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-3">Tipo de Material:</label>
                        <div class="col-md-9">
                            <input type="text" name="txt_material" class="form-control m-b-5" required class="form-control" placeholder="Tipo de Material del Articulo" value="<?=$articulo->get_dsc_tmaterial()?>" />
                        </div>
                    </div>  
                    <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-3">Usuario que hace el registro:</label>
                        <div class="col-md-9">
                            <select name="sel_usuario_reg" required class="form-control" class="form-control" >
                                <option value="" selected>Seleccione</option>
                                <?php
                                    require_once('models/listado_usuario.php');
                                    $listado = new listado();
                                    $registros = $listado->listado_de_usuarios();
                                    foreach ($registros as $usuario){                                    
                                 ?>                                     
                                    <option value="<?=$usuario["IDENTIFICACION"]?>" <?=($articulo->get_usuario_reg() == $usuario["IDENTIFICACION"])?"Selected":""?>><?=$usuario["NOMBRE"]." ".$usuario["APELLIDO1"]." ".$usuario["APELLIDO2"]?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                    <label class="col-form-label col-md-3">Valor en Libros:</label>
                        <div class="col-md-9">
                          <input type="number" name="valor_art" class="form-control m-b-5" required class="form-control" placeholder="Valor del Art&iacute;culo" value="<?=$articulo->get_valor_articulo()?>" />
                        </div>
                    </div>
                    </br>       
                    <div class="col-md-12">
                    <div class="float-right">
                        <?=$btn_formulario?>
                    </div>
                </div>                    
                </div>
                </br>  
                </br>  
                <?php
                if($error){
                    echo $msj;                    
                }
                ?>
            </div>
        </form>      
    </div>
</body>
<?php

require_once("footer.php");
?>
<?php
                
            }
                            
            ?>