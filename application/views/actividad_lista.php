

<div class="container-fluid">
    
    <div class="row">

    
        <div class="col">
            
            
<h4> <?php echo "Bienvenido"." ".$this->session->userdata('correo'); ?></h4>
        
            <?php 
                echo form_open_multipart('actividad/agregar');
            ?>
            <button type="submit" class="btn btn-success btn-xs">Agregar Actividades</button>

            <?php
                echo form_close()
            ?>

     

            <table class="table">
                <thead class="table tabcolor">
                    <tr>
                        <th scope="col" style="text-color: white">#</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha Registro</th>
                        <th scope="col">Fecha Actualizacion</th>
                        <th scope="col">Modificar</th>
                        <th scope="col">Eliminar</th>
                             
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $indice=1;
                        foreach($actividades->result() as $row){
                            
                            ?>
                            <tr>
                                <th scope="row"><?php echo $indice; ?></th>
                                <td><?php echo $row->tipo; ?></td>
                                <td><?php echo $row->activo; ?></td>
                                <td><?php echo $row->fechaRegistro; ?></td>
                                <td><?php echo $row->fechaActualizacion; ?></td>
                               
                                
                                

                                <td>
                                    <?php 
                                        echo form_open_multipart('actividad/modificarbd');
                                    ?>
                                    <input type="hidden" name="idActividad" value="<?php echo $row->idActividad; ?>">
                                    <button type="submit" class="btn btn-primary btn-xs">Modificar</button>

                                    <?php
                                     echo form_close()
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo form_open_multipart('actividad/eliminarbd');
                                    ?>
                                    <input type="hidden" name="idActividad" value="<?php echo $row->idActividad; ?>">
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

