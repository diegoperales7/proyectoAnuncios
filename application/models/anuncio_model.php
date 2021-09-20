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

    public function lista_mis_anuncios()
	{
        
		$this->db->select('*');
        $this->db->from('anuncio');
        $this->db->where('anuncio.activo',1);
        $this->db->where('usuario_idUsuario',2);
        $this->db->join('datoscategoria','datoscategoria.anuncio_idAnuncio=anuncio.idAnuncio');
        $this->db->join('categoria','categoria.idCategoria=datoscategoria.categoria_idCategoria');
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

    public function recuperarAnuncio($idAnuncio)
	{
		$this->db->select('*');
        $this->db->from('anuncio');
        $this->db->where('idAnuncio',$idAnuncio);
        return $this->db->get();
	}


}
