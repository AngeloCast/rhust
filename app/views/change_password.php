<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>RHU San Teodoro - Change Password</title>
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
  <div class="row">
    <div class="col-xs-12">
      <?php include 'includes/message.php';?>

      <div class="card">
      
      <div class="text-right mr-3 mt-2">
        <a href="<?=site_url('home'); ?>" class="returnx"><i class="fa fa-close"></i></a>
      </div>

      <div class="text-center">
        <img class="card-img-top" src="<?php echo BASE_URL . PUBLIC_DIR . '/images/MHOST_logo.jpg'; ?>" style="width: 60px;" alt="Card image cap">
        <h6 style="font-weight: 900; color: maroon;"> RURAL HEALTH UNIT OF SAN TEODORO</b></h6>
      </div>
      <div class="card-body">
        <h5 class="hr-lines">CHANGE PASSWORD</h5><br>
        <p style="font-size: 12px; text-align:center;">Please enter your new password.</p>
        <form action="<?=site_url('auth/reset_password');?>" method="POST">
          <div class="mt-2 text-center">
            <input type="hidden" name="email" value="<?=$data['email'];?>">
            <input type="hidden" name="reset_code" value="<?=$data['code'];?>">
            <label class="sr-only" for="inlineFormInputGroupUsername2">New Password</label>
            <div class="input-group mb-2 mr-sm-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-lock"></i></div>
              </div>
              <input style="font-size: 15px;"  type="password" name="newpass" minlength="9" class="form-control" id="newpass" placeholder="New Password" required>

            </div>

            <label class="sr-only" for="inlineFormInputGroupUsername2">Confirm Password</label>
            <div class="input-group mb-1 mr-sm-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-lock"></i></div>
              </div>
              <input style="font-size: 15px;" type="password" name="confirmpass" minlength="9" class="form-control" id="confirmpass" placeholder="Confirm Password" required>

            </div>
            <div class="text-right mt-0">
              <p style="font-size: 12px;" id='message'></p>
            </div>
          </div>

          <!-- <div class="d-flex justify-content-end">

              <div>
                <a href="#" class="forgot">Forgot Password?</a>
              </div>
                   
          </div> -->

          <div class="mt-2">
            <button type="submit" name="login" class="btn btn-primary btn-block">Continue</button>
          </div>
          
        </form>
        
        <hr>
        <div class="d-flex justify-content-center mt-2">
          <p style="font-size: 12px; color: grey;">Don't have an account? &nbsp;</p> <a href="<?=site_url('auth/register'); ?>" class="create"> <i class="fa fa-pen"></i>Register </a>
        </div>

        </div>
      </div>
    </div>  
  </div>
<script type="text/javascript">
$('#newpass, #confirmpass').on('keyup', function () {
  if ($('#newpass').val() == $('#confirmpass').val()) {
    $('#message').html('<i class="fa fa-check"></i> Matching').css('color', 'green');
  } else 
    $('#message').html('<i class="fa fa-times"></i> Not Matching').css('color', 'red');
});
</script>
</body>
</html>


