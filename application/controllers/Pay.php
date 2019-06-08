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

public function purchase(){
	$usuario = $this->user_model->getUserLogin();

	echo"<pre>";
			print_r($usuario);
	echo"</pre>";


	$coutnUser 	 = count($usuario);
	if ($coutnUser <= 0){//5
		$data = $this->itemsAndTotal();
		$data['mensaje'] = "hola! algo esta mal Email/Usuario o clave";
		$this->load->view('shopping',$data);
	}//5f
	else{//6
		$data = $this->itemsAndTotal();	
		$total 	  = $data['total'];
		$itemsAdd = $data['items'];
		//obtener numero de factura existente + 1 para el nuevo documento
		$numMax = $this->invoices_model->getNumMax();
		if(count($numMax)== 0){//14
			$numMax[0]['order_id'] = 0;
		}//14f
		$numMax = base64_encode($numMax[0]['order_id']+1);
		//vetor para tepaga
		date_default_timezone_set('America/Bogota');
		$tpaga = array(	
			'cost' 				   =>$total,
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
		foreach ($itemsAdd as $key){//15
			//guardar items factura
			$insert = array('order_id'=>base64_decode($numMax),
							'IdPlans'=> $key['IdPlans'], 
							'Name' 	 => $key['Name'], 
							'Cost' 	 => $key['Cost'], 
							'Includ' => $key['Includ'], );
			$this->invoices_model->setInvoicesDetail($insert);
			//agregamos elementos vector tepaga 
			$itemsArray = $key;
			array_push($tpaga['purchase_items'] , $itemsArray);
		}//15f		
		//peticion api tpaga
		$this->load->helper('api_tpaga_helper');
		$result = create_tpaga($tpaga);
		// echo"<pre>";
		// 	print_r($result);
		// echo"</pre>";
		// exit();
		$jsonResult = json_encode($result);
		// exit();
		//guardar respuesta
		$dd=$this->result_model->setResult(
					base64_decode($numMax),
					$usuario[0]['IdUser'],
					$jsonResult
				 );
		// echo"<pre>";
		// 	print_r($dd);
		// echo"</pre>";
		// //redirigir para pago
		// echo "---------->".$result['tpaga_payment_url'];
		// echo "seras redirigidoa billetera";

		
		//retiramos los productos de la session para permitir nuevas compras 
		

		echo "<pre>";
			print_r($this->session->userdata());
		echo "</pre>";
		//unset($this->session->userdata('shopping'));

		 $this->session->unset_userdata('shopping');

		echo "<pre>";
			print_r($this->session->userdata());
		echo "</pre>";



		exit();
		redirect($result['tpaga_payment_url']);
		////////////////////////////////////////////////////////////////	
	}//6f			
	//$this->load->view('shopping',$data);
}

public function itemsAndTotal(){
	$shopping = $this->session->userdata('shopping');//obtenemos el string de la cantidad de items
	$countShopping= explode(',', $shopping['0']); //lo pasamos a un vetorpara contarlo
	if($countShopping[0]==""){//7
		$data['shopping'] = 0;
	}//7f
	else{//8
		$data['shopping'] = count($countShopping);//contamos la cantidad de items 
	}//8f
	//construimos la linea de consulta para recumerar los items y simpre mostra el valor desde backend
	foreach ( $countShopping as $key => $value) {//9
		$items[]= "(IdPlans = ".$value." )OR";
	}//9f
	$item = substr(implode('', $items),0,-2);//quitamos las 2 ultimas letra para que my sql no falle
	$itemLen = strlen($item );
	if($itemLen == 13){//10
		$total= 0;
		$itemsAdd=0;
	}//10f
	else{//11f
		$this->load->model('home_model');//modelo bd
		$items=$this->home_model->GetPlans_iten($item);//pasamos la linea de items para select
		$total=0;
		foreach ($items as $iOrderd) {
			$itemsOrdered[$iOrderd['IdPlans']] = array('IdPlans'=>$iOrderd['IdPlans'] ,
													   'Name'   =>$iOrderd['Name'], 
													   'Cost'   =>$iOrderd['Cost'], 
													   'Includ' =>$iOrderd['Includ']
											);
		}
		foreach ($countShopping as $iTAdd => $valueAdd) {
					$itemsAdd[] = $itemsOrdered[$valueAdd];
					$total		= $total+$itemsOrdered[$valueAdd]['Cost'];

		}
	
	}
	$data['total']=$total;
	$data['items'] =$itemsAdd;
	return $data;
}

public function tpaga(){
	$this->form_validation->set_rules('inputEmail', 'inputEmail', 'required|trim',array('required' => 'Campo %s Obligatorio '));
	if ($this->form_validation->run() == FALSE){//vista
	}
	else{//1
		$clave  = $this->input->post('inputPassword');
		$clave2 = $this->input->post('inputPassword2');		
		if ($clave == $clave2){//2
			$coutnUser = count($this->user_model->getUser());
			if ($coutnUser <= 0){//3
					$this->user_model->setUser();
					//$data['mensaje'] = "Usuario creado con exito";	
					$this->purchase();			
			}//3f
		}//2f
		else{//4
			$this->purchase();
		}//4f
	}//1f
}
//exito en la compra
public function success($invoice = null){
	if ($invoice=null) {
		echo"Contacta con administrador";
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

















////////////////////////
////////////////////////
////////////////////////
/////////////////////
/////////////////////////
//////////////////////////
// Array
// (
//     [miniapp_user_token] => 
//     [cost] => 3.0
//     [purchase_details_url] => https://192.168.1.79/tpaga/pay/success/Ng==
//     [voucher_url] => https://192.168.1.79/tpaga/pay/detail/Ng==
//     [idempotency_token] => Ng==-3-
//     [order_id] => 6
//     [terminal_id] => https://192.168.1.79/tpaga/
//     [purchase_description] => compar wifi Company servicios
//     [purchase_items] => Array
//         (
//             [0] => Array
//                 (
//                     [cantidad] => 1
//                     [IdPlans] => 1
//                     [Name] => Semanal
//                     [Cost] => 1
//                     [Includ] => Incluye Uno (1) Usuarios
//                 )

//             [1] => Array
//                 (
//                     [cantidad] => 2
//                     [IdPlans] => 2
//                     [Name] => Mensual
//                     [Cost] => 2
//                     [Includ] => Incluye Uno (2) Usuarios
//                 )

//         )

//     [user_ip_address] => 192.168.1.79
//     [merchant_user_id] => 
//     [token] => pr-1d4eeb13152c4c4bbed83477c62ac1e15b1a986f766767bb64b3ea37a73843ea67dfcc05
//     [tpaga_payment_url] => https://w.tpaga.co/eyJtIjp7Im8iOiJQUiJ9LCJkIjp7InMiOiJtZWRpY2FwcCIsInBydCI6InByLTFkNGVlYjEzMTUyYzRjNGJiZWQ4MzQ3N2M2MmFjMWUxNWIxYTk4NmY3NjY3NjdiYjY0YjNlYTM3YTczODQzZWE2N2RmY2MwNSJ9fQ==
//     [status] => created
//     [expires_at] => 2019-06-01T17:02:39.000-05:00
//     [cancelled_at] => 
//     [checked_by_merchant_at] => 
//     [delivery_notification_at] => 
// )