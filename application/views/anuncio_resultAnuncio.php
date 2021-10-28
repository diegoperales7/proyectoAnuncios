<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/index.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/reportes.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/anuncio.css"> -->


<div class="row">    
             
    <?php
        if($anuncios){
            foreach($anuncios as $row){
                ?>   
                <div class="col-12 borderAnuncio sb" >
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
                            <div class="col-3">
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
                    <a class="btn btn-success botonPie" href="<?php echo base_url(); ?>index.php/usuario/logout"><i class="far fa-envelope "></i> Mensaje</a>
                                        <a class="btn btn-success botonPie" href=""><i class="fab fa-whatsapp"></i> WhatsApp</a>
                                        <a class="btn btn-outline-danger botonPie" href=""><i class="fas fa-exclamation-triangle"></i> Denunciar</a>
                    </div>
                    
    
                </div>
                    
            <?php        
            }
            
        }else{
            echo "No se encontraron resultados para la busqueda";
        }
        ?>
    </div>

</div>

<!-- 
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/jquery.validate.min.js"></script>

<script src="<?php echo base_url(); ?>bootstrap/js/usuario.js"></script>


<script src="https://kit.fontawesome.com/0b0aaf346f.js" crossorigin="anonymous"></script> -->
