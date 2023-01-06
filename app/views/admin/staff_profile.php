<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <a href="<?=site_url('admin/'); ?>" class='btn btn-primary btn-md btn-flat' style="color: white; margin-bottom: 10px;"><i class="fa fa-arrow-left"></i> BACK</a>

      <h1 style="margin-top: 10px;">
        <strong>
        Staff Profile
      </strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Staff Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
        <div class="row">

          <div class="col-sm-12 mx-auto">
            
            <?php include 'includes/message.php'; ?>
            <div class="box">
              <br>
              <div class="box-body">
                <form class="form-horizontal" action="<?=site_url('staff/update_staff_info');?>" method="post" enctype="multipart/form-data">
                  <div class="col-sm-3">
                    <img src="<?php echo BASE_URL . PUBLIC_DIR . '/images/avatar/' . $data[0]['photo']; ?>" style="margin-bottom: 10px; margin-top: 10px; height: 100%; width: 100%; max-height: auto; max-width: auto; border: solid 1px gray;">
                      <label for="photo" class="control-label">Change Photo</label>
                      <input class="form-control" type="file" accept="image/*" id="fileToUpload" name="fileToUpload">
                      <br>
                  </div>
                  <div class="col-sm-9">
                    <input type="hidden" name="id" value="<?=$data[0]['staff_id'];?>">
                    <input type="hidden" name="photo" value="<?=$data[0]['photo']; ?>"> 
                    <h4 style="color: white; background-color: teal; font-weight: bold; padding: 10px;">STAFF INFORMATION </h4>

                    <div class="form-group">

                      <div class="col-sm-6">
                        <label for="fullname" class="control-label">Full Name</label>
                        <input type="text" class="form-control" name="fullname" value="<?=$data[0]['fullname']; ?>"  required>
                      </div>

                      <div class="col-sm-6">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?=$data[0]['email']; ?>" readonly required>
                      </div>

                    </div>

                    <div class="form-group">

                      <div class="col-sm-6">
                        <label for="address" class="control-label">Address</label>
                        <input type="text" class="form-control" name="address" value="<?=$data[0]['address']; ?>"  required>
                      </div>

                      <div class="col-sm-6">
                        <label for="cnumber" class="control-label">Contact</label>
                        <input type="number" class="form-control" name="cnumber" value="<?=$data[0]['cnumber']; ?>"  required>
                      </div>

                    </div>

                  </div>


                  <div class="col-sm-12">
                        <hr>
                        <button type="submit" style="color: white; float: right;" class="btn btn-primary btn-md btn-flat">Save Changes <i class="fa fa-save"></i></button>
                  </div>
                  </form>
              </div>
          </div>
        </div>

        <div class="col-sm-12 mx-auto">
            <div class="box">
              <br>
              <div class="box-body">
                <form class="form-horizontal" action="<?=site_url('staff/staff_password');?>" method="post">
                  
                  <div class="col-sm-12">
                  
                    <input type="hidden" name="id" value="<?=$data[0]['staff_id'];?>">
                    <h4 style="color: white; background-color: #4a8d4a; font-weight: bold; padding: 10px;"><i class="fa fa-key"></i> CHANGE PASSWORD</h4>

                    <div class="form-group">

                      <div class="col-sm-4">
                        <label for="oldpass" class="control-label">Old Password</label>
                        <input type="password" class="form-control" placeholder="Enter old password" name="oldpass" required>
                      </div>

                      <div class="col-sm-4">
                        <label for="newpass" class="control-label">New Password</label>
                        <input type="password" class="form-control" placeholder="Enter new password" id="newpassword" name="newpass" required>
                      </div>

                      <div class="col-sm-4">
                        <label for="confirmpass" class="control-label">Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Confirm password" id="confirm_password" name="confirmpass" required>
                        <p class="text-right" id='message'></p>
                      </div>

                    </div>

                  </div>


                  <div class="col-sm-12">
                        <hr>
                        <button type="submit" style="color: white; float: right;" class="btn btn-primary btn-md btn-flat">Change <i class="fa fa-check"></i></button>
                  </div>
                  </form>
              </div>
          </div>
        </div>
      </div>
    </section>
  </div>
    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/scripts.php'; ?>
</div>
<script type="text/javascript">
$('#newpassword, #confirm_password').on('keyup', function () {
  if ($('#newpassword').val() == $('#confirm_password').val()) {
    $('#message').html('<i class="fa fa-check"></i> Matching').css('color', 'green');
  } else 
    $('#message').html('<i class="fa fa-times"></i> Not Matching').css('color', 'red');
});
</script>
</body>
</html>