<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actividad_model extends CI_Model {

	
	public function lista_actividades()
	{
		$this->db->select('*');
        $this->db->where('actividad.activo',1);
        $this->db->from('actividad');
        
        return $this->db->get();
	}

    public function insertar_actividad($data)
    {
        $this->db->insert('actividad',$data);    
    }

    

    public function eliminarActividad($idActividad,$data)
    {
        
        $this->db->where('idActividad',$idActividad);
        $this->db->update('actividad',$data);
        //$this->db->delete('usuario');
        
    }

    public function modificarActividad($idActividad,$data)
    {
        
        $this->db->where('idActividad',$idActividad);
        $this->db->update('actividad',$data);
        
    }

    public function recuperarActividad($idActividad)
	{
		$this->db->select('*');
        $this->db->from('actividad');
        $this->db->where('idActividad',$idActividad);
        return $this->db->get();
	}


}
