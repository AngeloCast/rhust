<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/registerstyle.css">
  <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL . PUBLIC_DIR . '/images/MHOST_logo.jpg'; ?>">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;500;700;900&display=swap" rel="stylesheet">
  <title></title>
</head>
<body id="bodyimg">
  <div class="card">

    <div class="text-right mr-3 mt-2">
      <a href="<?=site_url('home'); ?>" class="returnx"><i class="fa fa-close"></i></a>
    </div>

    <div class="text-center">
      <img class="card-img-top" src="<?php echo BASE_URL . PUBLIC_DIR . '/images/MHOST_logo.jpg'; ?>" style="width: 60px;" alt="Card image cap">
      <h6 style="font-weight: 900; color: maroon;"> RURAL HEALTH UNIT OF SAN TEODORO</b></h6>
    </div>
    <div class="card-body">
      <h5 class="hr-lines">Sign Up</h5><br>
      <?php include 'includes/message.php'; ?>
      
      <form action="<?=site_url('auth/register');?>" method="POST">
        <div class="mt-2 text-center">
          <input type="hidden" name="notification" value="0">
          <label class="sr-only" for="inlineFormInputGroupUsername2">Full Name</label>
          <div class="input-group mb-3 mr-sm-2">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="fa fa-user"></i></div>
            </div>
            <input style="font-size: 15px;" type="text" name="fullname" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Enter Full Name" required>
          </div>

          <label class="sr-only" for="inlineFormInputGroupUsername2">Email</label>
          <div class="input-group mb-3 mr-sm-2">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="fa fa-envelope"></i></div>
            </div>
            <input style="font-size: 15px;"  type="email" name="email" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Enter Email" required>
          </div>

          <div class="input-group mb-3 mr-sm-2">
            <label style="font-size:14px;">
                <input type="checkbox" name="notification" value="1"> Receive email notifications for updates
            </label> 
          </div>
        </div>

        <!-- <div class="d-flex justify-content-end">

            <div>
              <a href="#" class="forgot">Forgot Password?</a>
            </div>
                 
        </div> -->

        <div class="mt-2">
          <button type="submit" name="login" class="btn btn-primary btn-block">Register</button>
        </div>
        <div style="text-align: center; margin-top: 5px;">
          <label style="font-size: 11px;">By signing up, you agree to our <b>Terms of Use</b> and <b>Privacy Policy</b>.</label>
        </div>
        
      </form>
      <!--
      <div class="d-flex justify-content-center">
        <p style="font-size: 14px; color: grey; margin-top: 5px;">Not Registered? </p>
        <a style="margin-top: 5px; margin-left: 5px;" href="#" class="create"> Create new account!</a>
      </div>
      -->
      <hr>
      <div class="d-flex justify-content-center">
        <p style="font-size: 12px; color: grey;">Already have an account? &nbsp;</p> <a href="<?=site_url('auth/'); ?>" class="create"> <i class="fa fa-sign-out"></i>Login </a>
        <!--<a style="margin-top: 10px;" href="#" class="create"><i class="fa fa-home"></i> Go back to homepage</a>-->
      </div>

    </div>
  </div>

</body>
</html>


