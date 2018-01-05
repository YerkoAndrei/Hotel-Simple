<?php
class Reservar_c extends CI_Controller {

	public function index()
	{
		if($data == null)
			$this->load->view('home');
	}
	public function insertar()
	{
		$res = $this->reserva->insertar();
		
		if($res)
		{
			$error = 'Su reserva se ha creado con exito';
			$error = array('error' => $error);
			$this->session->set_userdata($error);

			$this->load->view('user');
		}
		else
		{
			$error = 'Su reserva tuvo un error';
			$error = array('error' => $error);
			$this->session->set_userdata($error);

			$this->load->view('user');
		}
	}
}