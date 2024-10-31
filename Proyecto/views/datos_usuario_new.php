<?php
require_once("head.php");
?>
<?php
require_once('models/panel.php');
$cpanel = new panel();
$accesos = $cpanel->getAccesos();
require_once('views/panel.php');

if(isset($_POST["btn_enviar"]) || isset($_POST["btn_actualizar"])){

    require_once('models/listado_usuario.php');
    $listado = new listado();
    $registros = $listado->listado_de_usuarios();
    require_once('views/listado_usuario.php');
    
}
else
{
?>
<body>
    <div class="container">
        <div class="centrado">
            <h1>Ingreso de Nuevos Usuarios a SIMAP</h1>
        </div>
        </br>    
        </br>    
        <form method="POST" action="#" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-3">N&uacute;mero de identificaci&oacute;n:</label>
                        <div class="col-md-9">
                            <input type="number" name="num_ide" class="form-control m-b-5" required class="form-control" placeholder="N&uacute;mero de identificaci&oacute;n" value="<?=$usuario->get_num_identificacion()?>" />
                        </div>
                    </div> 
                    </br>    
                    <div class="col-md-6">
                    <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-3">Nombre:</label>
                        <div class="col-md-9">
                            <input type="text" name="txt_nombre" class="form-control m-b-5" required class="form-control" placeholder="Nombre" value="<?=$usuario->get_dsc_nombre()?>" />
                        </div>
                    </div> 
</br>               
                    <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-3">Primer Apellido:</label>
                        <div class="col-md-9">
                            <input type="text" name="txt_apellido1" class="form-control m-b-5" required class="form-control" placeholder="Primer Apellido" value="<?=$usuario->get_dsc_apellido1()?>" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-3">Segundo Apellido:</label>
                        <div class="col-md-9">
                            <input type="text" name="txt_apellido2" class="form-control m-b-5" required class="form-control" placeholder="Segundo Apellido" value="<?=$usuario->get_dsc_apellido2()?>"/>
                        </div>
                    </div>  
                    <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-3">Correo electr&oacute;nico:</label>
                        <div class="col-md-9">
                            <input type="email" name="txt_email" class="form-control m-b-5" required class="form-control" placeholder="Correo electr&oacute;nico" value="<?=$usuario->get_dsc_correo()?>" />
                        </div>
                    </div>  
                    <div class="form-group row m-b-15">
                        <label class="col-form-label col-md-3">Tipo de Usuario:</label>
                        <div class="col-md-9">
                            <select name="sel_usuario" required class="form-control" class="form-control">
                                <option value="" selected>Seleccione</option>
                                <option value="ADMIN" <?=($usuario->get_tipo_usuario() == "ADMIN")?"Selected":""?>>ADMIN</option>
                                <option value="USER" <?=($usuario->get_tipo_usuario() == "USER")?"Selected":""?>>USER</option>                                                    
                            </select>
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                    <label class="col-form-label col-md-3">Contrase&ntilde;a:</label>
                        <div class="col-md-9">
                          <input type="password" name="txt_contrasena" class="form-control m-b-5" required class="form-control" placeholder="Contrase&ntilde;a" value="<?=$usuario->get_contrasena()?>" />
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