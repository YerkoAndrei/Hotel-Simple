<?php

class habitacion extends CI_Model
{
	function __construct()
	{
		return $this->db->get('habitacion');
	}
	public function buscar()
	{
		$tipo = $this->input->post('tipo');
		$query = $this->db->query("select * from habitacion where tipo = '".$tipo."'");
		$tabla = array();

		foreach ($query->result() as $row)
		{
        	array_push($tabla, $row);
		}
		return $tabla;
	}
	public function buscarTodas()
	{
		$query = $this->db->query("select * from habitacion");
		$todo = array();
		
		foreach ($query->result() as $row)
		{
        	array_push($todo, $row);
		}
		return $todo;
	}
	public function confirmar()
	{
		$id = $this->input->post('id_habitacion');

		//confirmar habitacion
		$data = array(
            'estado' => 'ocupada'
        );
		$this->db->where('id_habitacion', $id);
		$this->db->update('habitacion', $data);

		//confirmar reserva
		$data = array(
            'estado' => 'terminada'
        );
		$this->db->where('id_habitacion', $id);
		$this->db->update('reserva', $data);
		return true;
	}
	public function desocupar()
	{
		$id = $this->input->post('id_habitacion');

		//confirmar habitacion
		$data = array(
            'estado' => 'disponible'
        );
		$this->db->where('id_habitacion', $id);
		$this->db->update('habitacion', $data);

		return true;
	}
}