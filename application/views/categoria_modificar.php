

<div class="container">
    <div class="row">
    <div class="col-md-4 "></div>
    <div class="col-md-4 bordes ">
            <h3 align="center">Actualizar Datos</h3>
        <?php 
            foreach($infocategoria->result() as $row)
            {
                echo form_open_multipart('categoria/modificar');
                ?>

                <input type="hidden" name="idCategoria" value="<?php echo $row->idCategoria; ?>">


                <div class="mb-3">
                    <label for="InputCategoria" class="form-label">Categoria</label>
                    <input type="text" class="form-control" id="InputCategoria" name="nombre" value="<?php echo $row->nombre; ?>">
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
