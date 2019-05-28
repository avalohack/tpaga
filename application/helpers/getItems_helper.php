<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
// if ( ! function_exists('getRealIP')){
	
// 	function getItems($shopping){
// 		$countShopping= explode(',', $shopping['0']); //lo pasamos a un vetorpara contarlo
			
// 				if($countShopping[0]==""){
// 					$data['shopping'] = 0;
// 				}else{
// 					$data['shopping'] = count($countShopping);//contamos la cantidad de items 
// 				}
// 		//construimos la linea de consulta para recumerar los items y simpre mostra el valor desde backend
// 		foreach ( $countShopping as $key => $value) {
// 				$items[]= "(IdPlans = ".$value." )OR";
// 		}

// 		return $item = substr(implode('', $items),0,-2);//quitamos las 2 ultimas letra para que my sql no falle
// 	}
// 	function totalAndItems($item){
// 		$itemLen = strlen($item);
// 		if($itemLen == 13){
// 			$total= 0;
// 			$itemsAdd=0;
// 		}else{
// 			$total=0;
// 			foreach ($item as $key => $value) {
// 				if ($countShopping[$value['IdPlans']]) {

// 					$itemsAdd[]= array("cantidad"=>$countShopping[$value['IdPlans']],
// 									   "IdPlans"=>$value['IdPlans'],
// 									   "Name"=>$value['Name'],
// 									   "Cost"=>$value['Cost'],
// 									   "Includ"=>$value['Includ'],						   
// 									);
// 				}
// 				$total= $total+$value['Cost'];
// 			}	
// 		}
		
// 		$data['total']=$total;
// 		$data['items'] =$itemsAdd;
// 		return $data;
// 	}

// }
// else{
// 	return "tu helper esta mal revisa ";
// }

// 	$shopping = $this->session->userdata('shopping');//obtenemos el string de la cantidad de items


// 		$this->load->helper('getItems_helper');
// 		$item = getItems($shopping);

// 		$this->load->model('home_model');//modelo bd
// 		$item=$this->home_model->GetPlans_iten($item);//pasamos la linea de items para select

// 		$data  = totalAndItems($item);



		// echo "<pre>";
		// 		print_r($data);
		// echo "</pre>";