<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 include 'include/head.php';
?>
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Tu compra fue exitosa. Muchas gracias!</h1>
  <p class="lead">Informacion de tu servicios y factura  
    <a class="p-2 text-dark" href="<?php echo base_url().'index.php/user/login'?>">>> login</a></p>
</div>

<!-- <div class="container">
  <div class="card-deck mb-3 text-center"> -->


<!-- <?php
     // foreach ($GetPlans as $key => $value) {        
?> <div class="card mb-4 shadow-sm">      
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">ddd<?php //echo $value['Name'] ?></h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">dd<?php //echo $value['Cost'] ?> <small class="text-muted">$</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>ddd<?php //echo $value['Includ'] ?></li>
            </ul>
            <button onclick="AddProduct(<?php //echo  $value['IdPlans']; ?>)" type="button" class="btn btn-lg btn-block btn-primary">Agregar</button>
          </div>
      </div>

       <div class="card mb-4 shadow-sm">      
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">ddd<?php //echo $value['Name'] ?></h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">dd<?php //echo $value['Cost'] ?> <small class="text-muted">$</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>ddd<?php //echo $value['Includ'] ?></li>
            </ul>
            <button onclick="AddProduct(<?php //echo  $value['IdPlans']; ?>)" type="button" class="btn btn-lg btn-block btn-primary">Agregar</button>
          </div>
      </div>

      <div class="card mb-4 shadow-sm">      
          <div class="card-header">
            <h4 class="my-0 font-weight-normal">ddd<?php //echo $value['Name'] ?></h4>
          </div>
          <div class="card-body">
            <h1 class="card-title pricing-card-title">dd<?php //echo $value['Cost'] ?> <small class="text-muted">$</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>ddd<?php //echo $value['Includ'] ?></li>
            </ul>
            <button onclick="AddProduct(<?php //echo  $value['IdPlans']; ?>)" type="button" class="btn btn-lg btn-block btn-primary">Agregar</button>
          </div>
      </div>

<?php
     // }
?> -->
    
<!--   </div>
</div> -->


<?php
//scrip de peticion ajax
 include 'include/footer.php';
 // include 'include/ajax.php';
 include 'include/end.php';
?>