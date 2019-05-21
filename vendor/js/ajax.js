var shoppingCar = []; //vectora para saver que ictens se quieren comprar
const data = new FormData();
ruta = "index.php/home/addSession/";

//funcion para añadir itens al car 
function AddProduct(id){
	shoppingCar.push(id);
	console.log(shoppingCar);
	document.getElementById("ShoppingCar").innerHTML = shoppingCar.length;
	addSession(id);
}

function addSession(id){
	data.append('items',shoppingCar );
	fetch(ruta, {
	   method: 'POST',
	   body: data
	})
	.then(function(response) {
	   if(response.ok) {
	       return response.text()
	   } else {
	       throw "Error en la llamada Ajax";
	   }

	})
	.then(function(texto) {
	   console.log(texto);
	})
	.catch(function(err) {
	   console.log(err);
	});
}


