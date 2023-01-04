<?php //require("libs/fetch_data.php");?>
<!DOCTYPE html>
<html lang="zxx">
<head>
  <title>RHU San Teodoro - Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL . PUBLIC_DIR . '/images/MHOST_logo.jpg'; ?>">
  <meta charset="utf-8">
  
  <script>
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <link href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/bootstrap.css" rel='stylesheet' type='text/css' />
  <link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/jquery.desoslide.css">
  <link href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/style.css" rel='stylesheet' type='text/css' />
  <link href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/toggle_switch.css" rel='stylesheet' type='text/css' />
  <link href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/fontawesome-all.css" rel="stylesheet">
  <link href="<?php echo BASE_URL . PUBLIC_DIR;?>/js/fontawesome-all.css" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
  rel="stylesheet">
</head>
<style>
  #lalagyan{
    padding: 30px 30px 30px 30px;  margin-bottom: 20px;
  }
  .editprofile{
    color: white; background-color: #0086ad;
  }
  .editprofile:hover{
    color: white; background-color: #47b2d1;
  }
  .card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}
body{
  background-color: #e9ecef;
}
.image-cropper {
  width: 250px;
  height: 250px;
  max-width: 250px;
  position: relative;
  overflow: hidden;
  border-radius: 50%;
  border: solid 1px black;
}
#prof{
  display: inline;
  margin: 0 auto;
  height: 100%;
  width: auto;
}
</style>
<body>
  <?php include("includes/header.php");?>
  <!--/main-->
  
  <section class="main-content-w3layouts-agileits" style="padding-top: 0;">
    
    <div class="container">
          
          
          <form class="form-horizontal" action="<?=site_url('home/update_profile');?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$data[3]['id']; ?>">
            <input type="hidden" name="photo" value="<?=$data[3]['photo']; ?>">
            <div class="row gutters-sm" id="lalagyan">
              <div class="col-sm-12 text-center">
                <?php include 'includes/message.php'; ?>
              </div>
              <div class="col-sm-12 text-right mb-2">
                <a href="<?=site_url('home/profile'); ?>" class="btn btn-sm rounded editprofile"> <i class="fa fa-eye"></i> View Profile </a>
              </div>
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-header text-center">
                    <h6><strong><i class="fa fa-camera"></i> Profile Picture</strong></h6>
                  </div>
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                      <div class="image-cropper">
                        <img src="<?php echo BASE_URL . PUBLIC_DIR . '/images/' . $data[3]['photo']; ?>" id="prof" alt="San Teodoro Logo">
                      </div>
                      <div class="mt-3">
                        <input class="form-control" type="file" accept="image/*" id="fileToUpload" name="fileToUpload">
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-8">
                <div class="card mb-3">
                  <div class="card-header">
                    <h6><strong><i class="fa fa-user"></i> Personal Info</strong></h6>
                  </div>
                  <div class="card-body">
                    

                    <div class="form-group row">
                      <label for="fullname" class="col-sm-3 col-form-label">Full Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?=$data[3]['fullname']; ?>" name="fullname" required>
                      </div>
                    </div>
                    
                    <hr>
                    <div class="form-group row">
                      <label for="cnumber" class="col-sm-3 col-form-label">Mobile Number</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?=$data[3]['cnumber']; ?>" pattern="[1-9]{1}[0-9]{9}" title="Enter 10 digit number" name="cnumber" required>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                      <label for="address" class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" value="<?=$data[3]['address']; ?>" name="address" required>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                      <div class="col-sm-12">
                        
                        <?php
                          if($data[3]['notification'] == 0){
                            echo '<label class="switch form-label">
                                  <input type="hidden" name="notification" value="0">
                                  <input type="checkbox" name="notification" value="1">
                                  <span class="slider round"></span>
                                  </label>
                                  <label class="form-label">Receive Email Notifications</label>';
                          }
                          else{
                            echo '<label class="switch form-label">
                                  <input type="hidden" name="notification" value="0">
                                  <input type="checkbox" name="notification" checked value="1">
                                  <span class="slider round"></span>
                                  </label>
                                  <label class="form-label">Receive Email Notifications</label>';
                          }
                        ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Save Changes</button>
                        
                      </div>
                    </div>

                  </div>
                </div>
                </form>

                <div class="card mb-3">
                  <div class="card-header">
                    <form class="form-horizontal" action="<?=site_url('home/change_password');?>" method="post">
                      <input type="hidden" name="id" value="<?=$data[3]['id']; ?>">
                    <h6><strong><i class="fa fa-key"></i> Change Password</strong></h6>
                  </div>
                  <div class="card-body">
                    <form class="form-horizontal" action="<?=site_url('admin/change_password');?>" method="post">
                      <div class="form-group row">
                        <label for="oldpass" class="col-sm-3 col-form-label">Old Password</label>
                        <div class="col-sm-6">
                          <input type="password" class="form-control" placeholder="Old Password" name="oldpass" required>
                        </div>
                      </div>
                      <hr>
                      <div class="form-group row">
                        <label for="newpass" class="col-sm-3 col-form-label">New Password</label>
                        <div class="col-sm-6">
                          <input type="password" class="form-control" placeholder="Must be 9 characters minimum" minlength="9" id="newpassword" name="newpass" required>
                        </div>
                      </div>
                      <hr>
                      <div class="form-group row">
                        <label for="confirmpass" class="col-sm-3 col-form-label">Confirm</label>
                        <div class="col-sm-6">
                          <input type="password" class="form-control" placeholder="Confirm Password" minlength="9" id="confirm_password" name="confirmpass" required>
                          
                        </div>
                        <div class="col-sm-3 text-right">
                          <p id='message'></p>
                        </div>
                      </div>
                      
                      <hr>
                      <div class="row">
                        <div class="col-sm-12 text-right">
                          <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Change</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </form>
    </div>
  </section>
<?php include("includes/footer.php");?>
<?php include("includes/scripts.php");?>
<script type="text/javascript">
$('#newpassword, #confirm_password').on('keyup', function () {
  if ($('#newpassword').val() == $('#confirm_password').val()) {
    $('#message').html('<i class="fa fa-check"></i> Matching').css('color', 'green');
  } else 
    $('#message').html('<i class="fa fa-times"></i> Not Matching').css('color', 'red');
});
</script>
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/js/jquery-2.2.3.min.js"></script>
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/js/bootstrap.js"></script>
</body>
</html>