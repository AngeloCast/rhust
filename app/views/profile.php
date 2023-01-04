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
  <link href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/fontawesome-all.css" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
  rel="stylesheet">
</head>
<style>
  #lalagyan{
    padding: 30px; background-color: #e9ecef; margin-bottom: 20px;
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
  width: 200px;
  height: 200px;
  max-width: 200px;
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

          

            <div class="row gutters-sm" id="lalagyan">

              <div class="col-sm-12 text-right mb-2">
                <a href="<?=site_url('home/edit_profile'); ?>" class="btn btn-sm editprofile rounded "><i class="fa fa-pencil"></i> Edit Profile</a>
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
                 
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?=$data[3]['fullname']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?=$data[3]['email']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile Number</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?=$data[3]['cnumber']?>
                    </div>
                  </div>
                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?=$data[3]['address']?>
                    </div>
                  </div>
                  
                </div>
              </div>

            </div>
          </div>
  </section>
<?php include("includes/footer.php");?>
<?php include("includes/scripts.php");?>
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/js/jquery-2.2.3.min.js"></script>
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/js/bootstrap.js"></script>
</body>
</html>