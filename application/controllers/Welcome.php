<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$idRol=$this->session->userdata('rol_idRol');
		$lista=$this->categoria_model->lista_categorias();
        $data['categorias']=$lista;

		 if ($idRol==2) {
            $this->load->view('inc/header_view2.php');//usuario premium
        }
        if ($idRol==3)
        {
            $this->load->view('inc/header_view3.php');//usuario normal
        }
        if ($idRol==null) {
            $this->load->view('inc/header_view.php');//sin registro
        }
		$this->load->view('welcome_message',$data);
		$this->load->view('/inc/footer_view.php');
	}

	public function login()
	{
		$this->load->view('/inc/header_view.php');
		$this->load->view('login');
		$this->load->view('/inc/footer_view.php');
	}
}
