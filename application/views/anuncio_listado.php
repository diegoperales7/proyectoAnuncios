<br>
<div class="container-fluid ">
    <div class="container ">
        <div class="row">
            <div class="col-9 " >
                <div class="row tam">
                    <div class="buscador">
                        <?php if (isset($tipoBuscador) && $tipoBuscador=='general') {
                            include_once "inc/buscador_view.php";
                        }else{?>
                        <form id="formCamposCategoria" action="">    
                            <input name="anuncio.titulo" class="form-control" type="search" placeholder="Buscar" aria-label="Search">
                            <div class="busquedaCat">
                                
                                <?php
                                    foreach($camposcategorias->result() as $key=>$row)
                                    {
                                        if (($key+2)%2==0) {
                                            echo '<br>';
                                        }
                                        ?>                  
                                        <label for=""><?php echo $row->nombre?></label>
                                        <input   name="<?php echo 'datoscategoria.valor.'.$row->idCamposCategoria?>" type="text" placeholder="Ingrese su <?php echo strtolower($row->nombre)?>">                                            
                                        <?php
                                        
                                    }?>
                                    <label for="InputCiudad" class="form-label">Ciudad</label>
                                    <select name="ciudad.idCiudad">
                                        <option  value="0" selected>Todas las ciudades</option>
                                        <?php 
                                        foreach ($ciudades->result() as $row) 
                                        {?>
                                            <option value="<?php echo $row->idCiudad; ?>"><?php echo $row->ciudad?></option><?php
                                        }
                                        ?>
                                    </select>  
                                <br>
                                <button id="btnFiltroCategoria" data-idCategoria="<?php echo $idCategoria;?>" class="btn btn-primary" type="submit">Buscar</button>
                            </div>                         
                        </form>

                        <?php }?>
                        
                    </div>
                </div>
                <div class="row tam" id="resultadoFiltroCategoria">         
                    <?php
                        if ($anuncios) {
                            foreach($anuncios as $row)
                            {
                                ?>                           
                                <div class="col-12 borderAnuncio sb" >
                                    <div class="cabeza">
                                        <h6><?php echo $row->tipo;?></h6>
                                        <span><?php echo $row->codigo;?></span>
                                        <span><?php echo date("d/m/Y",strtotime($row->fechaRegistro));?></span>
                                    </div>
                                    <div class="cuerpo">
                                        <div class="row tam">
                                            <div class="col-9 pad">
                                                <h5><a href="<?php echo base_url(); ?>index.php/anuncio/anuncioInfo?var=<?php echo $row->idAnuncio?>"><?php echo $row->titulo;?></a> </h5>
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
                                                    <li>
                                                        <span><?php echo $rowCategoria->valor;?></span>
                                                    </li><?php
                                                }
                                            ?> 
                                            
                                            
                                        </ul>
                                        
                                    
                                        <h3 class="precio"><?php echo $row->precio;?> Bs</h3>
                                        
                                    </div>
                                    
                                    <div class="pie">
                                        <a class="btn btn-success botonPie" href="" data-bs-toggle="modal" data-bs-target="#modalMensaje"><i class="far fa-envelope "></i> Mensaje</a>
                                            <div class="modal fade" id="modalMensaje" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Enviar mail</h4>
                                                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php 
                                                            echo form_open_multipart('anuncio/enviarMensaje');
                                                            ?>
                                                            <label for=InputCorreo" class="form-label">Correo origen</label>
                                                            <input type="text" class="form-control" id="InputCorreo" name="correo" placeholder="Escriba su correo">
                                                            <label for="InputAsunto">Asunto</label>
                                                            <input type="text" class="form-control" id="InputAsunto" name="asunto" placeholder="Escriba el asunto">
                                                            <label for="InputMensaje">Mensaje</label>
                                                            <textarea class="form-control" id="InputMensaje" name="mensaje" placeholder="Escriba su mensaje" ></textarea>

                                                        </div>
                                                        <div  class="modal-footer">
                                                            <button type="submit" class="btn btn-success" >Enviar</button>
                                                            <?php
                                                                echo form_close();                                                    
                                                            ?>
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Cancelar</button>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        <a class="btn btn-success botonPie" href="" data-bs-toggle="modal" data-bs-target="#modalWhatsapp"><i class="fab fa-whatsapp" ></i> WhatsApp</a>
                                            <div class="modal fade" id="modalWhatsapp" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Contacto de WhatsApp</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="width: 20px;"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="centrarDiv">
                                                                <h5>Angelo Del Castillo</h5>
                                                                <i class="fas fa-phone"></i><span> 72290029</span>

                                                            </div>

                                                        </div>
                                                        
                                                    </div>

                                                </div>

                                            </div>
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
            <div class="col-3" >
                <div class="sectionCat">
                    <ol><span>Buscar en otras categorias</span></ol>
                
                    <?php
                    
                    foreach($categorias->result() as $row)
                    {?>
                        
                        <a href="<?php echo base_url(); ?>index.php/anuncio/busquedacategoria?cat=<?php echo $row->idCategoria;?>" id="<?php echo $row->color?>"><li><span><?php echo $row->nombre?></span></li></a>
                            
                        <?php
                            
                    }?>  
                </div>
            </div>

        </div>
    </div>
</div>
