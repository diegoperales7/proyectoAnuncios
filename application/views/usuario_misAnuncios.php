

<div class="container-fluid">
    
    <div class="row">
    
        <div class="col">
            
            
<h4> <?php echo "Bienvenido"." ".$this->session->userdata('correo'); ?></h4>
<h4> <center> LISTA DE ANUNCIOS </center></h4>
       

            <table class="table">
                <thead class="table tabcolor">
                    <tr>
                        <th scope="col" style="text-color: white">#</th>
                        <th scope="col">codigo</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $indice=1;
                        foreach($anuncios->result() as $row){
                            
                            ?>
                            <tr>
                                <th scope="row"><?php echo $indice; ?></th>
                                <td><?php echo $row->codigo; ?></td>
                                <td><?php echo $row->titulo; ?></td>
                                <td><?php echo $row->precio; ?></td>
                                <td><?php echo $row->estado; ?></td>
                                <td><?php echo $row->descripcion; ?></td>
                                <td><?php echo $row->nombre; ?></td>
                                <td><?php echo $row->ciudad; ?></td>
                                <td>
                                <?php
                                    $fotos=$row->fotos;
                                    if ($fotos=="") {
                                        // mostrar foto por defecto
                                        ?>
                                        <img  width='100' height="110" src="<?php echo base_url();?>uploads/anuncio/perfil.jpg">
                                        <?php
                                    }
                                    else{
                                        //mostrar foto del usuario 
                                        ?>
                                        <img  width='100' height="110" src="<?php echo base_url();?>uploads/anuncio/<?php echo $fotos; ?>">
                                        <?php
                                    }
                                
                                
                                
                                ?>



                                </td>
                                

                                <td>
                                    <?php 
                                        echo form_open_multipart('anuncio/modificar_anuncio_user');
                                    ?>
                                    <input type="hidden" name="idAnuncio" value="<?php echo $row->idAnuncio; ?>">
                                    <input type="hidden" name="nombre" value="<?php echo $row->nombre; ?>">
                                    <button type="submit" class="btn btn-primary btn-xs">Modificar</button>

                                    <?php
                                     echo form_close()
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo form_open_multipart('anuncio/eliminar_anuncio');
                                    ?>
                                    <input type="hidden" name="idAnuncio" value="<?php echo $row->idAnuncio; ?>">
                                    <button type="submit" class="btn btn-danger btn-xs">Eliminar</button>

                                    <?php
                                     echo form_close()
                                    ?>
                                </td>
                            </tr>

                            <?php
                            $indice++;
                           
                        }
                    ?>

            
                </tbody>
            </table>


        </div> 
       
    </div>
</div>

