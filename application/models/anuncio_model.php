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

		$this->db->select('*');
        $this->db->from('anuncio');
        $this->db->where('anuncio.activo',1);
        $this->db->where('usuario_idUsuario',$idUsuario);
        $this->db->join('datoscategoria','datoscategoria.anuncio_idAnuncio=anuncio.idAnuncio');
        $this->db->join('categoria','categoria.idCategoria=anuncio.categoria_idCategoria');
        $this->db->join('ciudad','ciudad.idCiudad=anuncio.ciudad_idCiudad');
        $this->db->group_by('anuncio.idAnuncio');
        return $this->db->get();
	}

    public function eliminarAnuncio($idAnuncio,$data)
    {
        
        $this->db->where('idAnuncio',$idAnuncio);
        $this->db->update('anuncio',$data);
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

    public function lista_ciudades()
    {
        
        $this->db->select('*');
        $this->db->from('ciudad');
        $this->db->where('activo',1);
        return $this->db->get();
        
    }

}
