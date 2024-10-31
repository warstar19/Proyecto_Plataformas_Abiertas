<?php
require_once('head.php');
?>
<body>
    <div class="container">
        <div class="centrado">
        <h1>BIENVENIDO</h1>
        <br/>
        <img src="logo-main.png" alt="Esto es mi logo" width="250px">
       </div>
        <form method="POST" action="#" enctype="multipart/form-data">
        <br/>
        <br/>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row m-b-15">
                        <div class="col-md-9">
                        <input type="number" name="num_ide" class="form-control m-b-5" placeholder="N&uacute;mero de identificaci&oacute;n" />
                        </div>
                    </div>
                    <br/>               
                    <div class="form-group row m-b-15">
                        <div class="col-md-9">
                          <input type="password" name="txt_contrasena" class="form-control m-b-5" placeholder="Contrase&ntilde;a" />
                        </div>
                    </div>                     
                </div>
                
                <div class="col-md-12">
                <br/>
                <br/>
                    <div class="float-right">
                    <p align="center">   
                        <input type="submit" class="btn btn-dark" name="btn_ingresar" value="Ingresar" >
                    </p>
                   </div>
                </div>
                <br/>
                <?php
                if($error){
                    echo $msj;
                }
                //else{echo $msj;}
                ?>
            </div>                                                        
        </form>      
    </div>
</body>
<?php
require_once('footer.php');
?>