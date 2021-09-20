

<div class="container-fluid">
    
    <div class="row">

    
        <div class="col">
            
            
<h4> <?php echo "Bienvenido"." ".$this->session->userdata('correo'); ?></h4>
        
            <?php 
                echo form_open_multipart('usuario/agregar');
            ?>
            <button type="submit" class="btn btn-success btn-xs">Agregar Usuarios</button>

            <?php
                echo form_close()
            ?>

     

            <table class="table">
                <thead class="table tabcolor">
                    <tr>
                        <th scope="col" style="text-color: white">#</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Primer Apellido</th>
                        <th scope="col">Segundo Apellido</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Inicio Premium</th>
                        <th scope="col">Fin Premium</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $indice=1;
                        foreach($usuarios->result() as $row){
                            
                            ?>
                            <tr>
                                <th scope="row"><?php echo $indice; ?></th>
                                <td><?php echo $row->nombres; ?></td>
                                <td><?php echo $row->primerApellido; ?></td>
                                <td><?php echo $row->segundoApellido; ?></td>
                                <td><?php echo $row->correo; ?></td>
                                <td><?php echo $row->celular; ?></td>
                                <td><?php echo $row->nombre; ?></td>
                                <td><?php echo $row->fechaInicio; ?></td>
                                <td><?php echo $row->fechaFin; ?></td>
                                <td>
                                <?php
                                    $foto=$row->foto;
                                    if ($foto=="") {
                                        // mostrar foto por defecto
                                        ?>
                                        <img  width='100' height='100' src="<?php echo base_url();?>uploads/usuario/perfil.jpg">
                                        <?php
                                    }
                                    else{
                                        //mostrar foto del usuario 
                                        ?>
                                        <img  width='100' height='100' src="<?php echo base_url();?>uploads/usuario/<?php echo $foto; ?>">
                                        <?php
                                    }
                                
                                
                                
                                ?>



                                </td>
                                

                                <td>
                                    <?php 
                                        echo form_open_multipart('usuario/modificarAdmi');
                                    ?>
                                    <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">
                                    <button type="submit" class="btn btn-primary btn-xs">Modificar</button>

                                    <?php
                                     echo form_close()
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo form_open_multipart('usuario/eliminarbd');
                                    ?>
                                    <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">
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

