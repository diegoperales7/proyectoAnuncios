<br>
<div class="container-fluid ">
    <div class="row">

    <div class="col-6 offset-md-2 buscador">
    <input class="form-control" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">Buscar</button>
    </div>
    
        <?php
        foreach($anuncios->result() as $row){
            ?>   
           
            <div class="col-6 offset-md-2 borderAnuncio sb" >
                <div class="cabeza">
                    <h6><?php echo $row->tipo;?></h6>
                    <span><?php echo $row->codigo;?></span>
                    <span><?php echo $row->fechaRegistro;?></span>
                </div>
                <div class="cuerpo">
                    <div class="row tam">
                        <div class="col-9 pad">
                            <h5><a href=""><?php echo $row->titulo;?></a> </h5>
                            <i class="fas fa-list-ul "> <?php echo $row->nombre;?></i>
                            <i class="fas fa-map-marked-alt"> <?php echo $row->ciudad;?></i>
                            <p><?php echo $row->descripcion;?></p>
                            
                        </div>
                        <div class="col-3 sbp">
                            <img class="imgAnuncio" src="<?php echo base_url();?>uploads/anuncio/<?php echo $row->fotos?>" >
                        
                        </div>
                    </div> 
                     <ul class="camposCat"> 
                     
                        <li><span>Automatico</span></li>
                        <li><span>Suzuki</span></li>
                        <li><span>180000km</span></li>
                        
                    </ul>
                    
                   
                    <h3 class="precio"><?php echo $row->precio;?> Bs</h3>
                </div>
                
                <div class="pie">
                    <a class="btn btn-primary botonPie" href="<?php echo base_url(); ?>index.php/usuario/logout">Editar</a>
                    <a class="btn btn-danger botonPie" href="<?php echo base_url(); ?>index.php/usuario/logout">Eliminar</a>
                </div>
                

            </div>
                
        <?php        
        }
        ?>
            <div class="col-2">
            <div class="sectionCat">
                <span>Otras Categorias</span>
            </div>
            <?php
            
            foreach($categorias->result() as $row){?>
                <div class="sectionCat">
                <span><a href=""><?php echo $row->nombre?></a></span>
                </div>    
                <?php
                	
            }?>
        </div>
        
    </div>
</div>
