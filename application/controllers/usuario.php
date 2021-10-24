<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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
            $this->load->view('inc/header_view.php');
            $this->load->view('login',$data);
            $this->load->view('inc/footer_view.php');

        }

	}

    public function modificarAdmi()
    {
        $idUsuario=$_POST['idUsuario'];

        $data['idUsuario']=$_POST['idUsuario'];
        $data['infousuario']=$this->usuario_model->recuperarUsuario($idUsuario);
        
        $this->load->view('inc/header_view.php'); // archivos de cabecera
		$this->load->view('usuario_modificarAdmi',$data); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
    }



   

    public function agregar()
    {
        $roles=$this->usuario_model->lista_roles();
        $data['roles']=$roles;
        $this->load->view('inc/header_view.php'); // archivos de cabecera
		$this->load->view('usuario_agregar',$data); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
    }


    public function agregarbd(){
        
        $data['nombres']=$_POST['nombres'];
        $data['primerApellido']=$_POST['primerApellido'];
        $data['segundoApellido']=$_POST['segundoApellido'];
        $data['correo']=$_POST['correo'];
        //$encript=$_POST['contrasena'];
        $data['contrasena']=md5($_POST['contrasena']);
        $data['celular']=$_POST['celular'];
        $data['rol_idRol']=$_POST['idRol'];  
        
        $this->usuario_model->agregarUsuario($data);
    
        redirect('usuario/index','refresh');
 
     

    }

    public function eliminarbd(){
        $idUsuario=$_POST['idUsuario'];
        $data['usuario.activo']=0;
        $this->usuario_model->eliminarUsuario($idUsuario,$data);
        redirect('usuario/index','refresh');
    }

    public function listar_usuario()
    {

        $lista=$this->usuario_model->lista_usuarios();
        $data['usuarios']=$lista;

		$this->load->view('inc/header_view2.php'); // archivos de cabecera
		$this->load->view('reportes',$data); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
        
    }

    public function validarusuario()
    {
        $correo=$_POST['correo'];
        $contrasena=md5($_POST['contrasena']);

        $consulta=$this->usuario_model->validar($correo,$contrasena);

        if ($consulta->num_rows()>0)
        {
            foreach ($consulta->result() as $row)
            {
                $this->session->set_userdata('idUsuario',$row->idUsuario);
                $this->session->set_userdata('correo',$row->correo);
                $this->session->set_userdata('rol_idRol',$row->rol_idRol);

                redirect('usuario/panel','refresh');       
            }
        }
        else {
            redirect('usuario/index/1','refresh');       
        }
    }

    public function regresar(){
        redirect('usuario/panel','refresh');
    }
   

    public function panel()
    {

        if($this->session->userdata('correo'))
        {
            //redirect('anuncio/anuncio_lista','refresh');       
            
                if($this->session->userdata('rol_idRol')==1)
                {
                    redirect('usuario/listar_usuario','refresh');  
                }  
                if($this->session->userdata('rol_idRol')==2)
                {
                    redirect('usuario/usuario_normal','refresh');  
                }
                if($this->session->userdata('rol_idRol')==3)
                {
                    redirect('usuario/usuario_normal','refresh');  
                }         
        }
        else
        {
           redirect('usuario/index/2','refresh');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('usuario/index/3','refresh');

    }


    public function subir()
    {
        $idUsuario=$_POST['idUsuario'];        
        $nombrearchivo=$idUsuario.".jpg";

        //ruta donde se guardan los ficheros
        $config['upload_path']='./uploads/usuario';
        //nombre del archivo
        $config['file_name']=$nombrearchivo;

        //reemplazar los archivos
        $direccion=FCPATH."uploads\usuario\\".$nombrearchivo;
        if(file_exists($direccion))
        {          
            unlink($direccion);
        }

        //tipos de archivos permitidos
        $config['allowed_types']='jpg|png';//'gif|jpg|png';
        $this->load->library('upload',$config);

        if (!$this->upload->do_upload())
        {
            //$data['error']=$this->upload->display_errors();
            redirect('usuario/listar_usuario','refresh');
        }
        else
        {
            $data['foto']=$nombrearchivo;
            $this->usuario_model->modificarUsuario($idUsuario,$data);
            $this->upload->data();
            redirect('usuario/listar_usuario','refresh');

        }
        
    }

    public function usuario_normal()
	{
        $lista=$this->categoria_model->lista_categorias();
        $data['categorias']=$lista;

		$this->load->view('inc/header_view3.php'); // archivos de cabecera
		$this->load->view('usuario_normal',$data); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
	}

    public function modificarbd()
    {
        $idUsuario=$_POST['idUsuario'];
        //var_dump($idUsuario);
        //var_dump($_POST['userfile']);

        $nombrearchivo=$idUsuario.".jpg";

        $config['upload_path']='./uploads/usuario';
        //nombre del archivo
        $config['file_name']=$nombrearchivo;

        //reemplazar los archivos
        //$direccion="./uploads/usuario/".$nombrearchivo;
        $direccion=FCPATH."uploads\usuario\\".$nombrearchivo;
        if(file_exists($direccion))
        {
            //var_dump("Hola");
            unlink($direccion);
            
                //tipos de archivos permitidos
            
        }
        //var_dump("hola");
        $config['allowed_types']='jpg|png';//'gif|jpg|png';
        $this->load->library('upload',$config);  
        //("hola2");

        if (!$this->upload->do_upload())
        {
            //var_dump("hola3");

            //$data['error']=$this->upload->display_errors();
            $data['nombres']=$_POST['nombres'];
            $data['primerApellido']=$_POST['primerApellido'];
            $data['segundoApellido']=$_POST['segundoApellido'];
            $data['correo']=$_POST['correo'];
            $data['celular']=$_POST['celular'];
            $data['foto']="perfil.jpg";

           
            $this->usuario_model->modificarUsuario($idUsuario,$data);
            redirect('usuario/listar_usuario','refresh');
        }
        else
        {
            //var_dump("hola4");

            $data['nombres']=$_POST['nombres'];
            $data['primerApellido']=$_POST['primerApellido'];
            $data['segundoApellido']=$_POST['segundoApellido'];
            $data['correo']=$_POST['correo'];
            $data['celular']=$_POST['celular'];

            $data['foto']=$nombrearchivo;
            $this->usuario_model->modificarUsuario($idUsuario,$data);
            $this->upload->data();
            redirect('usuario/listar_usuario','refresh');

        }
        

         

        //redirect('usuario/index','refresh');
    }


    public function lista_anuncios_admi()
    {
        $lista=$this->anuncio_model->lista_anuncio_admi();
        $data['anuncios']=$lista;

		$this->load->view('inc/header_view2.php'); // archivos de cabecera
		$this->load->view('admin_reportes_anuncio',$data); // contenido
		$this->load->view('inc/footer_view.php');


        
    }


    public function misAnuncios()
    {
        $lista=$this->anuncio_model->lista_mis_anuncios();
        $data['anuncios']=$lista;
        //$idAnuncio=13;
        $lista2=$this->anuncio_model->getdatosCategoria(13);
        $data['datoscategoria']=$lista2;

		$this->load->view('inc/header_view3.php'); // archivos de cabecera
		$this->load->view('usuario_misAnuncios',$data); // contenido
		$this->load->view('inc/footer_view.php');
     
      
    }


	
}
