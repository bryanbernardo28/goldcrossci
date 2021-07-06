<!-- <body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <p style="color:rgb(237,236,236,0.7);"><b style="font-family:garamond";>Gold Cross Security & Investigation Agency</b></p>
  </div> 

  <div class="login-box-body" style="background-color: rgb(255,255,255,0.4);">
    <?php
    if(validation_errors()){
    ?>
    <div class="callout callout-danger">
      <h5><?=validation_errors();?></h5>
    </div>
    <?php
    }
    ?>
    <p class="login-box-msg" style="color:rgb(37,9,97);">Sign in to start your session</p>

    <form action="<?=base_url('clientlogin/login')?>" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="clientemail" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control"name="clientpassword" placeholder="Password" text-align:=left>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">

        <?=$widget?>
              <?=$script?>
        
        <div class="col-xs-4 pull-right">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
    
      </div>
    </form>

  

    <a href="<?=base_url('clientlogin/forgotPassword')?>">I forgot my password</a><br>
    

  </div>

</div>


 -->



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
 
    <span class="login100-form-title p-b-41">GOLD CROSS <br> SECURITY AND INVESTIGATION AGENCY <br> CLIENT</span>


     <!--    <span class="login100-form-title p-b-41">
          Account Login
        </span> -->
        <form  action="<?=base_url('clientlogin/login')?>" method="post" class="login100-form validate-form p-b-33 p-t-5">

          <div class="wrap-input100 validate-input"  class="callout callout-danger" data-validate = "Enter Email">
            <input class="input100" type="email"  name="clientemail" placeholder="Email">
            <span class="focus-input100" data-placeholder="&#xe82a;"></span>
          </div>

          <div class="wrap-input100 validate-input" class="callout callout-danger" data-validate="Enter password">
            <input class="input100"type="password" name="clientpassword" placeholder="Password">
            <span class="focus-input100" data-placeholder="&#xe80f;"></span>
          </div>
          <div align="center">
        
        <?=$widget?>
              <?=$script?>
        
        
     
        </div>

          <div class="container-login100-form-btn m-t-32">
            <button class="login100-form-btn">
              Login
            </button>

          </div>
<center> <a href="<?=base_url('clientlogin/forgotPassword')?>" style="color:rgb(37,9,97);">I forgot my password</a><br></center>
        </form>
      </div>
    </div>

  </div>
