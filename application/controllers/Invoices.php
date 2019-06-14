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


	public function reversePay($invoice=null){
		$usuario = $this->session->userdata('Usuario');
		if(($invoice <> null) and ($usuario['Tipo']==99)){
			$invoiceResult =  $this->invoices_model->getInvoices($invoice);
			echo json_encode($invoiceResult[0]);
		}else{
			echo json_encode("null");			
		}
	}



	public function index()
	{
		redirect();	}

}
