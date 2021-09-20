
  <div class="container ">
    <div class="row ">


    <div class="col-md-4 "></div>
    <div class="col-md-4 bordes ">
       
    <h2 align="center">Agregar Actividades</h2>
        <?php 
            
                echo form_open_multipart('actividad/agregarbd');
                ?>

                
                <div class="mb-3">
                    <label for="InputActividad" class="form-label">Actividad</label>
                    <input type="text" class="form-control" id="InputActividad" name="tipo" placeholder="Escriba una Actividad">
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





