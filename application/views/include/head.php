<!DOCTYPE html>
<html lang="es"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="tienda de productos inventados">
    <meta name="author" content="alejandro villegas">
    <title>Tpaga</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()?>vendor/bootstrap-4.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>vendor/css/css.css" rel="stylesheet"  type="text/css">
</head>
<body>
 <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal"><a href="<?php echo base_url().'index.php/home'?>"> wifi Company</a></h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="<?php echo base_url().'index.php/home'?>">home</a>
    <a class="p-2 text-dark" href="#">Contacto</a>
    <a class="p-2 text-dark" href="<?php echo base_url().'index.php/user/login'?>">login</a>
  </nav>
  <a class="btn btn-outline-primary" href="<?php echo base_url().'index.php/user/shopping/'?>">Pagar 
        <span id="ShoppingCar">
        <?php 
          if (isset($shopping)) {


            if($shopping>0){
              print_r($shopping);
          } 
          }
          
        ?> 
        </span>
  </a>
</div>	
   


