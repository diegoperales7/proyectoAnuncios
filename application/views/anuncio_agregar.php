<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/anuncio.css">
  
  
  <div class="container ">
    <div class="row justify-content-md-center ">


    
    <div class="col-7 bordes">
       
    <h2 align="center">Datos de tu Anuncio</h2>
        <?php 
            
                echo form_open_multipart('anuncio/agregarbd');
                ?>
                <div class="row justify-content-md-center">
                    <div class="col-8">
                        <div class="row">

                        
                        <div class="col">
                            <div class="mb-3">
                                <label for="InputActividad" class="form-label">Actividad</label>
                                        <select class="form-control" name="actividad_idActividad" >
                                            <option value="" selected>Seleccione una actividad</option>
                                            <?php
                                            foreach($actividades->result() as $row){?>
                                                <option value="<?php echo $row->idActividad; ?>"><?php echo $row->tipo; ?></option><?php
                                                
                                            }?>
                                            
                                        </select>
                            </div> 
                            <div class="mb-3">
                                <label for="InputPrecio" class="form-label">Precio (Bs.)</label>
                                <input type="number" class="form-control" id="InputPrecio" name="precio" placeholder="Escriba el precio" >
                            </div>
                            
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                    <label for="InputEstado" class="form-label">Estado</label>
                                    <select class="form-control" name="estado" >
                                        <option value="" selected>Seleccione un estado</option>
                                        <option value="Nuevo" >Nuevo</option>
                                        <option value="Usado" >Usado</option>
                                    </select>
                            </div>  
                            <div class="mb-3">
                                <label for="InputCiudad" class="form-label">Ciudad</label>
                                <select class="form-control" name="ciudad_idCiudad" >
                                    <option value="" selected>Seleccione una ciudad</option>
                                    <?php
                                    foreach($ciudades->result() as $row){?>
                                        <option value="<?php echo $row->idCiudad; ?>"><?php echo $row->ciudad; ?></option><?php
                                        
                                    }?>
                                    
                                </select>
                            </div> 

                        </div>

                        </div>

                        <div class="mb-3">
                            <label for="InputTitulo" class="form-label">Titulo</label>
                            <input type="text" class="form-control" id="InputTitulo" name="titulo" placeholder="Escriba un titulo del anuncio">
                        </div>
                        <div class="mb-3">
                            <label for="InputDescripcion" class="form-label">Descripción</label>
                            <textarea type="text" class="form-control" id="InputDescripcion" name="descripcion" placeholder="Escriba una breve desripción" ></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="InputFile" class="form-label" name="userfile">Seleccione una foto </label>
                            <input class="form-control" type="file" id="InputFile" name="userfile">
                        </div>
                        <input type="hidden" name="idCategoria" value="<?php echo $idCategoria;?>">


                        <?php
                            foreach($camposcategorias->result() as $row){?>
                                <div class="mb-3">
                                    <label for="Input<?php echo $row->nombre?>" class="form-label"><?php echo $row->nombre; ?></label>
                                    <input class="form-control" type="text" id="Input<?php echo $row->nombre?>" name="<?php echo $row->nombre?>" placeholder="Escriba su <?php echo $row->nombre?>">
                                    <input type="hidden" name="categoria_idCategoria" value="<?php echo $row->categoria_idCategoria;?>">

                                </div><?php
                            }

                        ?>                
                        
                        
                        
                        <div class="row">
                                <div class="col">
                                    <div class="mb-3 ">
                                        
                                            <a class="btn btn-danger boton" type="submit" href="<?php echo base_url(); ?>index.php/categoria/lista">Regresar</a>
                                       
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="mb-3">
                                        
                                            <button class="btn btn-warning boton" type="submit">Publicar Anuncio</button>
                                        
                                    </div>  
                                </div>
                                    
                
                            </div>   

                    </div>
                    
                        
                            
                            
                       
                        
                      
                    
                </div>   
                 
               
                
                <?php
                echo form_close();
            
                            
        ?>

         

        </div>   

        
    </div>
</div>










