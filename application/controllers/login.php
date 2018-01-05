<?php
class Login extends CI_Controller {

	public function index()
	{
		$error = '';
		$error = array('error' => $error);
		$this->session->set_userdata($error);

		if($this->session->userdata('email') == null)
			$this->load->view('home');
		else
			$this->load->view('user');
	}

	public function validar()
	{
		$fila = $this->usuario->validar();
		
		if($fila)
		{
			$data = array('email' => $fila->email, 'tipo' => $fila->tipo, 'nombre' => $fila->nombre,'apellidos' => $fila->apellidos, 'tarjeta' => $fila->tarjeta, 'nombreCompleto' => $fila->nombre.' '.$fila->apellidos);
			$this->session->set_userdata($data);

			if($this->session->userdata('tipo') == 'user')
				$this->load->view('user');
			else
				$this->load->view('admin2');
		}
		else
		{
			$error = 'Usuario invalido';
			$error = array('error' => $error);
			$this->session->set_userdata($error);

			$this->load->view('home');
		}
	}

	public function registrar()
	{
		$res = $this->usuario->insertar();
		
		if($res)
		{
			$error = 'Su cuenta a sido creada';
			$error = array('error' => $error);
			$this->session->set_userdata($error);

			$this->load->view('home');
		}
		else
		{
			$error = 'Datos invalidos';
			$error = array('error' => $error);
			$this->session->set_userdata($error);

			$this->load->view('home');
		}
	}

	public function cerrar()
	{
		$data = array('email' => '');
		$this->session->set_userdata($data);
		$this->load->view('home');
	}
}
