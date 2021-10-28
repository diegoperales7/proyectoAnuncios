<center><h3>Mis anuncios</h3></center>
<div class="container-fluid ">
    <div class="row">
    
        <?php
        foreach($anuncios as $row){
            ?>   
           
            <div class="col-6 offset-md-3 borderAnuncio sb" >
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
                            <?php
                                $foto=$row->fotos;
                                    if ($foto=="") {
                                        // mostrar foto por defecto
                                        ?>
                                        <img class="imgAnuncio" src="<?php echo base_url();?>uploads/anuncio/perfil.jpg">
                                        <?php
                                    }
                                    else{
                                        //mostrar foto del usuario 
                                        ?>
                                        <img class="imgAnuncio" src="<?php echo base_url();?>uploads/anuncio/<?php echo $row->fotos?>" >
                                        <?php
                                    }
                                
                            ?>                          
                        </div>

                          
                    </div> 
                     <ul class="camposCat"> 
                        <?php
                            foreach($row->datosCategoria as $rowCategoria){?>
                                <li><span><?php echo $rowCategoria->valor;?></span></li><?php
                            }
                        ?> 
                        
                        
                    </ul>
                    
                   
                    <h3 class="precio"><?php echo $row->precio;?> Bs</h3>
                </div>
                
                <div class="pie">
                    <a class="btn btn-primary botonPie" href="<?php echo base_url(); ?>index.php/usuario/logout">Editar</a>
                    <a class="btn btn-danger botonPie" href="<?php echo base_url(); ?>index.php/anuncio/eliminar?var=<?php echo $row->idAnuncio?>">Eliminar</a>
                </div>
                

            </div>
                
        <?php        
        }
        ?>
        
    </div>
</div>
