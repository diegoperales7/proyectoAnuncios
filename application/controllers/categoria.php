<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

	
	public function lista()
    {
        /*$actividades=$this->actividad_model->lista_actividades();
        $data['actividades']=$actividades;
        $ciudades="";
        $data['ciudades']=$ciudades;*/
       
        $this->load->view('inc/header_view3.php'); // archivos de cabecera
		$this->load->view('categoria_seleccionar'); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
    }

}
