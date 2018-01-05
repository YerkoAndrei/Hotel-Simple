<?php
class Modificar_c extends CI_Controller {

	public function index()
	{
		if($data == null)
			$this->load->view('home');
	}
	public function modificar()
	{
		$fila = $this->usuario->modificar();

		if($fila)
		{
			$error = 'Datos modificados';
			$error = array('error' => $error);
			$this->session->set_userdata($error);

			$this->load->view('user');
		}
		else
		{
			$error = 'Error en modificacion de datos';
			$error = array('error' => $error);
			$this->session->set_userdata($error);

			$this->load->view('user');
		}
	}
}