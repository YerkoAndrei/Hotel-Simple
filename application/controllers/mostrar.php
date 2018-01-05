<?php
class Mostrar extends CI_Controller {

	public function index()
	{
		if($data == null)
			$this->load->view('home');
	}
	public function buscar()
	{
		$tabla['habitaciones'] = $this->habitacion->buscar();
		$this->load->view('reservas', $tabla);
	}
}