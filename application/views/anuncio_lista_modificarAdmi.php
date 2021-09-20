

<div class="container">
    <div class="row">
    <div class="col-md-4 "></div>
    <div class="col-md-4 bordes ">
            <h3 align="center">Actualizar Datos de Anuncio</h3>
        <?php 
            foreach($infoanuncio->result() as $row)
            {
                echo form_open_multipart('anuncio/modificar_listaAdmi');
                ?>

                <input type="hidden" name="idAnuncio" value="<?php echo $row->idAnuncio; ?>">


                <div class="mb-3">
                    <label for="InputCodigo" class="form-label">Codigo</label>
                    <input type="text" class="form-control" id="InputCodigo" name="codigo" value="<?php echo $row->codigo; ?>">
                </div>
                <div class="mb-3">
                    <label for="InputTitulo" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="InputTitulo" name="titulo" value="<?php echo $row->titulo; ?>">
                </div>
                <div class="mb-3">
                    <label for="InputPrecio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="InputPrecio" name="precio" value="<?php echo $row->precio; ?>">
                </div>
                <div class="mb-3">
                    <label for="InputEstado" class="form-label">Estado</label>
                    <input type="text" class="form-control" id="InputEstado" name="estado" value="<?php echo $row->estado; ?>" >
                   
                </div>
                <div class="mb-3">
                    <label for="InputDescripcion" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" id="InputDescripcion" name="descripcion" value="<?php echo $row->descripcion; ?>">
                </div>
                <div class="mb-3">
                    <label for="InputFile" class="form-label" name="userfile">Seleccione una foto para su anuncio</label>
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
