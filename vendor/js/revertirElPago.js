
// function AddProduct(id){
// 	shoppingCar.push(id);
// 	console.log(shoppingCar);
// 	document.getElementById("ShoppingCar").innerHTML = shoppingCar.length;
// 	addSession(id);
// }

//  https://platzi.com/blog/que-es-y-como-funcionan-las-promesas-en-javascript/
//  https://es.stackoverflow.com/questions/118800/ejecutar-funci%C3%B3n-cuando-el-usuario-termina-de-escribir-en-lugar-de-onkeyup
//  https://desarrolloweb.com/articulos/fetch-ajax-javascript.html

function setReversePay(url){
	const typo_peticion ="POST";
	var miInit = { method: typo_peticion};
	fetch(url,miInit)
	.then(dataWrappedByPromise => dataWrappedByPromise.json())
	.then(data => {console.log(data)

		document.getElementById("mensaje").innerHTML=
		'<div class="alert alert-success alert-dismissable">'+
		  '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		  '<strong>¡'+data+'! </strong> pago retornado.'+
		'</div>'
	})
}

function reversePay(){
	var documento = document.getElementById("reversePay");
	var miInit = { method: typo_peticion,
             	   //headers: misCabeceras,
              	   //mode: 'cors',
                   //cache: 'default',
                   //body: data 
               	};

	fetch(url_peticion+documento.value,miInit)
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
					'<h4 class="card-title border-top " id="mensaje">'+'Valor Pagado: $' + data.cost + ' #factura: '+ data.order_id+
						'<small class="text-muted"> '+
							'<a href="#" onclick="setReversePay(\''+data.urlReversePay+'\')">Revertir el pago</a>'+
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





