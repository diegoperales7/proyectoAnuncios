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

    public function usuarioAnuncioInfo($idAnuncio)
	{
		//$this->db->select('*');
        $this->db->select('usuario.nombres,usuario.primerApellido,usuario.segundoApellido,usuario.correo,usuario.foto,ciudad.ciudad,usuario.celular');
        $this->db->from('anuncio');
        $this->db->where('anuncio.activo',1);
        $this->db->where('anuncio.idAnuncio',$idAnuncio);
        //$this->db->join('actividad','actividad.idActividad=anuncio.actividad_idActividad');
        $this->db->join('usuario','usuario.idUsuario=anuncio.usuario_idUsuario');
        //$this->db->join('categoria','categoria.idCategoria=anuncio.categoria_idCategoria');
        $this->db->join('ciudad','ciudad.idCiudad=anuncio.ciudad_idCiudad');  
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

    public function lista_roles()
    {
        
        $this->db->select('*');
        $this->db->from('rol');
        $this->db->where('activo',1);
        return $this->db->get();
        
    }

}
