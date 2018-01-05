<?php

class reserva extends CI_Model
{
	function __construct()
	{
		return $this->db->get('reserva');
	}
	public function buscarPorUsuario()
	{
		$actual = $this->session->userdata('email');
		$query = $this->db->query("select * from reserva where email_usuario = '".$actual."'");
		$tabla = array();

		foreach ($query->result() as $row)
		{
        	array_push($tabla, $row);
		}
		return $tabla;
	}

	public function buscarTodas()
	{
		$query = $this->db->query("select * from reserva");
		$todo = array();
		
		foreach ($query->result() as $row)
		{
        	array_push($todo, $row);
		}
		return $todo;
	}

	public function insertar()
	{
		$actual = $this->session->userdata('email');
		
		$datos = array (
		'email_usuario' => $actual,
		'fecha_pedido' => date("Y/m/d"),
		'fecha_reserva' => $this->input->post('fecha_reserva'),
		'duracion' => $this->input->post('duracion'),
		'id_habitacion' => $this->input->post('id_habitacion'),
		'estado' => 'sin_pagar'
		);		

		$result = $this->db->insert("reserva", $datos);
		if($result > 0)
		{
			$id = $this->input->post('id_habitacion');
		
			$data = array(
	            'estado' => 'en_espera'
	        );

			$this->db->where('id_habitacion', $id);
			$this->db->update('habitacion', $data); 

			return true;
		}
		else
			return false;
	}
}