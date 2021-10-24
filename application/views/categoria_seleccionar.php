<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/index.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/categoria.css">


<br>

    <center><h3>Elige una categoria para publicar tu anuncio</h3></center>
<br>
<div class="container">
	<div class="full-width container-category centreadoCat">
		<?php
			foreach($categorias->result() as $row){?>		
				<a href="<?php echo base_url(); ?>index.php/anuncio/agregar?cat=<?php echo $row->idCategoria?>" id="<?php echo $row->color?>">
					<i class="fas fa-<?php echo $row->icono?>" aria-hidden="true"></i>
					<span><?php echo strtoupper($row->nombre)?></span>
				</a><?php
				
		}?>
		<a href="<?php echo base_url(); ?>index.php/anuncio/agregar_empleo?cat=3" id="cat-3">
			<i class="fas fa-suitcase" aria-hidden="true"></i>
			<span>EMPLEOS</span>
		</a>
		<a href="<?php echo base_url(); ?>index.php/anuncio/agregar_formacion?cat=8" id="cat-8">
			<i class="fas fa-graduation-cap" aria-hidden="true"></i>
			<span>FORMACION</span>
		</a>
	</div>
</div>
    <br>
        

        


	





    

