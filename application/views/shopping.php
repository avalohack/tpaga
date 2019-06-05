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
		 				if($items==0){?>
		 						<h4 class="card-title border-top ">No
		 							<small class="text-muted"> 
		 								Has agregado nada al carro
		 							</small>
		 						</h4>
		 					<?php	
		 				}
		 				else{

		 					foreach ($items as $key => $value) {?>
		 						<h4 class="card-title border-top "><?php echo $value['Name'] ;?>
		 							<small class="text-muted"> 
		 								<?php echo $value['Includ'] ;?> 
		 							<?php echo "Costo $".$value['Cost'] ;?>
		 							</small> 
		 						</h4>
		 					<?php		
		 					}				
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

		 				<?php 
		 				$attributes = array('name' =>'formUser');
		 				echo form_open('pay/tpaga',$attributes); ?>
		 				<input type="email" name="inputEmail" class="form-control" placeholder="Email o Usuario" required="" autofocus="">
		 				<input type="password" name="inputPassword" class="form-control" placeholder="Clave" required="">	
						<!-- oculto estos capos solo son para registse  -->
						

						<br>
						<div class="custom-control custom-checkbox">
						    <input type="checkbox" class="custom-control-input" onclick="userNew()" name="registered" id="defaultUnchecked">
					    	<label class="custom-control-label" for="defaultUnchecked">Sino estas registrado</label>
						</div>
						<br>

						<div id="hide" style="display:none" >
		 				 	<input type="password" name="inputPassword2" class="form-control" placeholder="Repetir Clave"	 id="inputPassword2">		
							<input type="text"     name="inputNickname"  class="form-control" placeholder="Nombre de usuario"id="inputNickname">
							<input type="number"   name="inputPhone" 	 class="form-control" placeholder="Telefono" 		 id="inputPhone">

						</div>	

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
 include 'include/jsOcultarCambios.php';
 include 'include/end.php';
?>

