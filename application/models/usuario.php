<?php

class usuario extends CI_Model
{
	function __construct()
	{
		return $this->db->get('usuario');
	}
	public function validar()
	{
		$email = $this->input->post('email');
		$pass = $this->input->post('pass');

		$result= $this->db->query("select * from usuario where email = '" .$email. "' and pass = '" .$pass."'");
		return $result->row();
	}

	public function insertar()
	{
		$pass = $this->input->post('pass');
		$pass2 = $this->input->post('pass2');
		
		if($pass == $pass2)
		{
			$datos = array (
			'email' => $this->input->post('email'),
			'nombre' => $this->input->post('nombre'),
			'apellidos' => $this->input->post('apellidos'),
			'tipo' => 'user',
			'pass' => $pass
			);

			$result = $this->db->insert("usuario", $datos);
			if($result > 0)
				return true;
			else
				return false;
		}
		else
			return false;
	}
	public function modificar()
	{
		$actual = $this->session->userdata('email');
		$pass_mod = $this->input->post('pass_mod');
		$pass_mod2 = $this->input->post('pass_mod2');

		if($pass_mod == $pass_mod2)
		{
			$data = array(
	           'nombre' => $this->input->post('nombre_mod'),
	           'apellidos' => $this->input->post('apellidos_mod'),	
	           'pass' => $pass_mod,	
	           'tarjeta' => $this->input->post('tarjeta_mod')	        
		        );
			$this->db->where('email', $actual);
			$this->db->update('usuario', $data); 
			return true;
		}
		else
		{
			return false;
		}
	}
}