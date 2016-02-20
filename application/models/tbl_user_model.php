<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tbl_user_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	function verify_user($credenciales)
	{
		//verifica que este registrado un usuario en la base de datos tomando como parametros username 
		//y password regresando una respuesta V or F
		$res = '';
		$this->db->where('username',$credenciales[0]);
		$this->db->where('password',$credenciales[1]);
		$this->db->limit(1);

		$res = $this->db->get('tbl_user');

		if ( $res->num_rows() == 0 ) {
			return false;
		} else {
			return true;
		}
	}

	function verify_status ($credenciales)
	{
		//Se obtiene el status activo o inactivo del usuario que esta ingresando
		$res = '';
		$this->db->where('username',$credenciales[0]);
		$this->db->where('password',$credenciales[1]);
		$this->db->where('id_status',1);
		$this->db->limit(1);
		$res = $this->db->get('tbl_user');
		if ( $res->num_rows() == 0 ) {
			return false;
		} else {
			return true;
		}
	}

	function verify_rol($credenciales)
	{
		//Se obtiene el tipo de rol para identificar el mismo y dar los permisos de 
		//acceso aL sistema
		$res = '';
		$this->db->select('id_tipo');		
		$this->db->where('username',$credenciales[0]);
		$this->db->where('password',$credenciales[1]);
		$this->db->limit(1);
		$res = $this->db->get('tbl_user');
		if ($res->num_rows() > 0) 
		{
			foreach ( $res->result() as $row ) {
				$id_tipo = $row->id_tipo;
			}
			return $id_tipo;
		}
		else
		{
			return null;
		}
	} 

	function nombre_completo($credenciales)
	{
		//Se obtiene el tipo de rol para identificar el mismo y dar los permisos de 
		//acceso aL sistema
		$res = '';
		$this->db->select('nombre');		
		$this->db->where('username',$credenciales[0]);
		$this->db->where('password',$credenciales[1]);
		$this->db->limit(1);
		$res = $this->db->get('tbl_user');
		if ($res->num_rows() > 0) 
		{
			foreach ( $res->result() as $row ) {
				$nombre = $row->nombre;
			}
			return $nombre;
		}
		else
		{
			return null;
		}
	} 


}

