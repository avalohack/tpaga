<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 include 'include/head.php';
?>
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">wi-fi</h1>
  <p class="lead">Servicio de wifi por todo el mundo, contrata un plan y podra usarlo en todo el mundo mas info<a href="#">Aqui</a></p>
</div>

<div class="container">
  <div class="card-deck mb-3 text-center">


<?php
      foreach ($GetPlans as $key => $value) {
        // echo "<pre>";
        //   print_r($value['IdPlans']);
        //   echo "<br>";
        //   print_r($value['Name']);
        //   echo "<br>";
        //   print_r($value['Cost']);
        //   echo "<br>";
        //   print_r($value['Includ']);
        // echo "</pre>";
?>
 <div class="card mb-4 shadow-sm">      
      <div class="card-header">
        <h4 class="my-0 font-weight-normal"><?php echo $value['Name'] ?></h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title"><?php echo $value['Cost'] ?> <small class="text-muted">$</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>Incluye <?php echo $value['Includ'] ?> Usuarios</li>
        </ul>
        <button type="button" class="btn btn-lg btn-block btn-primary">Agregar</button>
      </div>
    </div>

<?php
      }
?>
    
  </div>
</div>
<?php
 include 'include/footer.php';
?>