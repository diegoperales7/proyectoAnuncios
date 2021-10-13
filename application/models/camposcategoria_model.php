<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Camposcategoria_model extends CI_Model {

	
	public function lista_camposcategorias($idcategoria)
	{
		$this->db->select('*');
        $this->db->where('categoria_idCategoria',$idcategoria);
        $this->db->from('camposcategoria');
        
        return $this->db->get();
	}

    


}
