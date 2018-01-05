<?php
class VistasReservas extends CI_Controller {

	public function index()
	{
		if($data == null)
			$this->load->view('home');
	}
	public function buscar()
	{
		$tabla['reservas'] = $this->reserva->buscarPorUsuario();
		$tabla['habitaciones'] =  $this->habitacion->buscarTodas();
		$this->load->view('pagos', $tabla);
	}
}