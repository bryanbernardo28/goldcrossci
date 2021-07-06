
 <body  >
  
  
  <div class="limiter" >
  
    <div class="container-login100" style="background-image: url(<?=base_url('assets/images/bg-02.jpg')?>);" > 

      
      <div class="wrap-login100 p-t-30 p-b-50" align-self:="center">

         <?php
    if(validation_errors()){
    ?>
    <div class="callout callout-danger"style="color:rgb(255,255,255);">
      <h5><?=validation_errors();?></h5>
    </div>
    <?php
    }
    ?>
 
    <span class="login100-form-title p-b-41">GOLD CROSS <br> SECURITY AND INVESTIGATION AGENCY</span>


     <!--    <span class="login100-form-title p-b-41">
          Account Login
        </span> -->
        <form  action="<?=base_url('adminlogin/login')?>" method="post" class="login100-form validate-form p-b-33 p-t-5">

          <div class="wrap-input100 validate-input"  class="callout callout-danger" data-validate = "Enter Email">
            <input class="input100" type="email"  name="adminemail" placeholder="Email">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="wrap-input100 validate-input" class="callout callout-danger" data-validate="Enter password">
            <input class="input100"type="password" name="adminpass" placeholder="Password">
            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
          </div>
          <div align="center">
        
        <!-- <?=$widget?> -->
              <!-- <?=$script?> -->
        
        
     
        </div>

          <div class="container-login100-form-btn m-t-32">
            <button class="login100-form-btn">
              Login
            </button>

          </div>
<center> <a href="<?=base_url('adminlogin/forgotPassword')?>" style="color:rgb(37,9,97);">I forgot my password</a><br></center>
        </form>
      </div>
    </div>

  </div>
