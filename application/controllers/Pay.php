<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pay extends CI_Controller {

	public function __construct(){
		parent ::__construct();
		$this->load->helper('url');
		$this->load->helper('form');//funciones formlario FW
		$this->load->library('form_validation');//formatea los valores pasados de un formulario
		$this->load->model('user_model');
		//$this->load->model('invoices_model');
	}

	public function tpaga(){

		$this->form_validation->set_rules('inputEmail', 'inputEmail', 'required|trim',array('required' => 'Campo %s Obligatorio '));
		if ($this->form_validation->run() == FALSE)
			{
				//vista
			}
		else
			{
				$clave  = $this->input->post('inputPassword');
				$clave2 = $this->input->post('inputPassword2');		
					if ($clave == $clave2){ 
						$coutnUser = count($this->user_model->getUser());
							if ($coutnUser <= 0){
								$this->user_model->setUser();
								$data['mensaje'] = "Usuario creado con exito";				
							}
					}
					else{
						$data['mensaje'] = "La clave debe ser igual";
						$this->load->view('shopping',$data);
						exit();
					}

			}



$tpaga = array(	'cost' => '12000',
			    'purchase_details_url' => 'https://example.com/compra/348820',
			    'voucher_url' => 'https://example.com/comprobante/348820',
			    'idempotency_token' => 'ea0c7avalo-e85a-48c4-b7f9-24a9014a2339',
			    'order_id' => '348820',//numero_factura
			    'terminal_id' => 'sede_45',
			    'purchase_description' => 'Compra en Tienda X',
			    'purchase_items' => Array(
								            '0' => Array(
								                    'name' => 'Aceite de girasol',
								                    'value' => '13.390',
								                ),
			        					),
			    'user_ip_address' => '61.1.224.56',
			    'expires_at' => '2019-05-15T20:10:57.549653+00:00',
		);

echo "<pre>";
	print_r($tpaga);
echo "</pre>";


exit();

		//login
		$usuario = $this->user_model->getUserLogin();

		echo"<pre>";
			print_r($usuario);
		echo"</pre>";

		echo "<br> count ".count($usuario)."<br>";

		$user_session = array(
				     'session_id'    => $cookie=1,
				     'ip_address'    => $GLOBALS['_SERVER']['REMOTE_ADDR'],
				     'user_agent'    => $GLOBALS['_SERVER']['HTTP_USER_AGENT'],
				     'last_activity' => '88888845',
			);	
			$this->session->set_userdata($user_session);

		echo"<pre>";
			print_r($this->session->userdata());
		echo"</pre>";


				//$data['mensaje'] = "iniciar session";
				//peticion de pago
				//echo $data['mensaje'];
				//$this->load->view('shopping',$data);
	}
	


}