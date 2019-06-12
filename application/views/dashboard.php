<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//vista
 include 'include/head.php';
?>


<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Hola!</h1>
  <!-- <p class="lead">planes contratados</p> -->
</div>

<div class="container">
	<div class="card-deck mb-3 ">
	    <div class="card mb-4 shadow-sm">
			
			<div class="card-header">
				
				<?php
				$Tipo = 99;
					if($Tipo == 99){
				 		echo 'Buscar factura'. $Tipo;

					}

				?>
			    <h4 class="my-0 font-weight-normal">Servicios adquiridos</h4>
			</div>
	    	
		 	<div class="card-body">

		 		<div class="row">
		 			<div class="col-md-12">
		 				<?php
		 				if(count($ServicesAcquired)==0){?>
		 						<h4 class="card-title border-top ">No
		 							<small class="text-muted"> 
		 								Has comprado ningun plan, si ya compraste un plan contacta con soporte 
		 							</small>
		 						</h4>
		 					<?php	
		 				}
		 				else{

		 				// 	echo "<pre>";
							// 	print_r($ServicesAcquired);
							// echo "</pre>";

		 					foreach ($ServicesAcquired as $key => $value) {?>
		 						<h4 class="card-title border-top ">factura #<?php echo $value['order_id'] ;?>
		 							<small class="text-muted">
		 								producto   <?php echo $value['IdPlans'] ;?>
		 								duraccion  <?php echo $value['Name'] ;?>
		 								Valor      <?php echo $value['Cost'] ;?>
		 								descripción<?php echo $value['Includ'] ;?>
									<a href=""> Detalles</a>
		 							</small>
		 						</h4>
		 					<?php		
		 					}				
		 				}
		 				?>		        		
		 			</div>
		 		</div>
		 	</div>	

	    </div>
 	</div>
</div>

<?php
 include 'include/footer.php';
 include 'include/jsOcultarCambios.php';
 include 'include/end.php';
?>

