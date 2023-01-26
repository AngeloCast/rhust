<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<style>
  #ptitle{
  	background-color: lightblue; padding: 5px; border-radius: 5px;
  }
  #ptitle2{
  	background-color: #ddd; padding: 5px; border-radius: 5px;
  }
  #ptitle3{
  	background-color: #97cf95; padding: 5px; border-radius: 5px;
  }
  textarea{
    resize: vertical;
  }
	</style>
  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<a href="<?=site_url('vaccination/vaccination_records'); ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-arrow-left"></i> Back</a> 
			
			<h3 style="margin-top: 20px;">
        <b>New Vaccination Record</b>
      </h3>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">New Vaccination Record</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content"  style="padding-top: 0;">
      <?php include('includes/message.php')?>
      <div class="row">
        <div class="col-sm-12 mx-auto">
          <div class="box" style="padding: 20px;">
			      <div class="box-body">
			        <div class= "col-lg-12">
								<form class="form-horizontal" action="<?=site_url('vaccination/add_vaccination');?>" method="post">

									<div class="form-group">
											<h5 id="ptitle"><b>Covid Vaccination Details: </b></h5>
						        	
                      <div class="col-sm-3">
                          <label for="priority_group" class="control-label">Priority Group</label>
                        <input type="text" class="form-control" name="priority_group" required>
                      </div>

                      <div class="col-sm-3">
                          <label for="uniqueperson_id" class="control-label">Unique Person ID</label>
                          <input type="num" class="form-control" name="uniqueperson_id" required>
                      </div>
                  </div>
                  <hr>
                  <div class="form-group">
                  	<input type="hidden" name="indigenous_member" value="no">
                  	<div class="col-sm-3">
	                  	<label for="indigenous_member" class="control-label">
					                <input type="checkbox" name="indigenous_member" value="yes"> Indigenous Member
					            </label>
					          </div>
					          <input type="hidden" name="pwd" value="no">
				            <div class="col-sm-3">
	                  	<label for="pwd" class="control-label">
					                <input type="checkbox" name="pwd" value="yes"> PWD
					            </label>
					          </div>

						     	</div>
						     	<hr>
									<div class="form-group">
						        	
                      <div class="col-sm-3">
                          <label for="lastname" class="control-label">Last Name</label>
                        <input type="text" class="form-control" name="lastname"  pattern="[a-zA-Z, ]+" title="Only letters are allowed!" required>
                      </div>
                      
                      <div class="col-sm-3">
                      	<label for="firstname" class="control-label">First Name</label>
                        <input type="text" class="form-control" name="firstname" pattern="[a-zA-Z, ]+" title="Only letters are allowed!" required>
                      </div>

                      <div class="col-sm-3">
                          <label for="middlename" class="control-label">Middle Name</label>
                          <input type="text" class="form-control" name="middlename" pattern="[a-zA-Z, ]+" title="Only letters are allowed!" required>
                      </div>

                      <div class="col-sm-2">
                          <label for="suffix" class="control-label">Suffix</label>
                          <input type="text" class="form-control" name="suffix" pattern="[a-zA-Z, ]+" title="Only letters are allowed!">
                      </div>


						     	</div>

						     	<div class="form-group">

						     		<div class="col-sm-3">
						        	<label for="birthday" class="control-label">Birthday</label>
						          <input type="date" class="form-control" name="birthday">
						        </div>

										<div class="col-sm-3">
											<label for="sex" class="control-label">Sex</label>
							        <select class="form-control" name="sex">
							        	<option value="N">Not Set</option>
							          <option value="M">Male</option>
							          <option value="F">Female</option> 
							          <option value="O">Other</option>
							        </select>
						        </div>

						        <div class="col-sm-3">
						        	<label for="cnumber" class="control-label">Contact Number</label>
						          <input type="tel" class="form-control" pattern="[0-9]{10}" title="Enter 10 digit number" id="cnumber" name="cnumber" placeholder="10 digit number">
						        </div>

						      </div>
						     	<hr>
						     	<div class="form-group">
						        
						        <div class="col-sm-3">
						        	<label for="region" class="control-label">Region</label>
						          <input type="text" class="form-control" name="region">
						        </div>

						        <div class="col-sm-3">
						        	<label for="province" class="control-label">Province</label>
						          <input type="text" class="form-control" name="province">
						        </div>
						      	
						      	<div class="col-sm-3">
						        	<label for="municipality" class="control-label">Municipality</label>
						          <input type="text" class="form-control" name="municipality">
						        </div>
						        
						        <div class="col-sm-3">
						        	<label for="barangay" class="control-label">Barangay</label>
						          <input type="text" class="form-control" name="barangay">
						        </div>
						    		          
						      </div>
						     
						      <hr>
						      <button type="submit" style="color: white; float: right;" class="btn btn-success btn-md btn-flat"><i class="fa fa-save"></i>Save Record</button>
						      <a href="<?=site_url('vaccination/vaccination_records'); ?>" class='btn btn-danger btn-md btn-flat' style="color: white; float: right;  margin-right: 5px;"> Cancel</a>
								</form>
							</div>
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