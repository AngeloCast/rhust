<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <a href="<?=site_url('admin/staff'); ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-arrow-left"></i> Back</a> 
			
			<div class="row" style="margin-top: 20px;">
				<div class="col-md-6 text-left">
					<h3 style="margin-top: 10px;">
						<i class="fa fa-info-circle"></i> 
		        <strong>
		        Edit Staff Information
		      	</strong>
		      </h3>
				</div>
				<div class="col-md-6 text-right">
					<form class="form-horizontal" action="<?=site_url('admin/display_staff');?>" method="post">
						<input type="hidden" name="id" value="<?=$data[2]['staff_id']; ?>">
					<?php if($data[2]['display'] == 1){
						echo'
						<button type="submit" name="remove" class="btn btn-info btn-md btn-rounded"><i class="fa fa-eye"></i></button>
						<span>DISPLAYED</span>
						';
					}
					else{
						echo'
						<button type="submit" name="display" class="btn btn-danger btn-md btn-flat"><i class="fa fa-eye-slash"></i></button>
						<span>NOT DISPLAYED</span>
						';
					}
					?>
					</form>
				</div>
			</div>

			
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Staff</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php include 'includes/message.php'; ?>
      	<div class="row">
        	<div class="col-sm-12 mx-auto">
          	<div class="box">
            	<br>
							<div class="box-body">
								<form class="form-horizontal" action="<?=site_url('admin/update_staff');?>" method="post" enctype="multipart/form-data">
									<div class="col-sm-3">
										<img src="<?php echo BASE_URL . PUBLIC_DIR . '/images/avatar/' . $data[2]['photo']; ?>" style="margin-bottom: 10px; margin-top: 10px; height: 100%; width: 100%; max-height: auto; max-width: auto; border: solid 1px gray;">
											<label for="photo" class="control-label">Change Photo</label>
							      	<input class="form-control" type="file" accept="image/*" id="fileToUpload" name="fileToUpload">
							      	<br>
									</div>
									<div class="col-sm-9">
									
										<input type="hidden" name="staff_id" value="<?=$data[2]['staff_id']; ?>">
										<input type="hidden" name="photo" value="<?=$data[2]['photo']; ?>"> 
														<h4 style="color: white; background-color: green; font-weight: bold; padding: 10px;">STAFF DETAILS</h4>
															<div class="form-group">
						                    <div class="col-sm-8">
						                    	<label for="fullname" class="control-label">Full Name</label>
						                      <input type="text" class="form-control" name="fullname" value="<?=$data[2]['fullname']; ?>"  required>
						                    </div>

						                    <div class="col-sm-4">
						                    	<label for="position" class="control-label">Position</label>
						                      <input type="text" class="form-control" name="position" value="<?=$data[2]['position']; ?>" required>
						                    </div>
						                    
						                  </div>

						                  <div class="form-group">
						                    

						                    <div class="col-sm-4">
						                    	<label for="gender" class="control-label">Gender</label>
							                    <select class="form-control" name="gender" required>
							                      
							                      <?php 
							                      	if($data[2]['gender'] == 'M'){
							                    		echo '<option value="'.$data[2]['gender'].'" selected>Male</option>
							                    		<option value="F">Female</option> <option value="Other">Other</option>';
							                      	}
							                      	else if($data[2]['gender'] == 'F'){
							                    		echo '<option value="'.$data[2]['gender'].'" selected>Female</option>
							                    		<option value="M">Male</option> <option value="Other">Other</option>';
							                      	}
							                      	else{
							                      		echo '<option value="'.$data[2]['gender'].'" selected>Other</option>
							                      		<option value="M">Male</option> <option value="F">Female</option>';
							                      	}
							                      ?>
							                      
							                    </select>
						                    </div>
						                    <div class="col-sm-4">
						                    	<label for="address" class="control-label">Birthday</label>
						                      <input type="date" class="form-control" name="birthday" value="<?=$data[2]['birthday']; ?>" required>
						                    </div>

						                    <div class="col-sm-4">
						                    	<label for="email" class="control-label">Email</label>
						                      <input type="email" class="form-control" name="email" value="<?=$data[2]['email']; ?>" readonly required>
						                    </div>
						                    
						                  </div>

						                  <div class="form-group">
						                    <div class="col-sm-4">
						                    	<label for="cnumber" class="control-label">Contact</label>
						                      <input type="tel" class="form-control" pattern="[0-9]{10}" title="Enter 10 digit number" id="cnumber" name="cnumber" value="<?=$data[2]['cnumber']; ?>" required>
						                    </div>

						                    

						                    <div class="col-sm-4">
						                    	<label for="address" class="control-label">Address</label>
						                      <input type="text" placeholder="Barangay, City/Municipality" class="form-control" name="address" value="<?=$data[2]['address']; ?>" required>
						                    </div>
						                    
						                	</div>

						    		
						  	</div>
						  	<div class="col-sm-12">
											<hr>
											<button type="submit" style="color: white; float: right;" class="btn btn-primary btn-md btn-flat"><i class="fa fa-save"></i> Save Changes </button>
						          <a href="<?=site_url('admin/staff'); ?>" class='btn btn-danger btn-md btn-flat' style="color: white; float: right;  margin-right: 5px;"> Cancel</a>
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

</body>
</html>