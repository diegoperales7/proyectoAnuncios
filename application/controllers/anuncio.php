<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anuncio extends CI_Controller {

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

    public function agregar()
    {
        $actividades=$this->actividad_model->lista_actividades();
        $data['actividades']=$actividades;
        $ciudades=$this->anuncio_model->lista_ciudades();
        $data['ciudades']=$ciudades;
       
        $this->load->view('inc/header_view3.php'); // archivos de cabecera
		$this->load->view('anuncio_agregar',$data); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
    }

    public function agregarbd(){
        //$idUsuario
        $aleatorio=rand(0,1000);
        $codigo="r".$aleatorio;
        $nombrearchivo=$aleatorio.".jpg";

        $config['upload_path']='./uploads/anuncio';
        //nombre del archivo
        $config['file_name']=$nombrearchivo;

        //reemplazar los archivos
        $direccion="./uploads/anuncio/".$nombrearchivo;
        unlink($direccion);

          //tipos de archivos permitidos
        $config['allowed_types']='jpg';//'gif|jpg|png';
        $this->load->library('upload',$config);

        if (!$this->upload->do_upload())
        {
            $data['error']=$this->upload->display_errors();
        }
        else
        {
            $data['codigo']=$codigo;
            $data['titulo']=$_POST['titulo'];
            $data['precio']=$_POST['precio'];
            $data['estado']=$_POST['estado'];
            $data['descripcion']=$_POST['descripcion'];
            
            $data['fotos']=$nombrearchivo;
            $data['usuario_idUsuario']=rand(2,3);
            $data['actividad_idActividad']=$_POST['actividad_idActividad'];
            $data['ciudad_idCiudad']=$_POST['ciudad_idCiudad'];
            
            
            $this->anuncio_model->insertar_anuncio($data);
            $this->upload->data();
            redirect('usuario/lista_anuncios_admi','refresh');

        }

    }


    public function eliminar_anuncio_admi(){
        $idAnuncio=$_POST['idAnuncio'];
        $data['anuncio.activo']=0;
        $this->anuncio_model->eliminarAnuncio($idAnuncio,$data);
        redirect('usuario/lista_anuncios_admi','refresh');
    }

    public function eliminar_anuncio(){
        $idAnuncio=$_POST['idAnuncio'];
        $data['anuncio.activo']=0;
        $this->anuncio_model->eliminarAnuncio($idAnuncio,$data);
        redirect('usuario/misAnuncios','refresh');
    }

    public function regresar(){
        redirect('usuario/lista_anuncios_admi','refresh');
    }

    public function modificar_anuncio_admi()
    {
        //$idUsuario=$_POST['idUsuario'];
        //$data2['idUsuario']=$_POST['idUsuario'];
        $idAnuncio=$_POST['idAnuncio'];

        $data['idAnuncio']=$_POST['idAnuncio'];
        $data['infoanuncio']=$this->anuncio_model->recuperarAnuncio($idAnuncio);
        
        $this->load->view('inc/header_view3.php'); // archivos de cabecera
		$this->load->view('anuncio_lista_modificarAdmi',$data); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
    }

    public function modificar_anuncio_user()
    {
        //$idUsuario=$_POST['idUsuario'];
        //$data2['idUsuario']=$_POST['idUsuario'];
        $idAnuncio=$_POST['idAnuncio'];

        $data['idAnuncio']=$_POST['idAnuncio'];
        $data['infoanuncio']=$this->anuncio_model->recuperarAnuncio($idAnuncio);
        
        $this->load->view('inc/header_view3.php'); // archivos de cabecera
		$this->load->view('anuncio_lista_modificarUser',$data); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
    }

    public function modificar_listaAdmi()
    {
        $idAnuncio=$_POST['idAnuncio'];
        $nombrearchivo=$idAnuncio.".jpg";

        $config['upload_path']='./uploads/anuncio';
        //nombre del archivo
        $config['file_name']=$nombrearchivo;

        //reemplazar los archivos
        $direccion="./uploads/anuncio/".$nombrearchivo;
        unlink($direccion);

          //tipos de archivos permitidos
        $config['allowed_types']='jpg';//'gif|jpg|png';
        $this->load->library('upload',$config);

        if (!$this->upload->do_upload())
        {
            $data['error']=$this->upload->display_errors();
        }
        else
        {
            $data['codigo']=$_POST['codigo'];
            $data['titulo']=$_POST['titulo'];
            $data['precio']=$_POST['precio'];
            $data['estado']=$_POST['estado'];
            $data['descripcion']=$_POST['descripcion'];

            $data['fotos']=$nombrearchivo;
            $this->anuncio_model->modificarAnuncio($idAnuncio,$data);
            $this->upload->data();
            redirect('usuario/lista_anuncios_admi','refresh');

        }

        //redirect('usuario/index','refresh');
    }

    public function modificar_listaUser()
    {
        $idAnuncio=$_POST['idAnuncio'];
        $nombrearchivo=$idAnuncio.".jpg";

        $config['upload_path']='./uploads/anuncio';
        //nombre del archivo
        $config['file_name']=$nombrearchivo;

        //reemplazar los archivos
        $direccion="./uploads/anuncio/".$nombrearchivo;
        unlink($direccion);

          //tipos de archivos permitidos
        $config['allowed_types']='jpg';//'gif|jpg|png';
        $this->load->library('upload',$config);

        if (!$this->upload->do_upload())
        {
            $data['error']=$this->upload->display_errors();
        }
        else
        {
            $data['codigo']=$_POST['codigo'];
            $data['titulo']=$_POST['titulo'];
            $data['precio']=$_POST['precio'];
            $data['estado']=$_POST['estado'];
            $data['descripcion']=$_POST['descripcion'];

            $data['fotos']=$nombrearchivo;
            $this->anuncio_model->modificarAnuncio($idAnuncio,$data);
            $this->upload->data();
            redirect('usuario/misAnuncios','refresh');

        }

        //redirect('usuario/index','refresh');
    }
  
    public function agregar_vehiculo()
    {
        $actividades=$this->actividad_model->lista_actividades();
        $data['actividades']=$actividades;
        $ciudades=$this->anuncio_model->lista_ciudades();
        $data['ciudades']=$ciudades;
       
        $this->load->view('inc/header_view3.php'); // archivos de cabecera
		$this->load->view('anuncio_agregar_vehiculo',$data); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
    }

    


	
}
