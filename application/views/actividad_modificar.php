

<div class="container">
    <div class="row">
    <div class="col-md-4 "></div>
    <div class="col-md-4 bordes ">
            <h3 align="center">Actualizar Datos</h3>
        <?php 
            foreach($infoactividad->result() as $row)
            {
                echo form_open_multipart('actividad/modificar');
                ?>

                <input type="hidden" name="idActividad" value="<?php echo $row->idActividad; ?>">


                <div class="mb-3">
                    <label for="InputActividad" class="form-label">Actividad</label>
                    <input type="text" class="form-control" id="InputActividad" name="tipo" value="<?php echo $row->tipo; ?>">
                </div>
                
                    <div class="d-grid gap-2 ">
                    <button class="btn btn-warning btn-lg" type="submit">Actualizar</button>
                    </div>
                         


                <?php
                echo form_close();
            }
                            
            ?>
            
           
            
           
            <?php 
            
            echo form_open_multipart('actividad/regresar');
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
