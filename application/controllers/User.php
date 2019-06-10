<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent ::__construct();
		$this->load->helper("url");
		$this->load->helper("form");
        $this->load->library('session');

	}

	public function index()
	{
		$this->load->view('user');
	}

	public function login()
	{
		$this->load->view('login');
	}


	public function shopping()
	{
		// echo "<pre>";
		// 	print_r($this->session->userdata());
		// echo "</pre>";
		$shopping = $this->session->userdata('shopping');//obtenemos el string de la cantidad de items
		
		$countShopping= explode(',', $shopping[0]); //lo pasamos a un vetorpara contarlo
		
			if($countShopping[0]==""){
				$data['shopping'] = 0;
			}else{
				$data['shopping'] = count($countShopping);//contamos la cantidad de items 
			}

		//construimos la linea de consulta para recuperar los items y simpre mostra el valor desde backend
		foreach ( $countShopping as $key => $value) {
			$items[]= "(IdPlans = ".$value." )OR";
		}

		$item = substr(implode('', $items),0,-2);//quitamos las 2 ultimas letra para que my sql no falle
		
		$itemLen = strlen($item);
		if($itemLen == 13){
			$total= 0;
			$itemsAdd=0;
		}else{
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
		$this->load->view('shopping',$data);
	}
}
