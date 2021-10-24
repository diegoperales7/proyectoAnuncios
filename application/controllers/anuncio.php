<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anuncio extends CI_Controller {

	
    public function agregar()
    {
        $idUsuario=$this->session->userdata('idUsuario');
        //$idcategoria=$_GET('var');
        //var_dump($idcategoria);
        $idCategoria=$_GET['cat'];
        //var_dump($idCategoria);
        
        $actividades=$this->actividad_model->lista_actividades();
        $data['actividades']=$actividades;
        $ciudades=$this->anuncio_model->lista_ciudades();
        $data['ciudades']=$ciudades;
        
        $camposcategorias=$this->camposcategoria_model->lista_camposcategorias($idCategoria);
        $data['camposcategorias']=$camposcategorias;
        $data['idCategoria']=$idCategoria;
        if ($idUsuario==2) {
            $this->load->view('inc/header_view2.php');     
        }
        else
        {
            $this->load->view('inc/header_view3.php');
        }
        // archivos de cabecera
		$this->load->view('anuncio_agregar',$data); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
    }

    public function agregarbd()
    {
        
        $idUsuario=$this->session->userdata('idUsuario');
        //$idCategoria=$_POST['categoria_idCategoria'];
        $idCategoria=$_POST['idCategoria'];

        
        $data['codigo']="r";
        $data['titulo']=$_POST['titulo'];
        $data['precio']=$_POST['precio'];
        $data['estado']=$_POST['estado'];
        $data['descripcion']=$_POST['descripcion']; 
        $data['usuario_idUsuario']=$idUsuario;
        
        $data['actividad_idActividad']=$_POST['actividad_idActividad'];
        $data['ciudad_idCiudad']=$_POST['ciudad_idCiudad'];
        $data['categoria_idCategoria']=$idCategoria;

        $this->anuncio_model->insertar_anuncio($data);
        $ultimoID=$this->db->insert_id();

        $camposcategorias=$this->camposcategoria_model->lista_camposcategorias($idCategoria);
        $data['camposcategorias']=$camposcategorias;

        foreach($camposcategorias->result() as $row){
            //$var=$row->nombre;
            //var_dump($var);
            $data2['valor']=$_POST[$row->nombre];
            $data2['anuncio_idAnuncio']=$ultimoID;
            $data2['camposcategoria_idCamposCategoria']=$row->idCamposCategoria;
            $data2['usuarioid']=$idUsuario;
            $this->anuncio_model->insertar_datosCategoria($data2);

        }
        

        
        $codigo='r'.str_pad($ultimoID,5,'0',STR_PAD_LEFT);
        $data7['codigo']=$codigo;        
        $this->anuncio_model->modificarAnuncio_fotoRegistro($ultimoID,$data7);
        
        $nombrearchivo=$ultimoID.".jpg";
        
        $config['upload_path']='./uploads/anuncio';
        //nombre del archivo
        $config['file_name']=$nombrearchivo;
        
        //reemplazar los archivos
        $direccion=FCPATH."uploads\usuario\\".$nombrearchivo;
        if(file_exists($direccion))
        {     
            unlink($direccion);      
        }
        
        //tipos de archivos permitidos
        $config['allowed_types']='jpg';//'gif|jpg|png';
        $this->load->library('upload',$config);
        
        if (!$this->upload->do_upload())
        {
            //$data['error']=$this->upload->display_errors();
            
            redirect('usuario/panel','refresh');
        }
        else
        {          
            $data8['fotos']=$nombrearchivo;
            
            $this->anuncio_model->modificarAnuncio_fotoRegistro($ultimoID,$data8);
            $this->upload->data();
            redirect('usuario/panel','refresh');
        }
        
    }

    public function agregar_empleo()
    {
        $idUsuario=$this->session->userdata('idUsuario');

        $idCategoria=$_GET['cat'];

        $actividades=$this->actividad_model->lista_actividad_empleo();
        $data['actividades']=$actividades;
        
        $ciudades=$this->anuncio_model->lista_ciudades();
        $data['ciudades']=$ciudades;
        
        $camposcategorias=$this->camposcategoria_model->lista_camposcategorias($idCategoria);
        $data['camposcategorias']=$camposcategorias;
        $data['idCategoria']=$idCategoria;
       
        if ($idUsuario==2) {
            $this->load->view('inc/header_view2.php');     
        }
        else
        {
            $this->load->view('inc/header_view3.php');
        }
		$this->load->view('anuncio_agregar_empleo',$data); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
        
    }

    public function agregarbd_empleo()
    {
        
        $idUsuario=$this->session->userdata('idUsuario');
        //$idCategoria=$_POST['categoria_idCategoria'];
        $idCategoria=$_POST['idCategoria'];
        $data['codigo']="r";
        $data['titulo']=$_POST['titulo'];
        $data['precio']=$_POST['precio'];
        
        $data['descripcion']=$_POST['descripcion']; 
        $data['usuario_idUsuario']=$idUsuario;
        
        $data['actividad_idActividad']=$_POST['actividad_idActividad'];
        $data['ciudad_idCiudad']=$_POST['ciudad_idCiudad'];
        $data['categoria_idCategoria']=$idCategoria;

        $this->anuncio_model->insertar_anuncio($data);
        $ultimoID=$this->db->insert_id();

        $camposcategorias=$this->camposcategoria_model->lista_camposcategorias($idCategoria);
        $data['camposcategorias']=$camposcategorias;

        foreach($camposcategorias->result() as $row){
            //$var=$row->nombre;
            //var_dump($var);
            $data2['valor']=$_POST[$row->nombre];
            $data2['anuncio_idAnuncio']=$ultimoID;
            $data2['camposcategoria_idCamposCategoria']=$row->idCamposCategoria;
            $data2['usuarioid']=$idUsuario;
            $this->anuncio_model->insertar_datosCategoria($data2);

        }
          
        $codigo='r'.str_pad($ultimoID,5,'0',STR_PAD_LEFT);
        $data3['codigo']=$codigo;        
        $this->anuncio_model->modificarAnuncio_fotoRegistro($ultimoID,$data3);
        
        $nombrearchivo=$ultimoID.".jpg";
        
        $config['upload_path']='./uploads/anuncio';
        //nombre del archivo
        $config['file_name']=$nombrearchivo;
        
        //reemplazar los archivos
        $direccion=FCPATH."uploads\usuario\\".$nombrearchivo;
        if(file_exists($direccion))
        {     
            unlink($direccion);      
        }
        
        //tipos de archivos permitidos
        $config['allowed_types']='jpg';//'gif|jpg|png';
        $this->load->library('upload',$config);
        
        if (!$this->upload->do_upload())
        {
            //$data['error']=$this->upload->display_errors();
            
            redirect('usuario/panel','refresh');
        }
        else
        {          
            $data4['fotos']=$nombrearchivo;
            
            $this->anuncio_model->modificarAnuncio_fotoRegistro($ultimoID,$data4);
            $this->upload->data();
            redirect('usuario/panel','refresh');
        }
        
    }

    public function agregar_formacion()
    {
        $idUsuario=$this->session->userdata('idUsuario');

        $idCategoria=$_GET['cat'];

        $actividades=$this->actividad_model->lista_actividad_formacion();
        $data['actividades']=$actividades;
        
        $ciudades=$this->anuncio_model->lista_ciudades();
        $data['ciudades']=$ciudades;
        
        $camposcategorias=$this->camposcategoria_model->lista_camposcategorias($idCategoria);
        $data['camposcategorias']=$camposcategorias;
        $data['idCategoria']=$idCategoria;
       
        if ($idUsuario==2) {
            $this->load->view('inc/header_view2.php');     
        }
        else
        {
            $this->load->view('inc/header_view3.php');
        }
		$this->load->view('anuncio_agregar_formacion',$data); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
    }

    public function agregarbd_formacion()
    {
        
        $idUsuario=$this->session->userdata('idUsuario');
        //$idCategoria=$_POST['categoria_idCategoria'];
        $idCategoria=$_POST['idCategoria'];
        $data['codigo']="r";
        $data['titulo']=$_POST['titulo'];
        $data['precio']=$_POST['precio'];
        
        $data['descripcion']=$_POST['descripcion']; 
        $data['usuario_idUsuario']=$idUsuario;
        
        $data['actividad_idActividad']=$_POST['actividad_idActividad'];
        $data['ciudad_idCiudad']=$_POST['ciudad_idCiudad'];
        $data['categoria_idCategoria']=$idCategoria;

        $this->anuncio_model->insertar_anuncio($data);
        $ultimoID=$this->db->insert_id();

        $camposcategorias=$this->camposcategoria_model->lista_camposcategorias($idCategoria);
        $data['camposcategorias']=$camposcategorias;

        foreach($camposcategorias->result() as $row){
            //$var=$row->nombre;
            //var_dump($var);
            $data2['valor']=$_POST[$row->nombre];
            $data2['anuncio_idAnuncio']=$ultimoID;
            $data2['camposcategoria_idCamposCategoria']=$row->idCamposCategoria;
            $data2['usuarioid']=$idUsuario;
            $this->anuncio_model->insertar_datosCategoria($data2);

        }
          
        $codigo='r'.str_pad($ultimoID,5,'0',STR_PAD_LEFT);
        $data3['codigo']=$codigo;        
        $this->anuncio_model->modificarAnuncio_fotoRegistro($ultimoID,$data3);
        
        $nombrearchivo=$ultimoID.".jpg";
        
        $config['upload_path']='./uploads/anuncio';
        //nombre del archivo
        $config['file_name']=$nombrearchivo;
        
        //reemplazar los archivos
        $direccion=FCPATH."uploads\usuario\\".$nombrearchivo;
        if(file_exists($direccion))
        {     
            unlink($direccion);      
        }
        
        //tipos de archivos permitidos
        $config['allowed_types']='jpg';//'gif|jpg|png';
        $this->load->library('upload',$config);
        
        if (!$this->upload->do_upload())
        {
            //$data['error']=$this->upload->display_errors();
            
            redirect('usuario/panel','refresh');
        }
        else
        {          
            $data4['fotos']=$nombrearchivo;
            
            $this->anuncio_model->modificarAnuncio_fotoRegistro($ultimoID,$data4);
            $this->upload->data();
            redirect('usuario/panel','refresh');
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
        $idUsuario=$this->session->userdata('idUsuario');

        //$idUsuario=$_POST['idUsuario'];
        //$data2['idUsuario']=$_POST['idUsuario'];
        $idAnuncio=$_POST['idAnuncio'];

        $data['idAnuncio']=$_POST['idAnuncio'];
        $data['infoanuncio']=$this->anuncio_model->recuperarAnuncio($idAnuncio);

        if ($idUsuario==2) {
            $this->load->view('inc/header_view2.php');     
        }
        else
        {
            $this->load->view('inc/header_view3.php');
        }
		$this->load->view('anuncio_lista_modificarAdmi',$data); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
    }

    public function modificar_anuncio_user()
    {
        //$idUsuario=$_POST['idUsuario'];
        //$data2['idUsuario']=$_POST['idUsuario'];
        $idAnuncio=$_POST['idAnuncio'];
        $categoria=$_POST['nombre'];
        $idUsuario=$this->session->userdata('idUsuario');

        if($categoria=='Vehiculos'){
            $data['idAnuncio']=$_POST['idAnuncio'];
            $data['infoanuncio']=$this->anuncio_model->recuperarAnuncioVehiculo($idAnuncio,$idUsuario);
            //$data2['infodatos']=$this->anuncio_model->recuperarDatosCategoria($idAnuncio,$idAnuncio);

            $this->load->view('inc/header_view3.php'); // archivos de cabecera
            $this->load->view('anuncio_modificarVehiculo'); // contenido
            $this->load->view('inc/footer_view.php'); // archivos de footer (js)
        }
        if ($categoria=='Ropas') {
            $data['idAnuncio']=$_POST['idAnuncio'];
            $data['infoanuncio']=$this->anuncio_model->recuperarAnuncio($idAnuncio);
            $this->load->view('inc/header_view3.php'); // archivos de cabecera
            $this->load->view('anuncio_lista_modificarUser',$data); // contenido
            $this->load->view('inc/footer_view.php'); // archivos de footer (js)
        }
        if ($categoria=='Empleos') {
            $data['idAnuncio']=$_POST['idAnuncio'];
            $data['infoanuncio']=$this->anuncio_model->recuperarAnuncio($idAnuncio);
            $this->load->view('inc/header_view3.php'); // archivos de cabecera
            $this->load->view('anuncio_lista_modificarUser',$data); // contenido
            $this->load->view('inc/footer_view.php'); // archivos de footer (js)
        }
        
        
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
  
    

    

    public function busquedacategoria()
    {
        $lista=$this->anuncio_model->lista_mis_anuncios();
        $data['anuncios']=$lista;
        $categorias=$this->categoria_model->lista_categorias();
        $data['categorias']=$categorias;
        
       
        $this->load->view('inc/header_view3.php'); // archivos de cabecera
		$this->load->view('anuncio_busquedaCategoria',$data); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
    }

	
}
