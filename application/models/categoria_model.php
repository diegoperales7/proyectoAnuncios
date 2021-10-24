<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_model extends CI_Model {

	
	public function lista_categorias()
	{
		$this->db->select('*');
        $this->db->where('categoria.activo',1);
        $this->db->from('categoria');
        
        return $this->db->get();
	}

    public function lista_elegirCategoria()
	{
		$this->db->select('*');
        $this->db->from('categoria');
        $this->db->where('nombre !=','Todas');
        $this->db->where('nombre !=','Empleos');
        $this->db->where('nombre !=','Formacion');
        
        return $this->db->get();
	}

    public function eliminarCategoria($idCategoria,$data)
    {
        
        $this->db->where('idCategoria',$idCategoria);
        $this->db->update('categoria',$data);
        //$this->db->delete('usuario');
        
    }

    public function insertar_categoria($data)
    {
        $this->db->insert('categoria',$data);    
    }

    public function modificarCategoria($idCategoria,$data)
    {
        
        $this->db->where('idCategoria',$idCategoria);
        $this->db->update('categoria',$data);
        
    }

    public function recuperarCategoria($idCategoria)
	{
		$this->db->select('*');
        $this->db->from('categoria');
        $this->db->where('idCategoria',$idCategoria);
        return $this->db->get();
	}


}
