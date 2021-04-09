<?php include 'includes/session.php'; ?>
<?php

  // if(isset($_SESSION['captcha'])){
  //   $now = time();
  //   if($now >= $_SESSION['captcha']){
  //     unset($_SESSION['captcha']);
  //   }
  // }

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition register-page" style="background-image: url('images/back.jpg');
background-size: 1400px 900px">
<div class="register-box" style="opacity: 0.9;">
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
   
  	<div class="register-box-body col-sm-12 col-md-12 col-lg-12">
    	<strong><h3>Sign Up</h3></strong>
      <hr>
    	<form action="register.php" method="POST">

          <div class="form-group has-feedback col-sm-12">
            <input type="text" class="form-control" name="firstname" 
              placeholder="Firstname*" 
              value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
            
          </div>

          <div class="form-group has-feedback col-sm-12">
            <input type="text" class="form-control" name="middlename" 
              placeholder="Middlename (Optional)">
          </div>

          <div class="form-group has-feedback col-sm-12">
            <input type="text" class="form-control" name="lastname" 
              placeholder="Lastname*" 
              value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>"  required>
          </div>

          <div class="form-group has-feedback col-sm-12">
            <input type="date" class="form-control" name="birthdate" 
              placeholder="Date of Birth">
            
          </div>

          <div class="form-group has-feedback col-sm-12">
            <input type="text" class="form-control" name="address" 
              placeholder="Address*" required>
            
          </div>

          <div class="form-group has-feedback col-sm-12">
            <input type="text" class="form-control" name="contact" 
              placeholder="Contact Number (Optional)">
            
          </div>

      		<div class="form-group has-feedback col-sm-12">
        		<input type="email" class="form-control" name="email" placeholder="Enter valid Email (Optional)" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
        	
      		</div>
          <div class="form-group has-feedback col-sm-12">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
           
          </div>
          <div class="form-group has-feedback col-sm-12">
            <input type="password" class="form-control" name="repassword" placeholder="Confirm Password" required>
          
          </div>
          <?php
            // if(!isset($_SESSION['captcha'])){
            //   echo '
            //     <div class="form-group" style="width:100%;">
            //       <div class="g-recaptcha" data-sitekey="6LevO1IUAAAAAFX5PpmtEoCxwae-I8cCQrbhTfM6"></div>
            //     </div>
            //   ';
            // }
          ?>
       
      		<div class="row">
    			<div class="col-sm-12 text-center">
          			<button type="submit" class="btn btn-success" name="signup"><i class="fa fa-pencil"></i> Sign Up</button>
        		</div>
      		</div>
    	</form>
      <hr>
      <div class="text-center">
        <a href="index.php">I already have an account.</a><br>
      </div>
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>