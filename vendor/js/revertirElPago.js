
// function AddProduct(id){
// 	shoppingCar.push(id);
// 	console.log(shoppingCar);
// 	document.getElementById("ShoppingCar").innerHTML = shoppingCar.length;
// 	addSession(id);
// }

//  https://platzi.com/blog/que-es-y-como-funcionan-las-promesas-en-javascript/
//  https://es.stackoverflow.com/questions/118800/ejecutar-funci%C3%B3n-cuando-el-usuario-termina-de-escribir-en-lugar-de-onkeyup
//  https://desarrolloweb.com/articulos/fetch-ajax-javascript.html



function reversePay(){
	var x = document.getElementById("reversePay");
	x = x.value;
	alert(x);

	var miInit = { method: typo_peticion,
             	   //headers: misCabeceras,
              	   //mode: 'cors',
                   //cache: 'default',
                   //body: data 
               	};

	fetch(url_peticion+x,miInit)
	.then(dataWrappedByPromise => dataWrappedByPromise.json())
	.then(data => {
    // you can access your data here

 document.getElementById("resultado").innerHTML=
 '<div class="card-deck mb-3 ">'+
	'<div class="card mb-3 shadow-sm">'+
		'<div class="card-header">'+
			'<h4 class="my-0 font-weight-normal">Resultados</h4>'+
		'</div>'+
		'<div class="card-body">'+
			'<div class="row">'+
			 	'<div class="col-md-12">'+
					'<h4 class="card-title border-top ">'+'Valor Pagado: $' + data.cost + ' #factura: '+ data.order_id+
						'<small class="text-muted"> '+
							'<a href="'+"<?php echo base_url();?>"+'invoices/setReversePay/">Revertir el pago</a>'+
						'</small>'+
					'</h4>'+
			 	'</div>'+
			'</div>'+
		'</div>'+
	'</div>'+
'</div>' 
			console.log(data.cost)
			console.log(data.idempotency_token)
			console.log(data.order_id)
			console.log(data.expires_at)
			console.log(data.IdUser)
			console.log(data.Timestamp)
			console.log(data.pay)

	

/// cost
// idempotency_token
// order_id
// expires_at
// IdUser
// Timestamp
// pay


    //console.log(data)
	})
	// .then(function(response){
	//    	if(response.ok) {
	//       	var data = response.text()
	// 		console.log(data);
	//   	} else {
	//        throw "Error en la llamada ";
	//    	}
	// })


}





