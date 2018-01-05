<?php
class Administracion_c extends CI_Controller {

	public function index()
	{
		if($data == null)
			$this->load->view('home');
	}
	public function buscar()
	{
		$todo['reservas'] = $this->reserva->buscarTodas();
		$todo['pagos'] =  $this->pago->buscarTodas();
		$todo['habitaciones'] =  $this->habitacion->buscarTodas();
		$this->load->view('admin', $todo);
	}
	public function confirmar()
	{
		$res = $this->habitacion->confirmar();
		if($res)
			$this->load->view('admin2');
	}
	public function desocupar()
	{
		$res = $this->habitacion->desocupar();
		if($res)
			$this->load->view('admin2');
	}
}