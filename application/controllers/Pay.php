<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pay extends CI_Controller {

	public function __construct(){
		parent ::__construct();
		$this->load->helper('form');//funciones formlario FW
		$this->load->library('form_validation');//formatea los valores pasados de un formulario
		$this->load->model('user_model');
		$this->load->model('invoices_model');
	}

	public function tpaga(){

		$this->form_validation->set_rules('inputEmail', 'inputEmail', 'required|trim',array('required' => 'Campo %s Obligatorio '));
		
		
		if ($this->form_validation->run() == FALSE)
			{
				//vista
			}
		else
			{
				$clave = $this->input->post('inputPassword');
				$clave2 = $this->input->post('inputPassword2');
				
				if ($clave == $clave2) 
				{ 
					$coutnUser = count($this->user_model->getUser());
					if ($coutnUser <= 0){
						//si no existe
						$this->user_model->setUser()
						$data['mensaje'] = "Usuario creado con exito";				
					}
					else{
						echo "else".$coutnUser;
					}

					
					
					$agregar = $this->login_model->nuevo();
					//var_dump($agregar);
					

				}
				else
				{
					$data['mensaje'] = "clave no coincide";
				}
				
				//vista
				//
				//var_dump($agregar);

			}
		///data
				//$this->load->view('nuevo_vista',$data);
		
}
	


}