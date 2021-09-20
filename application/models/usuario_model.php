<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	
	public function lista_usuarios()
	{
        //$activ=1;
		$this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('usuario.activo',1);
        $this->db->join('usuario_premium','usuario_premium.usuario_idUsuario=usuario.idUsuario','left');
        $this->db->join('rol','rol.idRol=usuario.rol_idRol');
        
        return $this->db->get();
	}

    public function recuperarUsuario($idUsuario)
	{
		$this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('idUsuario',$idUsuario);
        return $this->db->get();
	}

    public function modificarUsuario($idUsuario,$data)
    {
        
        $this->db->where('idUsuario',$idUsuario);
        $this->db->update('usuario',$data);
        
    }

    public function agregarUsuario($data)
    {
        $this->db->insert('usuario',$data);    
    }
	
    public function eliminarUsuario($idUsuario,$data)
    {
        
        $this->db->where('idUsuario',$idUsuario);
        $this->db->update('usuario',$data);
        //$this->db->delete('usuario');
        
    }

    public function validar($correo,$contrasena)
    {
        
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('correo',$correo);
        $this->db->where('contrasena',$contrasena);
        return $this->db->get();

        //$query="SELECT * FROM usuario WHERE correo='".$correo."' AND contrasena='".$contrasena."'";
        //return $this->db->query($query);
        
    }


}
