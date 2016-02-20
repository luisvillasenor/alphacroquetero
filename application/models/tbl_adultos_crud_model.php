<?php
class Tbl_adultos_crud_model extends CI_Model
{
	function __construct()
	{
		parent:: __construct();
	}

	public function cargar_adultos()
	{
		$this->db->from('adulto');
		//$this->db->join('tbl_empleados', 'adulto.id_empleado=tbl_empleados.id_empleado');
		//$this->db->join('status_cpus','adulto.status=status_cpus.id');
		$this->db->group_by('sku','asc');
		$this->db->order_by('sku','asc');
		$res=$this->db->get();
		return $res->result(); 
	}

	public function agregar($presentacion)
	{
		$nuevo = $this->db->insert('adulto', $presentacion);
	}

	public function actualizar($presentacion)
	{		
		$id = $presentacion['id'];
		$this->db->where('id',$id);
		$this->db->update('adulto',$presentacion);
	}

	public function cargar_detalles($sku)
	{	
		$this->db->where('sku',$sku);
		$this->db->order_by('peso','asc');
		$res=$this->db->get('adulto');
		return $res->result(); 
	}

	public function eliminar($presentacion)
	{		
		$id = $presentacion['id'];
		$this->db->where('id',$id);
		$this->db->delete('adulto',$presentacion);
	}

	public function eliminarsku($sku)
	{		
		$this->db->where('sku',$sku);
		$this->db->delete('adulto');
	}



} 
?>