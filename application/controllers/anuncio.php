<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anuncio extends CI_Controller {

	
    public function agregar()
    {
        
        $idRol=$this->session->userdata('rol_idRol');
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
        // archivos de cabecera
		$this->load->view('anuncio_agregar',$data); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
    }

    public function agregarbdFALSE()
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
        $this->anuncio_model->modificarAnuncio($ultimoID,$data7);
        
        $nombrearchivo=$ultimoID.".jpg";
        $nombrearchivo2=$ultimoID."_2".".jpg";
        $nombrearchivo3=$ultimoID."_3".".jpg";
        
        $config['upload_path']='./uploads/anuncio';
        //nombre del archivo
        $config['file_name']=$nombrearchivo;
        $config['allowed_types']='jpg|png';//'gif|jpg|png';
        
        //reemplazar los archivos
        $direccion=FCPATH."uploads\usuario\\".$nombrearchivo;
        $direccion2=FCPATH."uploads\usuario\\".$nombrearchivo2;
        $direccion3=FCPATH."uploads\usuario\\".$nombrearchivo3;
        if(file_exists($direccion))
        {     
            unlink($direccion);      
        }
        if(file_exists($direccion2))
        {     
            unlink($direccion2);      
        }
        if(file_exists($direccion3))
        {     
            unlink($direccion3);      
        }
        
        //tipos de archivos permitidos
        $this->load->library('upload',$config);
        // $this->load->library('upload2',$config);
        // $this->load->library('upload3',$config);
        
        if (!$this->upload->do_upload())
        {
            $data9['fotos']="perfil.jpg";
            $data9['fotos2']=$nombrearchivo2;
            $data10['fotos3']=$nombrearchivo3;

           
            $this->anuncio_model->modificarAnuncio($idUsuario,$data9);
            redirect('usuario/panel','refresh');
            //redirect('usuario/panel','refresh');
        }
        else
        {          
            $data8['fotos']=$nombrearchivo;
            $data8['fotos2']=$nombrearchivo;
            $data8['fotos3']=$nombrearchivo;
            
            
            $this->anuncio_model->modificarAnuncio($ultimoID,$data8);
            // $this->anuncio_model->modificarAnuncio_fotoRegistro($ultimoID,$data9);
            // $this->anuncio_model->modificarAnuncio_fotoRegistro($ultimoID,$data10);
            $this->upload->data();
            redirect('usuario/panel','refresh');
        }
        
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
        $this->anuncio_model->modificarAnuncio($ultimoID,$data7);
        
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
            $data9['fotos']="perfil.jpg";
            

           
            $this->anuncio_model->modificarAnuncio($idUsuario,$data9);
            redirect('usuario/panel','refresh');
        }
        else
        {          
            $data8['fotos']=$nombrearchivo;
            
            $this->anuncio_model->modificarAnuncio($ultimoID,$data8);
            $this->upload->data();
            redirect('usuario/panel','refresh');
        }
        
    }


    public function agregar_empleo()
    {
        $idUsuario=$this->session->userdata('idUsuario');
        $idRol=$this->session->userdata('rol_idRol');

        $idCategoria=$_GET['cat'];

        $actividades=$this->actividad_model->lista_actividad_empleo();
        $data['actividades']=$actividades;
        
        $ciudades=$this->anuncio_model->lista_ciudades();
        $data['ciudades']=$ciudades;
        
        $camposcategorias=$this->camposcategoria_model->lista_camposcategorias($idCategoria);
        $data['camposcategorias']=$camposcategorias;
        $data['idCategoria']=$idCategoria;
       
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
        $idRol=$this->session->userdata('rol_idRol');

        $idCategoria=$_GET['cat'];

        $actividades=$this->actividad_model->lista_actividad_formacion();
        $data['actividades']=$actividades;
        
        $ciudades=$this->anuncio_model->lista_ciudades();
        $data['ciudades']=$ciudades;
        
        $camposcategorias=$this->camposcategoria_model->lista_camposcategorias($idCategoria);
        $data['camposcategorias']=$camposcategorias;
        $data['idCategoria']=$idCategoria;
       
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

    public function eliminar(){
        $idAnuncio=$_GET['var'];
        $data['anuncio.activo']=0;
        $data2['datoscategoria.activo']=0;
        $this->anuncio_model->eliminarAnuncio($idAnuncio,$data);
        $this->anuncio_model->eliminarDatosCategoria($idAnuncio,$data2);
        
        redirect('usuario/misAnuncios','refresh');
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

        $idAnuncio=$_POST['idAnuncio'];

        $data['idAnuncio']=$_POST['idAnuncio'];
        $data['infoanuncio']=$this->anuncio_model->recuperarAnuncio($idAnuncio);

        
        $this->load->view('inc/header_viewAdmi.php');
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
        $idRol=$this->session->userdata('rol_idRol');
        $anuncios=null;
        $idCategoria=$_GET['cat'];
        if ($idCategoria==10)
        {
            $lista=$this->anuncio_model->listaTodosLosAnuncios();
        }else
        {
            $lista=$this->anuncio_model->listaAnunciosCategoria($idCategoria);
        }
        $camposcategorias=$this->camposcategoria_model->lista_camposcategorias($idCategoria);
        $data['camposcategorias']=$camposcategorias;
        
        foreach($lista->result() as $row){      
            
            $datosCategoria=$this->anuncio_model->getdatosCategoria($row->idAnuncio,$row->usuario_idUsuario);
                  
            $row->datosCategoria=$datosCategoria->result();
            $anuncios[]=$row;
            

        }
        //var_dump($anuncios);
        $data['tipoBuscador']='categoria';
        $data['anuncios']=$anuncios;
        $data['idCategoria']=$idCategoria;
        // $lista=$this->anuncio_model->lista_mis_anuncios();
        // $data['anuncios']=$lista;
        $categorias=$this->categoria_model->lista_categorias();
        $data['categorias']=$categorias;

        $ciudades=$this->anuncio_model->lista_ciudades();
        $data['ciudades']=$ciudades;

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
		$this->load->view('anuncio_listado',$data); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
    }

    public function resultadoAnuncio()
    {
        //$idUsuario=$this->session->userdata('idUsuario');
        $anuncios=null;
        //$lista=$this->anuncio_model->lista_mis_anuncios();
        $idCategoria=$_POST['idCategoria'];
        //$idCiudad=$_POST['campo_Ciudad'];
        //var_dump($idCiudad);
        $idCamposCategoria=null;
        $camposBusqueda=$_POST['campos'];
        //var_dump($camposBusqueda);
        $campos=array();
        if ($camposBusqueda) {
            foreach ($camposBusqueda as $key => $item) {
                //print_r($key);
                // print_r($item['name']);
                // print_r($item['value']);
                // print_r('++++++');
                //anuncio.titulo++++++datoscategoria.valor.1
                if ($item['value']!='') {
                    $partes=explode('.',$item['name']);
                    if (isset($partes[0]) && isset($partes[1])) {
                        
                        $newName=$partes[0].'.'.$partes[1];
                        $item['name']=$newName;
                    }
                    $campos[]=$item;
                }             
            }         //var_dump($campos);
        }    
        $lista=$this->anuncio_model->listaAnunciosFiltro($idCategoria,$campos);

        if ($lista) {
            foreach($lista->result() as $row){
            
                $datosCategoria=$this->anuncio_model->getdatosCategoria($row->idAnuncio,$row->usuario_idUsuario);
                
                $row->datosCategoria=$datosCategoria->result();
                $anuncios[]=$row;
    
            }
        }
           
        $data['anuncios']=$anuncios;
    
		$this->load->view('anuncio_resultAnuncio',$data); // contenido
    }

    public function busquedageneral()
    {
        
        $idRol=$this->session->userdata('rol_idRol');
        $anuncios=null;
        $textoBusqueda=$_POST['textoBusqueda'];
        //die($idCategoria);
        $lista=$this->anuncio_model->listaTodosLosAnuncios($textoBusqueda);
        
        foreach($lista->result() as $row){      
            
            $datosCategoria=$this->anuncio_model->getdatosCategoria($row->idAnuncio,$row->usuario_idUsuario);
                  
            $row->datosCategoria=$datosCategoria->result();
            $anuncios[]=$row;
        
        }
        $data['tipoBuscador']='general';
        $data['anuncios']=$anuncios;
        $data['textoBusqueda']=$textoBusqueda;
       
        // $lista=$this->anuncio_model->lista_mis_anuncios();
        // $data['anuncios']=$lista;
        $categorias=$this->categoria_model->lista_categorias();
        $data['categorias']=$categorias;

        // $ciudades=$this->anuncio_model->lista_ciudades();
        // $data['ciudades']=$ciudades;

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
		$this->load->view('anuncio_listado',$data); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
    }


    public function anuncioInfo()
    {
        $idRol=$this->session->userdata('rol_idRol');
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
		$this->load->view('anuncio_informacion'); // contenido
		$this->load->view('inc/footer_view.php'); // archivos de footer (js)
        
    }

    public function enviarMensaje()
    {
        $correoOrigen=$_POST['correo'];
        $asunto=$_POST['asunto'];
        $mensaje=$_POST['mensaje'];
        // var_dump($correoOrigen);
        // var_dump($asunto);
        // var_dump($mensaje);
        $this->load->library('email');
        
        //Indicamos el protocolo a utilizar
         $config['protocol'] = 'smtp';
          
        //El servidor de correo que utilizaremos
         $config["smtp_host"] = 'smtp.gmail.com';
          
        //Nuestro usuario
         $config["smtp_user"] = 'telcomhardy@gmail.com';
          
        //Nuestra contraseña
         $config["smtp_pass"] = 'veronica2020';   
          
        //El puerto que utilizará el servidor smtp
         $config["smtp_port"] = '587';
         
        //El juego de caracteres a utilizar
         $config['charset'] = 'utf-8';
  
        //Permitimos que se puedan cortar palabras
         $config['wordwrap'] = TRUE;
          
        //El email debe ser valido 
        $config['validate'] = true;
        
         
       //Establecemos esta configuración
         $this->email->initialize($config);
  
       //Ponemos la dirección de correo que enviará el email y un nombre
         $this->email->from($correoOrigen);//colocar el correo de sesion
        
         $this->email->to('telecomhardy@gmail.com');
          
       //Definimos el asunto del mensaje
         $this->email->subject($asunto);//$this->input->post("asunto")
          
       //Definimos el mensaje a enviar
         $this->email->message($mensaje
                 //"Email: ".$this->input->post("email").
                 //" Mensaje: ".$this->input->post("mensaje")
                 );
          
         //Enviamos el email y si se produce bien o mal que avise con una flasdata
         if($this->email->send()){
             var_dump("envio");
             $this->session->set_flashdata('envio', 'Email enviado correctamente');
         }else{
            var_dump("no envio");
             $this->session->set_flashdata('envio', 'No se a enviado el email');
         }
          
         redirect('anuncio/anuncioInfo','refresh');
 
    }


	
}
