<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent ::__construct();
		$this->load->helper("url_helper");
	}

	public function index()
	{
		$this->load->view('user');
	}
	public function shopping()
	{
		$shopping = $this->session->userdata('shopping');//obtenemos el string de la cantidad de items
		$countShopping= explode(',', $shopping['0']); //lo pasamos a un vetorpara contarlo
		$data['shopping'] = array_count_values($countShopping);//contamos la cantidad de items 


echo"<pre>";
	print_r($countShopping);
echo"<pre>";


print_r($data['shopping']);
		//construimos la linea de consulta para recumerar los items y simpre mostra el valor desde backend
		foreach ( $countShopping as $key => $value) {
			$items[]= "(IdPlans = ".$value." )OR";
		}

		$item = substr(implode('', $items),0,-2);//quitamos las 2 ultimas letra para que my sql no falle
		$this->load->model('home_model');//modelo bd
		$items=$this->home_model->GetPlans_iten($item);//pasamos la linea de items para select


foreach ($items as $key => $value) {
	if ($countShopping[$value['IdPlans']]) {

		$itemsAdd[]= array("cantidad"=>$countShopping[$value['IdPlans']],
						   "IdPlans"=>$value['IdPlans'],
						   "Name"=>$value['Name'],
						   "Cost"=>$value['Cost'],
						   "Includ"=>$value['Includ'],
						);
	}

}
	// echo $value['IdPlans'];
		echo"<pre>";
			print_r($itemsAdd);
		echo"<pre>";
	

exit();

		echo"<pre>";
			print_r($data['countShopping']);
		echo"<pre>";


		
exit();
		$data['items'] ='';
		$this->load->view('shopping',$data);
	}
}
