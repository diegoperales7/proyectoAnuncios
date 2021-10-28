<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anuncio_model extends CI_Model {

	
	public function lista_anuncio_admi()
	{
        
		$this->db->select('*');
        $this->db->from('anuncio');
        $this->db->where('anuncio.activo',1);
        $this->db->join('datoscategoria','datoscategoria.anuncio_idAnuncio=anuncio.idAnuncio','left');
        $this->db->join('categoria','categoria.idCategoria=datoscategoria.categoria_idCategoria','left');
        $this->db->join('ciudad','ciudad.idCiudad=anuncio.ciudad_idCiudad','left');
        $this->db->group_by('anuncio.idAnuncio');
        $this->db->order_by("anuncio.fechaRegistro", "desc");

        return $this->db->get();
	}

        
	

    

    public function insertar_anuncio($data)
    {
        $this->db->insert('anuncio',$data);    
    }

    public function insertar_datosCategoria($data2)
    {
        $this->db->insert('datoscategoria',$data2);    
    }


    public function lista_mis_anuncios()
	{
        $idUsuario=$this->session->userdata('idUsuario');

		//$this->db->select('*');
        $this->db->select('anuncio.idAnuncio,anuncio.codigo,anuncio.titulo,anuncio.precio,anuncio.estado,anuncio.descripcion,anuncio.fotos,anuncio.fechaRegistro,actividad.tipo,categoria.nombre,ciudad.ciudad');
        $this->db->from('anuncio');
        $this->db->where('anuncio.activo',1);
        $this->db->where('anuncio.usuario_idUsuario',$idUsuario);
        $this->db->join('actividad','actividad.idActividad=anuncio.actividad_idActividad');
        $this->db->join('categoria','categoria.idCategoria=anuncio.categoria_idCategoria');
        $this->db->join('ciudad','ciudad.idCiudad=anuncio.ciudad_idCiudad');
        $this->db->order_by("anuncio.fechaRegistro", "desc");
        
        //$this->db->group_by('anuncio.idAnuncio');
        
        return $this->db->get();
	}
    
    public function listaAnunciosCategoria($idCategoria)
	{
		//$this->db->select('*');
        $this->db->select('anuncio.idAnuncio,anuncio.codigo,anuncio.titulo,anuncio.precio,anuncio.estado,anuncio.descripcion,anuncio.fotos,anuncio.fechaRegistro,anuncio.usuario_idUsuario,actividad.tipo,categoria.nombre,ciudad.ciudad');
        $this->db->from('anuncio');
        $this->db->where('anuncio.activo',1);
        $this->db->where('anuncio.categoria_idCategoria',$idCategoria);
        $this->db->join('actividad','actividad.idActividad=anuncio.actividad_idActividad');
        $this->db->join('categoria','categoria.idCategoria=anuncio.categoria_idCategoria');
        $this->db->join('ciudad','ciudad.idCiudad=anuncio.ciudad_idCiudad');  
        $this->db->order_by("anuncio.fechaRegistro", "desc");
 
        return $this->db->get();
	}

    public function listaTodosLosAnuncios($parametro='')
	{
		//$this->db->select('*');
        $this->db->select('anuncio.idAnuncio,anuncio.codigo,anuncio.titulo,anuncio.precio,anuncio.estado,anuncio.descripcion,anuncio.fotos,anuncio.fechaRegistro,anuncio.usuario_idUsuario,actividad.tipo,categoria.nombre,ciudad.ciudad');
        $this->db->from('anuncio');
        $this->db->where('anuncio.activo',1);
        if ($parametro!='') {
            $this->db->like('anuncio.titulo',$parametro,'both');
        }
        $this->db->join('actividad','actividad.idActividad=anuncio.actividad_idActividad');
        $this->db->join('categoria','categoria.idCategoria=anuncio.categoria_idCategoria');
        $this->db->join('ciudad','ciudad.idCiudad=anuncio.ciudad_idCiudad');  
        $this->db->order_by("anuncio.fechaRegistro", "desc");
 
        return $this->db->get();
	}
    public function getdatosCategoria($idAnuncio,$idUsuario)
    {
        //$idUsuario=$this->session->userdata('idUsuario');
        
        $this->db->select('datoscategoria.valor');
        $this->db->from('datoscategoria');
        $this->db->where('anuncio_idAnuncio',$idAnuncio);
        $this->db->where('usuarioid',$idUsuario);
        return $this->db->get();
        
    }

    public function listaAnunciosFiltro($idCategoria,$camposFiltro)
    {
        //$idUsuario=$this->session->userdata('idUsuario');

        // select *
        //     from anuncio a
        //     left join datoscategoria d on d.anuncio_idAnuncio=a.idAnuncio
        //     where a.ciudad_idCiudad=3 and
        //         a.categoria_idCategoria=1 and
        //         (d.valor like '%ford%' or 
        //         d.valor like '%2015%')
        //         Group by a.idAnuncio;
        
        $this->db->select('anuncio.idAnuncio,anuncio.codigo,anuncio.titulo,anuncio.precio,anuncio.estado,anuncio.descripcion,anuncio.fotos,anuncio.fechaRegistro,anuncio.usuario_idUsuario,actividad.tipo,categoria.nombre,ciudad.ciudad');
        $this->db->from('anuncio');
        $this->db->join('datoscategoria','datoscategoria.anuncio_idAnuncio=anuncio.idAnuncio');
        $this->db->join('actividad','actividad.idActividad=anuncio.actividad_idActividad');
        $this->db->join('categoria','categoria.idCategoria=anuncio.categoria_idCategoria');
        $this->db->join('ciudad','ciudad.idCiudad=anuncio.ciudad_idCiudad');  
        $this->db->where('anuncio.categoria_idCategoria',$idCategoria);
        if (is_array($camposFiltro)) 
        {
            print_r("primero");
            $camposAnd=$camposOr=array();
            
            foreach ($camposFiltro as $key => $campo) 
            {
                if ($campo['name']=='datoscategoria.valor' || $campo['name']=='anuncio.titulo' ) {
                    print_r("segundo");
                    $camposOr[]=$campo;
                }else{
                    $camposAnd[]=$campo;
                }

            }
            if (is_array($camposOr) && count($camposOr)>0) {
                print_r("tercero");
                $this->db->group_start();
                foreach ($camposOr as $key => $campo) {
                    $this->db->like($campo['name'],$campo['value'],'both');
                }
                $this->db->group_end();
            }
            
            if(is_array($camposAnd) && count($camposAnd)>0){
                print_r("cuarto");
                foreach ($camposAnd as $key => $campo) {
                    if ($campo['name']=='ciudad.idCiudad' && $campo['value']==0) {
                        //no se añade el filtro 
                        print_r("quinto");
                    }else{
                        print_r("sexto  ");
                        $this->db->where($campo['name'],$campo['value']);
                    }
                }
            }
        }
        
        $this->db->group_by('anuncio.idAnuncio');
        // $this->db->where('usuarioid',$idUsuario);
        //$this->db->get();
        //var_dump( $this->db->last_query()); 
        return $this->db->get();
        
    }

    public function eliminarAnuncio($idAnuncio,$data)
    {
        
        $this->db->where('idAnuncio',$idAnuncio);
        $this->db->update('anuncio',$data);
        //$this->db->delete('usuario');
        
    }

    public function eliminarDatosCategoria($idAnuncio,$data)
    {
        
        $this->db->where('anuncio_idAnuncio',$idAnuncio);
        $this->db->update('datoscategoria',$data);
        //$this->db->delete('usuario');
        
    }

    public function modificarAnuncio($idAnuncio,$data)
    {
        
        $this->db->where('idAnuncio',$idAnuncio);
        $this->db->update('anuncio',$data);
        
    }

    public function modificarAnuncio_fotoRegistro($idAnuncio,$data)
    {
        
        $this->db->where('idAnuncio',$idAnuncio);
        $this->db->update('anuncio',$data);
        
    }

    public function recuperarAnuncio($idAnuncio)
	{
		$this->db->select('*');
        $this->db->from('anuncio');
        $this->db->where('idAnuncio',$idAnuncio);
        return $this->db->get();
	}

    public function recuperarDatosCategoria($idAnuncio,$idUsuario)
	{
		$this->db->select('*');
        $this->db->from('datoscategoria');
        $this->db->where('idAnuncio',$idAnuncio);
        $this->db->where('idUsuario',$idUsuario);
        return $this->db->get();
	}

    public function recuperarAnuncioVehiculo($idAnuncio,$idUsuario)
	{
		$idUsuario=$this->session->userdata('idUsuario');

		$this->db->select('*');
        $this->db->from('anuncio');
        //$this->db->where('anuncio.activo',1);
        $this->db->where('idAnuncio',$idAnuncio);
        $this->db->where('datoscategoria.usuarioid',$idUsuario);
        $this->db->join('datoscategoria','datoscategoria.anuncio_idAnuncio=anuncio.idAnuncio');
        $this->db->join('categoria','categoria.idCategoria=anuncio.categoria_idCategoria');
        $this->db->join('ciudad','ciudad.idCiudad=anuncio.ciudad_idCiudad');
        $this->db->group_by('anuncio.idAnuncio');
        return $this->db->get();
	}

    public function lista_ciudades()
    {
        
        $this->db->select('*');
        $this->db->from('ciudad');
        $this->db->where('activo',1);
        return $this->db->get();
        
    }



}
