<?php
class Home extends CI_Controller {

	public function index()
	{
		$error = '';
		$error = array('error' => $error);
		$this->session->set_userdata($error);

		$this->load->view('home');
	}
}
