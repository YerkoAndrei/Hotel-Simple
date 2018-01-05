<?php
class Pago_c extends CI_Controller {

	public function index()
	{
		if($data == null)
			$this->load->view('home');
	}
	public function pagar()
	{
		$accion = $this->input->post('accion');

		if($accion == 'pagar')
		{
			$res = $this->pago->pagar();
			if($res)
			{
				$error = 'Pago realizado con exito';
				$error = array('error' => $error);
				$this->session->set_userdata($error);

				$this->load->view('user');
			}
			else
			{
				$error = 'Error en pago';
				$error = array('error' => $error);
				$this->session->set_userdata($error);

				$this->load->view('user');
			}
		}
		else if ($accion == 'cancelar')
		{
			$res = $this->pago->cancelar();
			if($res)
			{
				$error = 'Cancelado con exito';
				$error = array('error' => $error);
				$this->session->set_userdata($error);

				$this->load->view('user');
			}
			else
			{
				$error = 'Error en cancelación';
				$error = array('error' => $error);
				$this->session->set_userdata($error);

				$this->load->view('user');
			}
		}
	}
}