<?php

class pago extends CI_Model
{
	function __construct()
	{
		return $this->db->get('pago');
	}
	public function buscarPorUsuario()
	{
		$actual = $this->session->userdata('email');
		$query = $this->db->query("select * from pago where email_usuario = '".$actual."'");
		$tabla = array();

		foreach ($query->result() as $row)
		{
        	array_push($tabla, $row);
		}
		return $tabla;
	}
	public function buscarTodas()
	{
		$query = $this->db->query("select * from pago");
		$todo = array();
		
		foreach ($query->result() as $row)
		{
        	array_push($todo, $row);
		}
		return $todo;
	}
	public function pagar()
	{
		$actual = $this->session->userdata('email');

		$datos = array (
		'email_usuario' => $actual,
		'id_reserva' => $this->input->post('id_reserva'),
		'total' =>  $this->input->post('total'),
		);

		$result = $this->db->insert("pago", $datos);
		if($result > 0)
		{
			//actualiza habitacion
			$id = $this->input->post('id_habitacion');
			$data = array(
		           'estado' => 'por_confirmar'		        
		        );
			$this->db->where('id_habitacion', $id);
			$this->db->update('habitacion', $data); 

			//actualiza reserva
			$id = $this->input->post('id_reserva');
			$data = array(
		           'estado' => 'pagada'		        
		        );
			$this->db->where('id_reserva', $id);
			$this->db->update('reserva', $data); 

			return true;
		}
		else
			return false;
	}
	public function cancelar()
	{
		$actual = $this->session->userdata('email');

		//actualiza habitacion
		$id_habitacion = $this->input->post('id_habitacion');
		$data = array(
		        'estado' => 'disponible'		        
		    );
		$this->db->where('id_habitacion', $id_habitacion);
		$this->db->update('habitacion', $data); 

		//elimina reserva
		$id_reserva = $this->input->post('id_reserva');
		$this->db->where('id_reserva', $id_reserva);
		$this->db->delete('reserva');

		return true;
	}
}