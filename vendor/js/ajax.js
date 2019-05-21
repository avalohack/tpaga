var shoppingCar = []; //vectora para saver que ictens se quieren comprar
//funcion para añadir itens al car 
function AddProduct(id){
	shoppingCar.push(id);
	console.log(shoppingCar);

	document.getElementById("ShoppingCar").innerHTML = shoppingCar.length;
	alert(shoppingCar.length);
	
}




// expected output: Array ["pigs", "goats", "sheep", "cows", "chickens"]


// fetch("<?php echo base_url()index.php/", {
//     headers: {
//       accept: 'application/json'
//     }
//   })
//   .then(res => res.json())
//   .then(magazines => console.log(magazines))
//   .catch(err => console.log('Algo salió mal'));