<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pay extends CI_Controller {

	public function __construct(){
		parent ::__construct();
		$this->load->helper('url');
		$this->load->helper('form');//funciones formlario FW
		$this->load->library('form_validation');//formatea los valores pasados de un formulario
		$this->load->model('user_model');
		$this->load->model('invoices_model');
		$this->load->model('result_model');

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
				else{//9
					$usuario = $this->user_model->getUserLogin();
					$coutnUser 	 = count($usuario);
					if ($coutnUser <= 0){
						$data['mensaje'] = "hola! algo esta mal usuario/correo o clave";
					}
					else{//8
/////////////////////////////////////////////////////////////////////////////////////					
						$shopping = $this->session->userdata('shopping');//obtenemos el string de la cantidad de items
						$countShopping= explode(',', $shopping['0']); //lo pasamos a un vetorpara contarlo
						if($countShopping[0]==""){
							$data['shopping'] = 0;
						}else{
							$data['shopping'] = count($countShopping);//contamos la cantidad de items 
						}
						//construimos la linea de consulta para recumerar los items y simpre mostra el valor desde backend
						foreach ( $countShopping as $key => $value) {
								$items[]= "(IdPlans = ".$value." )OR";
						}
						$item = substr(implode('', $items),0,-2);//quitamos las 2 ultimas letra para que my sql no falle
						$itemLen = strlen($item );
						if($itemLen == 13){
							$total= 0;
							$itemsAdd=0;
						}else{
							$this->load->model('home_model');//modelo bd
							$items=$this->home_model->GetPlans_iten($item);//pasamos la linea de items para select
							$total=0;
							foreach ($items as $key => $value){
								if ($countShopping[$value['IdPlans']]){
									$itemsAdd[]= array("cantidad"=>$countShopping[$value['IdPlans']],
													   "IdPlans"=>$value['IdPlans'],
														"Name"=>$value['Name'],
														"Cost"=>$value['Cost'],
														"Includ"=>$value['Includ'],						   
												);
									}
								$total= $total+$value['Cost'];
							}	
						}
						//obtener numero de factura existente + 1 para el nuevo documento
						$numMax = $this->invoices_model->getNumMax();
						if(count($numMax)== 0){
							$numMax[0]['order_id'] = 0;
						}
						$numMax = base64_encode($numMax[0]['order_id']+1);
						//vetor para tepaga
						date_default_timezone_set('America/Bogota');
						$tpaga = array(	'cost' 				   =>$total,
									    'purchase_details_url' =>base_url('pay/success/').$numMax,
									    'voucher_url' 		   =>base_url('pay/detail/').$numMax,
									    'idempotency_token'    =>$numMax.'-'.$total.'-',
									    'order_id'             =>base64_decode($numMax),//numero_factura
									    'terminal_id'          =>base_url(),
									    'purchase_description' =>'compar wifi Company servicios',
									    'purchase_items' 	   => [],
									    'user_ip_address'      => $GLOBALS['_SERVER']['REMOTE_ADDR'],
									    'expires_at'           => date('Y-m-d\TH:i:s.v', time()+(3600*24))."-05:00",
						);
						//guardarfactura
						$this->invoices_model->setInvoices($tpaga,$usuario[0]['IdUser']);
						//seagregan los ites de la factura 
						foreach ($itemsAdd as $key){
							//guardar items factura
							$insert = array('order_id'=>base64_decode($numMax),
											'IdPlans'=> $key['IdPlans'], 
											'Name' 	 => $key['Name'], 
											'Cost' 	 => $key['Cost'], 
											'Includ' => $key['Includ'], );
							$this->invoices_model->setInvoicesDetail($insert);
							//agregamos elementos vector tepaga 
							$itemsArray =$key;
							array_push($tpaga['purchase_items'] , $itemsArray);
						}		
							
/////////////////////////////////////////////////////////////////////////////////////
					////////////////////////////////////////////////////////////////
					//peticion api tpaga
					$this->load->helper('apiTpaga_helper');
					$result = create($tpaga);	

					//guardar respuesta
					$this->result_model->setResult(
								base64_decode($numMax),
								$usuario[0]['IdUser'],
								$result['tpaga_payment_url']
							 );

					//redirigir para pago
					redirect("'".$result['tpaga_payment_url']."'");
					////////////////////////////////////////////////////////////////	
					}//8
						//$this->load->view('shopping',$data);
				}//9
		}

	}
//exito en la compra
	public function success($invoice = null){
		if ($invoice=null) {
		}else{
			echo base64_decode($invoice);
		}
	}

//factura dela compra con detalles
	public function detail($invoice = null){
		if ($invoice=null) {
		}else{
			echo base64_decode($invoice);
		}
	}
	


}

// print_r($data);
// print_r($usuario);
// print_r($tpaga);
// echo date('Y-m-d\TH:i:s.v',  time())."-05:00";
// echo "<br>";
// echo "mas 23 horas <br>";
// echo date('Y-m-d\TH:i:s.v',  time()+(3600*24))."-05:00";
// $Hora = Time(); // Hora actual   
// print_r($Hora);
// echo "<br>";
// echo date('H:i:s:u a',$Hora)."";      
//  echo "<br>";
// $Hora = Time() + (60 *60 * 12);   
// echo date('H:i:s:u a',$Hora); // + 12 horas
// exit();

// login
// $usuario = $this->user_model->getUserLogin();

// 		echo"<pre>";
// 			print_r($usuario);
// 		echo"</pre>";

// 		echo "<br> count ".count($usuario)."<br>";

// 		$user_session = array(
// 				     'session_id'    => $cookie=1,
// 				     'ip_address'    => $GLOBALS['_SERVER']['REMOTE_ADDR'],
// 				     'user_agent'    => $GLOBALS['_SERVER']['HTTP_USER_AGENT'],
// 				     'last_activity' => '88888845',
// 			);	
// 			$this->session->set_userdata($user_session);

// 		echo"<pre>";
// 			print_r($this->session->userdata());
// 		echo"</pre>";


				//$data['mensaje'] = "iniciar session";
				//peticion de pago
				//echo $data['mensaje'];
				//$this->load->view('shopping',$data);