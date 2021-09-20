
  <div class="container ">
    <div class="row ">


    <div class="col-md-4 "></div>
    <div class="col-md-4 bordes ">
       
    <h2 align="center">Registro de Usuarios</h2>
        <?php 
            
                echo form_open_multipart('usuario/agregarbd');
                ?>


                <div class="mb-3">
                    <label for="InputNombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="InputNombres" name="nombres" placeholder="Escriba su Nombre">
                </div>
                <div class="mb-3">
                    <label for="InputApellido" class="form-label">Primer Apellido</label>
                    <input type="text" class="form-control" id="InputprimerApellido" name="primerApellido" placeholder="Escriba su Primer Apellido">
                </div>
                <div class="mb-3">
                    <label for="InputApellido" class="form-label">Segundo Apellido</label>
                    <input type="text" class="form-control" id="InputsegundoApellido" name="segundoApellido" placeholder="Escriba su Segundo Apellido">
                </div>
                <div class="mb-3">
                    <label for="InputEmail" class="form-label">Correo Electronico</label>
                    <input type="email" class="form-control" id="InputEmail" name="correo" placeholder="Escriba su Correo Electronico" >
                   
                </div>
                <div class="mb-3">
                    <label for="InputPassword" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="InputPassword" name="contrasena" placeholder="Escriba su contraseña" >
                   
                </div>
                <div class="mb-3">
                    <label for="InputPassword2" class="form-label">Repita su Contraseña</label>
                    <input type="password" class="form-control" id="InputPassword2" name="contrasena2" placeholder="Repita su contraseña" >
                   
                </div>
                <div class="mb-3">
                    <label for="InputCelular" class="form-label">Celular</label>
                    <input type="number" class="form-control" id="InputCelular" name="celular" placeholder="Escriba su Celular">
                </div>
                <div class="mb-3">
                    <label for="Inputrol_idRol" class="form-label">Rol</label>
                    <select class="form-control" name="idRol" >
                        <option value="" selected>Seleccione un Rol</option>
                        <?php
                        foreach($roles->result() as $row){?>
                            <option value="<?php echo $row->idRol; ?>"><?php echo $row->nombre; ?></option><?php
                            
                        }?>
                        
                    </select>
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





