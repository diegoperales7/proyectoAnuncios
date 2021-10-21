
  <div class="container ">
    <div class="row ">


    <div class="col-md-4 "></div>
    <div class="col-md-4 bordes ">
       
    <h2 align="center">Agregar Categorias</h2>
        <?php 
            
                echo form_open_multipart('categoria/agregarbd');
                ?>

                
                <div class="mb-3">
                    <label for="InputCategoria" class="form-label">Nombre de categoria</label>
                    <input type="text" class="form-control" id="InputCategoria" name="nombre" placeholder="Escriba una categoria">
                </div>
                <div class="mb-3">
                    <label for="InputIcono" class="form-label">Icono</label>
                    <input type="text" class="form-control" id="InputIcono" name="icono" placeholder="Escriba el icono que desea">
                </div>
                <div class="mb-3">
                <label for="InputColor" class="form-label">Color</label>
                            <select class="form-control " name="colorHover" >
                                <option value="" selected>Seleccione un color</option>
                                <option value="cat-1" >cat-1</option>
                                <option value="cat-2" >cat-2</option>
                                <option value="cat-3" >cat-3</option>
                                <option value="cat-4" >cat-4</option>
                                <option value="cat-5" >cat-5</option>
                                <option value="cat-6" >cat-6</option>
                                <option value="cat-7" >cat-7</option>
                                <option value="cat-8" >cat-8</option>
                                <option value="cat-9" >cat-9</option>
                                <option value="cat-10" >cat-10</option>
                                <option value="cat-11" >cat-11</option>
                                <option value="cat-12" >cat-12</option>
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





