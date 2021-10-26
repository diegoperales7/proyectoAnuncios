<br>
<div class="container-fluid ">
    <div class="container ">
        <div class="row">
            <div class="col-9 " >
                <div class="row">
                    <div class="buscador">
                        <form id="formCamposCategoria" action="">    
                            <input class="form-control" type="search" placeholder="Buscar" aria-label="Search">
                            <div class="busquedaCat">
                                
                                <?php
                                    foreach($camposcategorias->result() as $key=>$row)
                                    {
                                        if (($key+2)%2==0) {
                                            echo '<br>';
                                        }
                                        ?>                  
                                        <label for=""><?php echo $row->nombre?></label>
                                        <input   name="<?php echo 'campo_'.$row->idCamposCategoria?>" type="text" placeholder="Ingrese su <?php echo strtolower($row->nombre)?>">                                            
                                        <?php
                                        
                                    }?>
                                    <label for="InputCiudad" class="form-label">Ciudad</label>
                                    <select >
                                        <option name="campo_Ciudad" value="0" selected>Todas las ciudades</option>
                                        <?php 
                                        foreach ($ciudades->result() as $row) 
                                        {?>
                                            <option name="campo_Ciudad" value="<?php echo $row->idCiudad; ?>"><?php echo $row->ciudad?></option><?php
                                        }
                                        ?>
                                    </select>  
                                <br>
                                <button id="btnFiltroCategoria" data-idCategoria="<?php echo $idCategoria;?>" class="btn btn-primary" type="submit">Buscar</button>
                            </div>                         
                        </form>
                    </div>
                </div>
                <div class="row" id="resultadoFiltroCategoria">         
                    <?php
                        foreach($anuncios as $row)
                        {
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
                                        <div class="col-3 sb">
                                            <img class="imgAnuncio" src="<?php echo base_url();?>uploads/anuncio/<?php echo $row->fotos?>" >
                                        
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
                                    <a class="btn btn-primary botonPie" href="<?php echo base_url(); ?>index.php/usuario/logout">Editar</a>
                                    <a class="btn btn-danger botonPie" href="<?php echo base_url(); ?>index.php/anuncio/eliminar?var=<?php echo $row->idAnuncio?>">Eliminar</a>
                                </div>
                                

                            </div>
                                
                            <?php        
                        }
                    ?>
                    
                </div>
                
            </div>
            <div class="col-3" >
                <div class="sectionCat">
                    <ol><span>Otras Categorias</span></ol>
                
                    <?php
                    
                    foreach($categorias->result() as $row)
                    {?>
                        
                        <a href=""><li><span><?php echo $row->nombre?></span></li></a>
                            
                        <?php
                            
                    }?>  
                </div>
            </div>

        </div>
    </div>
</div>
