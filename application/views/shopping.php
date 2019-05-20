<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//vista
 include 'include/head.php';
?>


<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Hola!</h1>
  <p class="lead">Confirma la informacion antes de pagar</p>
</div>

<div class="container">
	<div class="card-deck mb-3 ">
	    <div class="card mb-4 shadow-sm">
			
			<div class="card-header">
			    <h4 class="my-0 font-weight-normal">Pagar</h4>
			</div>
	    	
		 	<div class="card-body">
		 		<div class="row">
		 			<div class="col-md-4">
		 				<h1 class="card-title pricing-card-title">20 <small class="text-muted">$</small></h1>
		        		<ul class="list-unstyled mt-3 mb-4">
		          			<li>Incluye 1 Usuarios</li>
		        		</ul>
		 			</div>

 		 			<div class="col-md-4 text-left" >

		 			</div>

		 			<div class="col-md-4" >
		 				<p class="text-right"> <span text-left>cantidad:</span>  55  </p>

		 				<div class="row border-top">
		 					<div class="col-6 text-left">
		 						<ul class="list-unstyled mt-3 mb-4">
		 							<li>cantidad:</li>
		 							<li>Total:</li>		 							
		 						</ul>
		 					
		 					</div>
		 					<div class="col-6 text-right">
		 						<ul class="list-unstyled mt-3 mb-4">
		 							<li>5</li>
		 							<li>511110</li>		 							
		 						</ul>		 					
		 					</div>
		 				</div>
		 				   <span class="text-right">  </span> 
		       			<button type="button" class="btn btn-lg btn-block btn-primary">Agregar</button>
		 			</div> 
		 		</div>
		 	</div>	

	    </div>
 	</div>
</div>

<?php
 include 'include/footer.php';
?>

