<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/index.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/categoria.css">


<br>
<div class="col-md-6 center" >
	<form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-primary btn-lg" type="submit">Buscar</button>
	</form>
	
</div>
<br>
<center>
        <h3>Todas las Categorias que te imaginas</h3>
</center>

<div class="container">
	<div class="full-width container-category centreadoCat">
	<?php
		
		foreach($categorias->result() as $row){?>
			<a href="<?php echo base_url(); ?>index.php/anuncio/agregar_vehiculo" id="<?php echo $row->color?>">
				<i class="fas fa-<?php echo $row->icono?>" aria-hidden="true"></i>
				<span><?php echo strtoupper($row->nombre)?></span>
			</a><?php
			
		}?>
	</div>
</div>
<br>