<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actividad extends CI_Controller {

	public function index()
	{
        //index.php/controaldor/metodo/urisegment3
        //index.php/usuario/index/2

        $data['msg']=$this->uri->segment(3);

        if($this->session->userdata('correo'))
        {
            redirect('usuario/panel','refresh');       

        }
        else
        {
            $this->load->view('inc/header_view3.php');
            $this->load->view('welcome_message',$data);
            $this->load->view('inc/footer_view.php');

        }

	}
    public function lista()
    {
        $lista=$this->actividad_model->lista_actividades();
        $data['actividades']=$lista;

		$this->load->view('inc/header_view3.php'); // archivos de cabecera
		$this->load->view('actividad_lista',$data); // contenido
		$this->load->view('inc/footer_view.php');
     
      
    }

    public function agregar()
    {
        $this->load->view('inc/header_view3.php'); // archivos de cabecera
		$this->load->view('actividad_agregar'); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
    }

    public function agregarbd(){
        //$idUsuario
        
          
            $data['tipo']=$_POST['tipo'];
           
            $this->actividad_model->insertar_actividad($data);
            
            redirect('actividad/lista','refresh');

        

    }


    public function eliminar_anuncio_admi(){
        $idAnuncio=$_POST['idAnuncio'];
        $data['anuncio.activo']=0;
        $this->anuncio_model->eliminarAnuncio($idAnuncio,$data);
        redirect('usuario/lista_anuncios_admi','refresh');
    }

    public function eliminarbd(){
        $idActividad=$_POST['idActividad'];
        $data['actividad.activo']=0;
        $this->actividad_model->eliminarActividad($idActividad,$data);
        redirect('actividad/lista','refresh');
    }

    public function regresar(){
        redirect('actividad/lista','refresh');
    }

    
    
    public function modificar()
    {
        $idActividad=$_POST['idActividad'];
        
            $data['tipo']=$_POST['tipo'];
            $data['usuarioid']=1;

           
            $this->actividad_model->modificarActividad($idActividad,$data);
            
            redirect('actividad/lista','refresh');


    }
   
  
  
    public function modificarbd()
    {
        $idActividad=$_POST['idActividad'];

        $data['idActividad']=$_POST['idActividad'];

        $data['infoactividad']=$this->actividad_model->recuperarActividad($idActividad);
        
        $this->load->view('inc/header_view.php'); // archivos de cabecera
		$this->load->view('actividad_modificar',$data); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
    }
    


	
}
