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
	$this->load->helper('api_tpaga_helper');
}
public function index(){
	redirect();
}


public function purchase(){
	$usuario = $this->user_model->getUserLogin();
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

		// echo "<pre>";
		// 	print_r($this->session->userdata());
		// echo "</pre>";
		//unset($this->session->userdata('shopping'));
		// echo "<pre>";
		// 	print_r($this->session->userdata());
		// echo "</pre>";/
		 //echo "hola mundo";
		 $data['url_pago'] = $result['tpaga_payment_url'];
		 $this->load->view('pay',$data);
		 $this->session->unset_userdata('shopping');
		//redirect($result['tpaga_payment_url']);
		////////////////////////////////////////////////////////////////	
	}//6f			
	//$this->load->view('shopping',$data);
}

public function prueba(){
	$data['url_pago'] = "hola";
		 $this->load->view('pay',$data);
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

/**
 * success nos permite saber si la 
 * compra fue satisfactoria para pasar el estado de la factura a pagada
 * @param type|null $invoice 
 */
public function success($invoice = null){
	if (!$invoice==null){
		$invoice = base64_decode($invoice);
		//echo $invoice;
		$result = $this->result_model->getResult($invoice);
		$result = json_decode($result[0]['result'],true);		
		// print_r($result['token']);
		$confirmPay = confirm_pay($result['token']);

		$result['token'] = 'paid'; //quitr esta linea-----

		if ($result['token'] == 'paid' or $result['token'] == 'delivered'){
			$this->invoices_model->setInvoicePay($invoice);
			$this->load->view('paySuccess');
		}else{
			redirect('user');
		}
		// echo"<pre>";
		// 	print_r($confirmPay['status']);
		// echo"</pre>";		
		// exit();
		// $this->invoices_model->setInvoicePay($invoice);
	}
	else{
		redirect();
	}

}


/**
 * factura dela compra con detalles
 * @param type|null $invoice 
 */
public function detail($invoice = null){
	if (!$invoice==null){
		echo base64_decode($invoice);
	}
	else{
		redirect();
	}
}
}//fin
