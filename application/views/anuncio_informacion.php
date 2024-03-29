<br>
<div class="container-fluid  ">
    <div class="container  ">
        <div class="row ">
            <?php 
            foreach($anuncios as $row)
            {?>
            <h5><?php echo $row->nombre;?> <i class="fas fa-long-arrow-alt-right"></i> <?php echo $row->codigo;?></h3>
            <div class="col-8 centrarDiv">
                
                <div class="row">
                    
                    <div id="carouselExampleIndicators" class="carousel carousel-dark slide caruselTam" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner caruselTam">
                            <div class="carousel-item active">
                            <img src="<?php echo base_url();?>uploads/anuncio/<?php echo $row->fotos;?>" class="d-block w-100 caruselTam" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="<?php echo base_url();?>uploads/anuncio/perfil.jpg" class="d-block w-100 caruselTam" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="<?php echo base_url();?>uploads/anuncio/17.jpg" class="d-block w-100 caruselTam" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                        
                </div>
                
                <div class="row">
                    <h4><?php echo $row->titulo;?></h4>
                </div>
                <h3 class="precio"><?php echo $row->precio;?> Bs</h3>
                <ul class="camposCat"> 
                    <?php
                        foreach($row->datosCategoria as $rowCategoria){?>
                            <li>
                                <span><?php echo $rowCategoria->valor;?></span>
                                
                                <?php
                        }
                    ?> 
                    
                    
                </ul>
                
                <div class="row">
                    <p><?php echo $row->descripcion;?></p>
                </div>
                <?php
                    } 
                ?>
                <div class="row">
                            <p>¿Hay algún error en el anuncio o algo que debamos revisar?</p>
                            
                </div>
                <button type="button" class="btn btn-outline-danger">Denunciar</button>
            </div>
            <div class="col-4 sinPadding">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <?php
                            foreach($usuarioinfo->result() as $row)
                            {
                                ?>
                                <div class="col-4">
                                    <img class="imgRedonda" src="<?php echo base_url();?>uploads/usuario/<?php echo $row->foto;?>" width="100%" height="100px" >
                                </div>
                                <div class="col-8 sinPadding">
                                    <ul class="datos">
                                        <li><i class="fas fa-user"> <span><?php echo $row->nombres." ".$row->primerApellido." ".$row->segundoApellido; ?></span></i></li>
                                        <li><i class="fas fa-map-marked-alt"> <span><?php echo $row->ciudad?></span></i></li>
                                        <li><i class="fas fa-envelope"> <span><?php echo $row->correo?></span></i></li>
                                        <li><i class="fas fa-phone-square-alt"> <span><?php echo $row->celular?></span></i></li>
                                    </ul>
                                </div><?php
                            }?>
                        </div>
                        <div class="row">
                            <div class="col-6 btnContact">
                                
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalMensaje"><i class="fas fa-envelope" ></i> Enviar Mensaje</button>
                                <div class="modal fade" id="modalMensaje" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Enviar mail</h4>
                                                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                            </div>
                                            <div class="modal-body">
                                                <?php 
                                                echo form_open_multipart('anuncio/enviarMensaje');
                                                ?>
                                                <label for=InputCorreo" class="form-label">Correo origen</label>
                                                <input type="text" class="form-control" id="InputCorreo" name="correo" placeholder="Escriba su correo">
                                                <label for="InputAsunto">Asunto</label>
                                                <input type="text" class="form-control" id="InputAsunto" name="asunto" placeholder="Escriba el asunto">
                                                <label for="InputMensaje">Mensaje</label>
                                                <textarea class="form-control" id="InputMensaje" name="mensaje" placeholder="Escriba su mensaje" ></textarea>

                                            </div>
                                            <div  class="modal-footer">
                                                <button type="submit" class="btn btn-success" >Enviar</button>
                                                <?php
                                                    echo form_close();                                                    
                                                ?>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Cancelar</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-6 btnContact">
                                
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalWhatsapp"><i class="fab fa-whatsapp"></i> WhatsApp</button>
                                    <div class="modal fade" id="modalWhatsapp" tabindex="-1" aria-hidden="true" aria-labelledby="modalTitle">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Contacto de WhatsApp</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="width: 20px;"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="centrarDiv">
                                                    <?php
                                                    foreach($usuarioinfo->result() as $row)
                                                    {?>
                                                        <h5><?php echo $row->nombres." ".$row->primerApellido." ".$row->segundoApellido; ?></h5>
                                                        <h6> <i class="fas fa-phone"></i> <?php echo $row->celular?></h6><?php
                                                    }?>    
                                                    </div>

                                                </div>
                                                
                                            </div>

                                        </div>

                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card ">
                    <div class="card-body compartir">
                        <h6>Comparte este anuncio:</h6>
                        
                        <ul class="list-unstyled compartirIcon">
						<li>
							<a href="">
								<i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i>
							</a>
						</li>
						
						<li>
							<a href="">
								<i class="fab fa-whatsapp-square fa-3x" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="">
								<i class="fa fa-twitter-square fa-3x" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="#!">
								<i class="fa fa-link fa-3x" aria-hidden="true"></i>
							</a>
						</li>
					</ul>
                    </div>
                </div>
                <div class="card ">
                    <div class="card-body comentario">
                        <h6>Agrega un comentario:</h6>
                        
                        <textarea name="" id="" placeholder="Escriba su comentario"></textarea>
                        <button type="button" class="btn btn-primary">Comentar</button>
                    </div>
                </div>
                
                <div class="card ">
                    <div class="card-body com">
                        <hr>
                        <span class="comentarioUsuario">Diegoperale878@gmail.com</span>
                        <span class="comentarioMensaje">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita qui facilis accusantium aperiam ut ullam nisi quia ducimus, ipsa corrupti iste maxime magni molestias nobis dolore porro laborum in consequuntur.:</span>
                        <span class="comentarioFecha">14-10-2021</span>
                        
                        <hr>
                        <span class="comentarioUsuario">NoemiLizarazu@gmail.com</span>
                        <span class="comentarioMensaje">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita qui facilis accusantium aperiam ut ullam nisi quia ducimus, ipsa corrupti iste maxime magni molestias nobis dolore porro laborum in consequuntur.:</span>
                        <span class="comentarioFecha">14-10-2021</span>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
