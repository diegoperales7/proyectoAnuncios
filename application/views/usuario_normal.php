<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/index.css">

<br>
<div class="col-md-6 center" >
	<form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-primary btn-lg" type="submit">Buscar</button>
	</form>
        <br>
        <div class="row">
        <div class="col-3">
                <?php 
                        echo form_open_multipart('anuncio/agregar');
                ?>
                <button type="submit" class="btn btn-success btn-xs">Publicar Anuncio</button>

                <?php
                        echo form_close()
                ?>
        </div>
        <div class="col-2">
        <?php 
                echo form_open_multipart('usuario/misAnuncios');
            ?>
            <button type="submit" class="btn btn-primary btn-xs">Mis anuncios</button>

            <?php
                echo form_close()
            ?>
        </div>

        <div class="col-2">
        <?php 
            echo form_open_multipart('usuario/logout');
        ?>
            <button type="submit" class="btn btn-danger btn-xs">Cerrar Sesion</button>
        <?php 
             echo form_close();
            ?>
        </div>
        </div>
        
        


	
</div>
<center>
<img width="1100" height="400" src="<?php echo base_url(); ?>bootstrap/img/menu.jpg" >
</center>




    

