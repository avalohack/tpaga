<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 include 'include/head.php';
?>

<div class="container">
    <div class="modal-dialog">
      <div class="modal-content">      
        <div class="modal-header">
              <h4 class="modal-title">Login</h4>
        </div>   
        <div class="modal-body">
              <?php $attributes = array('name' =>'formUser');
                echo form_open('user/login',$attributes); 
              ?>
                <input type="email" name="inputEmail" class="form-control" placeholder="Email o Usuario" required="" autofocus="">
                <input type="password" name="inputPassword" class="form-control" placeholder="Clave" required=""> 

                 <button type="submit" class="btn btn-lg btn-block btn-primary">Login</button>
                 <?php if (isset($mensaje)) {
                      echo "<h3>".$mensaje."</h3>";
                    }
                 ?>
              </form>
        </div> 
      </div> 
    </div>
</div>





    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>











<?php
 include 'include/footer.php';
 include 'include/end.php';
?>