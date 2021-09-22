

<div class="container">
    <div class="row">
    <div class="col-md-4 "></div>
    <div class="col-md-4 bordes ">
            <h3 align="center">Actualizar Datos de Anuncio</h3>
        <?php 
            //foreach($infoanuncio->result() as $row)
            //{
               // echo form_open_multipart('anuncio/modificar_listaUser');
                ?>

                <input type="hidden" name="idAnuncio" value="<?php echo $row->idAnuncio; ?>">


                <div class="row">
                    <div class="col-6">
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
                            <input type="number" class="form-control" id="InputPrecio" name="precio" placeholder="Escriba el precio">
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
                        <div class="mb-3">
                                <label for="InputMarca" class="form-label">Marca</label>
                                <input type="text" class="form-control" id="InputMarca" name="marca" placeholder="Escriba su marca" >
                        </div>
                        <div class="mb-3">
                                <label for="InputModelo" class="form-label">Modelo</label>
                                <input type="text" class="form-control" id="InputModelo" name="modelo" placeholder="Escriba su modelo" >
                        </div>
                        <div class="mb-3">
                            <label for="InputCombustible" class="form-label">Combustible</label>
                            <select class="form-control" name="combustible" >
                                <option value="" selected>Seleccione una ciudad</option>
                                <option value="Gasolina">Gasolina</option>
                                <option value="Diesel">Diesel</option>
                            </select>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="InputTitulo" class="form-label">Titulo</label>
                            <input type="text" class="form-control" id="InputTitulo" name="titulo" placeholder="Escriba un titulo del anuncio">
                        </div>
                        <div class="mb-3">
                            <label for="InputEstado" class="form-label">Estado</label>
                            <select class="form-control" name="estado" >
                                <option value="" selected>Seleccione un estado</option>
                                <option value="Nuevo" >Nuevo</option>
                                <option value="Usado" >Usado</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="InputDescripcion" class="form-label">Descripcion</label>
                            <input type="text" class="form-control" id="InputDescripcion" name="descripcion" placeholder="Escriba su desripcion" >
                        </div>
                        <div class="mb-3">
                            <label for="InputFile" class="form-label" name="userfile">Seleccione una foto de perfil</label>
                            <input class="form-control" type="file" id="InputFile" name="userfile">
                        </div>
                        <div class="mb-3">
                                <label for="InputAnio" class="form-label">Año</label>
                                <input type="number" class="form-control" id="InputAnio" name="anio" placeholder="Escriba el año" min="1950" max="2021" step="1">
                        </div>
                        <div class="mb-3">
                                <label for="InputColor" class="form-label">Color</label>
                                <input type="text" class="form-control" id="InputColor" name="color" placeholder="Escriba su color" >
                        </div>

                    </div>
                </div>        

                
                    <div class="d-grid gap-2 ">
                    <button class="btn btn-warning btn-lg" type="submit">Actualizar</button>
                    </div>
                         


                <?php
                //echo form_close();
            //}
                            
            ?>
            
           
            
           
            <?php 
            
            echo form_open_multipart('anuncio/regresar');
            ?>
            <div class="d-grid gap-2 ">
            <button class="btn btn-danger btn-lg" type="submit">Cancelar</button>
            </div>

            <?php
                    echo form_close();
                
                                
            ?>
                    
           

        

     
 
        </div>   
    </div>
</div>
