<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 include 'include/head.php';
?>
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Hola!</h1>
  <p class="lead">Servicio de wifi por todo el mundo, contrata un plan y podra usarlo en todo el mundo</p>
</div>

<div class="container">
  <div class="card-deck mb-3 text-center">


      <div class="card mb-4 shadow-sm">      
          <div class="card-header">
          </div>
          <div class="card-body">
            <ul class="list-unstyled mt-3 mb-4">
            </ul>
            <a class="btn btn-lg btn-block btn-primary" href='<?php echo base_url()?>index.php/home'>Planes</a>
          </div>
      </div>

    
  </div>
</div>


<?php
//scrip de peticion ajax

 include 'include/bootstrap.php';
 include 'include/footer.php';
 include 'include/end.php';
?>