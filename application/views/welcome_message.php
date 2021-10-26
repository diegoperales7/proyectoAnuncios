<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/index.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/categoria.css">


<br>
<div class="col-md-6 center" >
	<?php 
		include_once "inc/buscador_view.php";
	?>
	
</div>
<br>
<center>
        <h3>Todas las Categorias que te imaginas</h3>
</center>

<div class="container">
	<div class="full-width container-category centreadoCat">
	<?php
		
		foreach($categorias->result() as $row){?>
			<a href="<?php echo base_url(); ?>index.php/anuncio/busquedacategoria?cat=<?php echo $row->idCategoria;?>" id="<?php echo $row->color?>">
				<i class="fas fa-<?php echo $row->icono?>" aria-hidden="true"></i>
				<span><?php echo strtoupper($row->nombre)?></span>
			</a><?php
			
		}?>
	</div>
</div>
<br>