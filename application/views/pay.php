<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//vista
 include 'include/head.php';
?>
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
</div>

<div class="container">
	<div class="card-deck mb-3 ">
	    <div class="card mb-4 shadow-sm">			
			
			<div class="card-header">
			    <h4 class="my-0 font-weight-normal">Pagar</h4>
			</div>

	    	<div class="card-body">
		 		<div class="row">
		 			<div class="col-md-4"></div>
 		 			<div class="col-md-4 text-left" >
		 				 <a href="<?php  echo $url_pago ?>" class="btn btn-lg btn-block btn-primary">Pagar</a>
 		 			</div>
		 			<div class="col-md-4" ></div> 
		 		</div>
		 	</div>	

	    </div>
 	</div>
</div>

<?php
 include 'include/footer.php';
 include 'include/end.php';
?>

