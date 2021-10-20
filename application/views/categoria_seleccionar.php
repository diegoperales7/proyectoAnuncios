<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/index.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/categoria.css">


<br>

    <center><h3>Elige una categoria para publicar tu anuncio</h3></center>
<br>
<div class="container">
	<div class="full-width container-category centreadoCat">
	<?php
		$cont=1;
		foreach($categorias->result() as $row){?>
			
			
			<a href="<?php echo base_url(); ?>index.php/anuncio/agregar?cat=<?php echo $row->idCategoria?>" id="cat-<?php echo $cont?>">
				<i class="fas fa-<?php echo $row->icono?>" aria-hidden="true"></i>
				<span><?php echo strtoupper($row->nombre)?></span>
				
				
			</a><?php
			$cont++;	
			
		}?>
	</div>
</div>
    <br>
        

        


	





    

