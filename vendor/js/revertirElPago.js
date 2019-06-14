
function AddProduct(id){
	shoppingCar.push(id);
	console.log(shoppingCar);
	document.getElementById("ShoppingCar").innerHTML = shoppingCar.length;
	addSession(id);
}


function reversePay(){
	var x = document.getElementById("reversePay");
	x = x.value;
	alert(x);

//  https://platzi.com/blog/que-es-y-como-funcionan-las-promesas-en-javascript/
//  https://es.stackoverflow.com/questions/118800/ejecutar-funci%C3%B3n-cuando-el-usuario-termina-de-escribir-en-lugar-de-onkeyup
//  https://desarrolloweb.com/articulos/fetch-ajax-javascript.html




	// data.append('items',shoppingCar );
	// fetch(url_peticion, {
	//    method: typo_peticion,
	//    body: data
	// })
	// .then(function(response) {
	//    if(response.ok) {
	//        return response.text()
	//    } else {
	//        throw "Error en la llamada Ajax";
	//    }

	// })
	// .then(function(texto) {
	//    console.log(texto);
	// })
	// .catch(function(err) {
	//    console.log(err);
	// });
}


