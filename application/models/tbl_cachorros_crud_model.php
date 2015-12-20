<?php
class Tbl_cachorros_crud_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function cargar_cachorros()
	{
		$this->db->from('cachorro');
		//$this->db->join('tbl_empleados', 'cachorro.id_empleado=tbl_empleados.id_empleado');
		//$this->db->join('status_cpus','cachorro.status=status_cpus.id');
		$this->db->group_by('sku','asc');
		$this->db->order_by('sku','asc');
		$res=$this->db->get();
		return $res->result(); 
	}

	public function agregar($presentacion)
	{
		$nuevo = $this->db->insert('cachorro', $presentacion);
	}

	public function actualizar($presentacion)
	{		
		$id = $presentacion['id'];
		$this->db->where('id',$id);
		$this->db->update('cachorro',$presentacion);
	}

	public function cargar_detalles($sku)
	{	
		$this->db->where('sku',$sku);
		$this->db->order_by('peso','asc');
		$this->db->order_by('edad','asc');		
		$res=$this->db->get('cachorro');
		return $res->result(); 
	}

	public function eliminar($presentacion)
	{		
		$id = $presentacion['id'];
		$this->db->where('id',$id);
		$this->db->delete('cachorro',$presentacion);
	}

	public function eliminarsku($sku)
	{		
		$this->db->where('sku',$sku);
		$this->db->delete('cachorro');
	}


} 
?>