<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>RHU San Teodoro - Log in</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/loginstyle.css">
  <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL . PUBLIC_DIR . '/images/MHOST_icon.png'; ?>">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;500;700;900&display=swap" rel="stylesheet">  
  <title></title>
</head>
<body id="bodyimg">
  <div class="card" >

    <div class="text-right mr-3 mt-2">
      <a href="<?=site_url('home'); ?>" class="returnx"><i class="fa fa-close"></i></a>
    </div>

    <div class="text-center">
      <img class="card-img-top" src="<?php echo BASE_URL . PUBLIC_DIR . '/images/MHOST_logo.jpg'; ?>" style="width: 60px;" alt="Card image cap">
      <h6 style="font-weight: 900; color: maroon;"> RURAL HEALTH UNIT OF SAN TEODORO</h6>
    </div>
    <div class="card-body" style="padding-bottom: 0px;">
            
      <h5 class="hr-lines">Log in </h5><br>
      <?php include 'includes/message.php'; ?>
      <form action="<?=site_url('auth/login');?>" method="POST">
        <div class="mt-2 text-center">

          <label class="sr-only" for="inlineFormInputGroupUsername2">Email</label>
          <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="fa fa-envelope"></i></div>
            </div>
            <input type="email" name="email" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Enter User Email" required>
          </div>

          <label class="sr-only" for="inlineFormInputGroupUsername2">Password</label>
          <div class="input-group mb-1 mr-sm-2">
            <div class="input-group-prepend">
              <div class="input-group-text"><i class="fa fa-lock"></i></div>
            </div>
            <input type="password" name="password" class="form-control" id="mypassword" placeholder="Enter User Password" required>
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" id="icon-click" type="button"><i class="fa fa-eye-slash" id="icon"></i></button>
            </div>
          </div>
          <br>
          <!-- <div class="input-group  mr-sm-2" >
            <label style="font-size: 14px;">
              <input type="checkbox" checked="checked" name="remember"> Remember me
              
            </label>
          </div> -->
          
        </div>

        <div class="mt-2">
          
          <button type="submit" name="login" class="btn btn-primary btn-block">Log In</button>
          <p style="font-size: 12px; margin-top: 5px; text-align: right;"><a href="<?=site_url('auth/forgot_password')?>"><u>Forgot Password?</u></a><p>
        </div>
      </form>

      <hr>
      <div class="d-flex justify-content-center">
        <p style="font-size: 12px; color: grey;">Don't have an account? &nbsp;</p> <a href="<?=site_url('auth/register'); ?>" class="create"> <i class="fa fa-pen"></i>Register </a>

      </div>

    </div>
  </div>
<script>
$(document).ready(function() {

  $("#icon-click").click(function() {

    var className = $("#icon").attr('class');
    className = className.indexOf('slash') !== -1 ? 'fa fa-eye' : 'fa fa-eye-slash'

    $("#icon").attr('class', className);
    var input = $("#mypassword");

    if (input.attr("type") == "text") {
      input.attr("type", "password");
    } else {
      input.attr("type", "text");
    }
  });

});
</script>
</body>
</html>


