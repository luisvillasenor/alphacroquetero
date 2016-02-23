<?php
class Tbl_recordatorios_crud_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function show($status_recordatorio = null)
	{
		if ( isset($status_recordatorio) ) {

			$this->db->where('status_recordatorio',$status_recordatorio);
			$res = $this->db->get('recordatorios');
			return $res->result(); 
		}
		$res = $this->db->get('recordatorios');
		return $res->result(); 
	}

	public function actualizar_status($id = null)
	{
		if ( isset($id) ) {
			
			$data = array(
				'status_recordatorio' => 1,
				'fecha_envio' => date('Y-m-d H:i:s')
			);
			$this->db->where('id',$id);
			$this->db->update('recordatorios',$data);
			return TRUE;		
		}
		return null;		
	}



} 
?>