<?php
//API URL
$url = 'https://stag.wallet.tpaga.co/merchants/api/v1/payment_requests/create';

//create a new cURL resource
$ch = curl_init($url);

//setup request to send json via POST
		// $data = array(
		//     'username' => 'codexworld',
		//     'password' => '123456'
		// );

		// $payload = json_encode(array("user" => $data));
// $data = array(
// 		'UsuarioDian' 		=>  array('prueba' => 'prueba',
// 									  'prueba2' => 'prueba',
// 									  'prueba3' => 'prueba',
// 								),

// 		'InfoResolucion'	=>  array('prueba' => 'prueba',
// 									  'prueba2' => 'prueba',
// 									  'prueba3' => 'prueba',
// 								),

// 		'EncavesadoFactura' =>  array('prueba' => 'prueba',
// 									  'prueba2' => 'prueba',
// 									  'prueba3' => 'prueba',
// 								),

// 		'DetalleFactura' 	=>  array('prueba' => 'prueba',
// 									  'prueba2' => 'prueba',
// 									  'prueba3' => 'prueba',
// 								),

// );

$payload ='{
	"cost":"12000",
	"purchase_details_url":"https://example.com/compra/348820",
	"voucher_url":"https://example.com/comprobante/348820",
	"idempotency_token":"ea0c7avalo-e85a-48c4-b7f9-24a9014a2339",
	"order_id":"348820",
	"terminal_id":"sede_45",
	"purchase_description":"Compra en Tienda X",
	"purchase_items":[
	    {
	        "name":"Aceite de girasol",
	        "value":"13.390"
	    }

	],
	"user_ip_address":"61.1.224.56",
	"expires_at":"2019-05-15T20:10:57.549653+00:00"
	}';
// $payload = json_encode($data);
// var_dump($payload);
// exit();


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

echo "<pre>";
	var_dump($result);
echo "</pre>";

?>