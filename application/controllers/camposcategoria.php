<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Camposcategoria extends CI_Controller {


    public function agregar()
    {
        $this->load->view('inc/header_view2.php'); // archivos de cabecera
		$this->load->view('categoria_agregar'); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
    }

    public function agregarbd(){
       
            $idUsuario=$this->session->userdata('correo');
            $data['nombre']=$_POST['nombre'];
            $data['usuarioid']=$idUsuario;
           
            $this->categoria_model->insertar_categoria($data);
            
            redirect('categoria/mostrar_lista','refresh');

        

    }

    public function eliminarbd(){
        $idCategoria=$_POST['idCategoria'];
        $data['categoria.activo']=0;
        $this->categoria_model->eliminarCategoria($idCategoria,$data);
        redirect('categoria/mostrar_lista','refresh');
    }


    
	
	public function lista()
    {
        /*$actividades=$this->actividad_model->lista_actividades();
        $data['actividades']=$actividades;
        $ciudades="";
        $data['ciudades']=$ciudades;*/
       
        $this->load->view('inc/header_view2.php'); // archivos de cabecera
		$this->load->view('categoria_seleccionar'); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
    }

    public function mostrar_lista()
    {
        $categorias=$this->categoria_model->lista_categorias();
        $data['categorias']=$categorias;
        
       
        $this->load->view('inc/header_view2.php'); // archivos de cabecera
		$this->load->view('categoria_lista',$data); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
    }

    public function modificar()
    {
        $idCategoria=$_POST['idCategoria'];
        
            $data['nombre']=$_POST['nombre'];
            $data['usuarioid']=1;

           
            $this->categoria_model->modificarCategoria($idCategoria,$data);
            
            redirect('categoria/mostrar_lista','refresh');


    }
   
  
  
    public function modificarbd()
    {
        $idCategoria=$_POST['idCategoria'];

        $data['idCategoria']=$_POST['idCategoria'];

        $data['infocategoria']=$this->categoria_model->recuperarCategoria($idCategoria);
        
        $this->load->view('inc/header_view2.php'); // archivos de cabecera
		$this->load->view('categoria_modificar',$data); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
    }

}
