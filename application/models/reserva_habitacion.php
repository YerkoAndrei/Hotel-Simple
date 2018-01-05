<?php

class reserva_habitacion extends CI_Model
{
	function __construct()
	{
		return $this->db->get('reserva_habitacion');
	}
	public function buscarPorReserva($reserva = '')
	{
		$result= $this->db->query("select * from reserva_habitacion where id_reserva = ".$reserva);
		return $result->row();
	}
	public function buscar()
	{
		$result= $this->db->query("select * from reserva_habitacion");
		return $result->row();
	}
}