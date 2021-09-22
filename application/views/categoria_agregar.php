
  <div class="container ">
    <div class="row ">


    <div class="col-md-4 "></div>
    <div class="col-md-4 bordes ">
       
    <h2 align="center">Agregar Categorias</h2>
        <?php 
            
                echo form_open_multipart('categoria/agregarbd');
                ?>

                
                <div class="mb-3">
                    <label for="InputCategoria" class="form-label">Categoria</label>
                    <input type="text" class="form-control" id="InputCategoria" name="nombre" placeholder="Escriba una categoria">
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





