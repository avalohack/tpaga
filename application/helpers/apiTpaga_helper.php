<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ( ! function_exists('getRealIP')){

	function create($payload){
		//API URL
		$url = 'https://stag.wallet.tpaga.co/merchants/api/v1/payment_requests/create';
		//create a new cURL resource
		$ch = curl_init($url);
		$payload = json_encode($payload);
		//attach encoded JSON string to the POST fields
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		//set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, 
						 array( 'Authorization:Basic bWluaWFwcC1nYXRvMjptaW5pYXBwbWEtMTIz',
						 		'Cache-Control:no-cache',
								'Content-Type:application/json'));
		//return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//execute the POST request
		$result = curl_exec($ch);
		//close cURL resource
		curl_close($ch);
		$result = json_decode($result, true);
		return $result;
	}

}	
else{
	return "tu helper esta mal revisa ";
}