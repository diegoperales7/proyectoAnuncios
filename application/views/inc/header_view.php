<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Clasificados Online Bolivia</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/index.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/anuncio.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/anuncio.css">

	


</head>
<body>



<nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #11123A">
  <div class="container-fluid">
    <img src="<?php echo base_url(); ?>bootstrap/img/logo.jpg" width="45" height="45" class="d-inline-block align-text-top">
    <a class="navbar-brand" href="#" style="color:#FFC300;">Clasificados Online Bolivia</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url(); ?>index.php/" style="color:white">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="color:white">Contactos</a>
        </li>
      
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true" style="color:white">
		        Login
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo base_url(); ?>index.php/usuario/index">Iniciar sesion</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url(); ?>index.php/usuario/agregar">Registrarse</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">¿Has olvidado tu contraseña?</a></li>
          </ul>
        </li>
        <a class="nav-link active" aria-current="page" href="#" style="color:white">
          <?php echo $this->session->userdata('correo'); ?>
        </a>
      </ul>
      
    </div>
  </div>
</nav>