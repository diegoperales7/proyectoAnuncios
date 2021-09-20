

<div class="container">
    <div class="row">
    <div class="col-md-4 "></div>
    <div class="col-md-4 bordes ">
            <h3 align="center">Actualizar Datos</h3>
        <?php 
            foreach($infousuario->result() as $row)
            {
                echo form_open_multipart('usuario/modificarbd');
                ?>

                <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">


                <div class="mb-3">
                    <label for="InputNombre" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="InputNombre" name="nombres" value="<?php echo $row->nombres; ?>">
                </div>
                <div class="mb-3">
                    <label for="InputApellido" class="form-label">Primer Apellido</label>
                    <input type="text" class="form-control" id="InputApellido" name="primerApellido" value="<?php echo $row->primerApellido; ?>">
                </div>
                <div class="mb-3">
                    <label for="InputApellido" class="form-label">Segundo Apellido</label>
                    <input type="text" class="form-control" id="InputApellido" name="segundoApellido" value="<?php echo $row->segundoApellido; ?>">
                </div>
                <div class="mb-3">
                    <label for="InputEmail" class="form-label">Correo Electronico</label>
                    <input type="email" class="form-control" id="InputEmail" name="correo" value="<?php echo $row->correo; ?>" >
                   
                </div>
                <div class="mb-3">
                    <label for="InputCelular" class="form-label">Celular</label>
                    <input type="number" class="form-control" id="InputCelular" name="celular" value="<?php echo $row->celular; ?>">
                </div>
                <div class="mb-3">
                    <label for="InputFile" class="form-label" name="userfile">Seleccione una foto de perfil</label>
                    <input class="form-control" type="file" id="InputFile" name="userfile">
                </div>

                
                    <div class="d-grid gap-2 ">
                    <button class="btn btn-warning btn-lg" type="submit">Actualizar</button>
                    </div>
                         


                <?php
                echo form_close();
            }
                            
            ?>
            
           
            
           
            <?php 
            
            echo form_open_multipart('usuario/regresar');
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
