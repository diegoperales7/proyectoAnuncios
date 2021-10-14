<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/index.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/categoria.css">

<br>
<div class="col-md-6 center" >
        
        
	<form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-primary btn-lg" type="submit">Buscar</button>
	</form>


        <br>

        <div class="row">
        <div class="col-12">
        <lu class="botonEnlaces">
                <li><a class="btn btn-success btn-xs" href="<?php echo base_url(); ?>index.php/categoria/lista">Publicar Anuncio</a></li>
                <li><a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>index.php/usuario/misAnuncios">Mis Anuncios</a></li>
                <li><a class="btn btn-warning btn-xs" href="">Anuncios destacados</a></li>
        </lu>
        </div>
        </div>
        
        
        
<br>

	
</div>

<div class="container">
	<div class="full-width container-category centreadoCat">
	<?php
		$cont=1;
		foreach($categorias->result() as $row){?>
			<a href="<?php echo base_url(); ?>index.php/anuncio/agregar_vehiculo" id="cat-<?php echo $cont?>">
				<i class="fas fa-<?php echo $row->icono?>" aria-hidden="true"></i>
				<span><?php echo strtoupper($row->nombre)?></span>
			</a><?php
			$cont++;	
		}?>
	</div>
</div>


<br>



    

