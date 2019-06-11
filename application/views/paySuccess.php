<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 include 'include/head.php';
?>
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">Tu compra fue exitosa. Muchas gracias!</h1>
  
    <!-- <a class="p-2 text-dark" href="<?php echo base_url().'index.php/user/login'?>">>> login</a> -->
    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><p class="lead">Informacion de tu servicios y factura</p></button>
</div>


<div class="container">
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>        
        <!-- Modal body -->
        <div class="modal-body">  

          <?php $attributes = array('name' =>'formUser');
            echo form_open('user/login',$attributes); 
          ?>
            <input type="email" name="inputEmail" class="form-control" placeholder="Email o Usuario" required="" autofocus="">
            <input type="password" name="inputPassword" class="form-control" placeholder="Clave" required=""> 
             <button type="submit" class="btn btn-lg btn-block btn-primary">Login</button>
          </form>

        </div>        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>        
      </div>
    </div>
  </div>
  
</div>



<?php
 include 'include/footer.php';
 include 'include/bootstrap.php';
 include 'include/end.php';
?>