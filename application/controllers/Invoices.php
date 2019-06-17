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

				$url = base_url()."invoices/getReversePay/".$invoiceResult[0]['order_id'];
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
			$invoiceResult =  $this->invoices_model->getInvoices($invoice);
			if (count($invoiceResult) < 1) {
				echo json_encode("null");
			}else{
				echo json_encode($invoiceResult[0]);
			}
			
		}else{
			redirect();			
		}
	}




	public function index()
	{
		redirect();	}

}
