<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices extends CI_Controller {

	public function __construct(){
		parent ::__construct();
		// load url helper
        $this->load->helper('url');
		// load Session Library
        $this->load->library('session');
       	$this->load->model('invoices_model');
	}


	public function getReversePay($invoice=null){
		$usuario = $this->session->userdata('Usuario');

		if($invoice <> null && $usuario['Tipo']==99){
			$invoiceResult =  $this->invoices_model->getInvoices($invoice);
			if (count($invoiceResult) < 1) {
				echo json_encode("null");
			}else{

				$url = base_url()."invoices/setReversePay/".$invoiceResult[0]['order_id'];
				$url = array('urlReversePay' => $url );
				$vector = $invoiceResult[0]+$url;
				// echo "<pre>";
				// 	print_r($vector);
				// echo "</pre>";

				echo json_encode($vector);
			}
			
		}else{
			echo json_encode("null");			
		}
	}

	public function setReversePay($invoice=null){
		$usuario = $this->session->userdata('Usuario');

		if($invoice <> null && $usuario['Tipo']==99){
			$this->load->model('result_model');
			$result = $this->result_model->getResult($invoice);
			$result = json_decode($result[0]['result'],true);

			$payload ='{"payment_request_token":"'.$result['token'].'"}';
					
			$this->load->helper('api_tpaga_helper');
			$result = reverse_pay($payload);

			if(isset($result['error_code'])){
				$error = array('error_code' => $result['error_code']);
				echo json_encode($error);
				exit();
			}else{
				$this->invoices_model->setReversePay($invoice,$usuario['IdUser']);
				$reversePay = array('order_id' => $invoice,
									'result'   => json_encode($result),
									'idAdmin'  =>['IdUser']);
				$this->load->model('reversepay_model');
				$this->reversepay_model->setReversePay($reversePay);
				echo json_encode('ok');
				exit();
			}			
		}else{
			redirect();			
		}
	}




	public function index()
	{
		redirect();	}

}
