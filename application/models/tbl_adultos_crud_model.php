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

	public function agregar_cpu($num_inventario,$marca,$modelo,$hostname,$num_serie,$tipo,$ubicacion,$categoria,$status,$id_empleado)
	{
		$data=array('num_inventario' => $num_inventario,
					'marca' => $marca,
					'modelo' => $modelo,
					'hostname' => $hostname,
					'num_serie' => $num_serie,
					'tipo' => $tipo, 
					'ubicacion'=>$ubicacion,
					'categoria' => $categoria, 
					'status' => $status,
					'id_empleado'=>$id_empleado);
		$nuevo = $this->db->insert('adulto', $data);
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

	public function buscar_inventario($num_inventario)
	{
		$this->db->from('adulto');
		$this->db->join('tbl_empleados', 'adulto.id_empleado=tbl_empleados.id_empleado');
		$this->db->join('status_cpus','adulto.status=status_cpus.id');
		$this->db->where('adulto.num_inventario',$num_inventario);
		$res=$this->db->get();
		return $res->result(); 
	}
} 
?>