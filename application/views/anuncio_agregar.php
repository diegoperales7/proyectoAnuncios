
  <div class="container ">
    <div class="row ">


    <div class="col-md-4 "></div>
    <div class="col-md-4 bordes ">
       
    <h2 align="center">Publicar Anuncio</h2>
        <?php 
            
                echo form_open_multipart('anuncio/agregarbd');
                ?>

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
                    <label for="InputTitulo" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="InputTitulo" name="titulo" placeholder="Escriba un titulo del anuncio">
                </div>
                <div class="mb-3">
                    <label for="InputPrecio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="InputPrecio" name="precio" placeholder="Escriba el precio">
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
                    <label for="InputCiudad" class="form-label">Ciudad</label>
                    <select  class="form-control" name="ciudad_idCiudad">
                        <option value="">Seleccione una ciudad</option>
                        <option value="1">Beni</option>
                        <option value="2" >Chuquiscada</option>
                        <option value="3">Cochabamba</option>
                        <option value="4">La Paz</option>
                        <option value="5">Oruro</option>
                        <option value="6">Pando</option>
                        <option value="7">Potosi</option>
                        <option value="8">Santa Cruz</option>
                        <option value="9">Tarija</option>
                    </select>
                </div>
               
                <div class="mb-3">
                    <label for="InputFile" class="form-label" name="userfile">Seleccione una foto de perfil</label>
                    <input class="form-control" type="file" id="InputFile" name="userfile">
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-warning" type="submit">Registrar</button>
                </div>
               
                <?php
                echo form_close();
            
                            
        ?>

         

        </div>   

        
    </div>
</div>





