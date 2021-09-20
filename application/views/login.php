
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/login.css">

<?php
    switch ($msg) {
        case '1':
            $mensaje="Error de Ingreso";
            break;
        case '2':
            $mensaje="Acceso no valido";
            break;
        case '3':
            $mensaje="Gracias por usar el sistema";
            break;
        default:
            $mensaje="Porfavor, Ingrese sus datos";
            break;
    }



?>


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">

            <div class="box redondear">

            <img  src="<?php echo base_url(); ?>bootstrap/img/logo.jpg" width="200" height="150" >
                <?php 
                    echo form_open_multipart('usuario/validarusuario');
                
                
                ?>
                
                    <h1>Inicio de Sesión</h1>
                    <p class="text-muted" ><?php  echo $mensaje; ?></p>
                     <input type="email" name="correo" placeholder="Correo"> 
                     <input type="password" name="contrasena" placeholder="Contraseña"> 
                     <a class="forgot text-muted" href="#">Olvido su contraseña?</a> 
                     <input type="submit" name="" value="Iniciar Sesión" href="#">
                    <div class="col-md-12">
                        <ul class="social-network social-circle">
                            <li><a href="#" class="icoFacebook" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" class="icoTwitter" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" class="icoGoogle" title="Google +"><i class="fab fa-google-plus"></i></a></li>
                        </ul>
                    </div>
               
            <?php 
                echo form_close();
            
            ?>
 </div>


            </div>
        </div>
    </div>
</div>


