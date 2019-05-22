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
		 			<div class="col-md-5">


		 				<?php
		 					foreach ($items as $key => $value) {?>
		 						<h4 class="card-title border-top "><?php echo $value['Name'] ;?>
		 							<small class="text-muted"> 
		 								<?php echo $value['Includ'] ;?> 
		 							</small>
		 							<?php echo $value['Cost'] ;?>
		 						</h4>
		 				<?php		
		 					}
		 				?>
		 				
		 				
		        		
		 			</div>

 		 			<div class="col-md-2 text-left" ></div>

		 			<div class="col-md-5" >

		 				<div class="row border-top">
		 					<div class="col-6 text-left">
		 						<ul class="list-unstyled mt-3 mb-4">
		 							<li>cantidad:</li>
		 							<li>Total:</li>		 							
		 						</ul>
		 					
		 					</div>
		 					<div class="col-6 text-right">
		 						<ul class="list-unstyled mt-3 mb-4">
		 							<li><?php if($shopping>0){echo($shopping);}else{echo "0";} ?> </li>
		 							<li><?php  echo $total; ?></li>		 							
		 						</ul>		 					
		 					</div>
		 				</div>
		 				   <span class="text-right">  </span> 

		 				 <?php echo form_open('pay/tpaga'); ?>
		 				 <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
		 				 <input type="password" name="inputPassword" class="form-control" placeholder="Password" required="">		
		 				 <input type="password" name="inputPassword2" class="form-control" placeholder="Repetir Password" required="">		

		 				 <button type="submit" class="btn btn-lg btn-block btn-primary">Pagar</button>
		 				 <?php if (isset($mensaje)) {
		 				 			echo "<h3>".$mensaje."</h3>";
		 						}
		 				 ?>

		 				</form>
		 			

		 			</div> 
		 		</div>
		 	</div>	

	    </div>
 	</div>
</div>

<?php
 include 'include/footer.php';
?>

