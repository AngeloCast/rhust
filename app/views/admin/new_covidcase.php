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
    	<a href="<?=site_url('covid/covid_records'); ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-arrow-left"></i> Back</a> 
			
			<h3 style="margin-top: 20px;">
        <b>New Covid Case</b>
      </h3>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">New Covid Case</li>
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
								<form class="form-horizontal" action="<?=site_url('covid/add_covidcase');?>" method="post">

									<div class="form-group">
											<h5 id="ptitle"><b>Covid Case Details: </b></h5>
						        	
                      <div class="col-sm-4">
                          <label for="case_no" class="control-label">Case No.</label>
                        <input type="number" class="form-control" name="case_no" required>
                      </div>



						     	</div>

						     	<div class="form-group">
						     			<div class="col-sm-4">
                          <label for="release_date" class="control-label">Release Date</label>
                          <input type="date" class="form-control" name="release_date">
                      </div>
						        	
                      <div class="col-sm-4">
                          <label for="antigen_date" class="control-label">Date of Antigen</label>
                        <input type="date" class="form-control" name="antigen_date">
                      </div>

                      <div class="col-sm-4">
                          <label for="rtpcr_date" class="control-label">Date of RTPCR</label>
                          <input type="date" class="form-control" name="rtpcr_date">
                      </div>

						     	</div>

									<div class="form-group">
						        	
                      <div class="col-sm-4">
                          <label for="lastname" class="control-label">Last Name</label>
                        <input type="text" class="form-control" name="lastname"  pattern="[a-zA-Z, ]+" title="Only letters are allowed!" required>
                      </div>
                      
                      <div class="col-sm-4">
                      	<label for="firstname" class="control-label">First Name</label>
                        <input type="text" class="form-control" name="firstname" pattern="[a-zA-Z, ]+" title="Only letters are allowed!" required>
                      </div>

                      <div class="col-sm-4">
                          <label for="middlename" class="control-label">Middle Name</label>
                          <input type="text" class="form-control" name="middlename" pattern="[a-zA-Z, ]+" title="Only letters are allowed!" required>
                      </div>

						     	</div>

						     	<div class="form-group">

						     		<div class="col-sm-4">
						        	<label for="birthday" class="control-label">Birthday</label>
						          <input type="date" class="form-control" name="birthday">
						        </div>

						        <div class="col-sm-2">
						        	<label for="age" class="control-label">Age</label>
						          <input type="number" class="form-control" name="age">
						        </div>

										<div class="col-sm-2">
											<label for="sex" class="control-label">Sex</label>
							        <select class="form-control" name="sex">
							        	<option value="N">Not Set</option>
							          <option value="M">Male</option>
							          <option value="F">Female</option> 
							          <option value="O">Other</option>
							        </select>
						        </div>

						        <div class="col-sm-4">
						        	<label for="cnumber" class="control-label">Contact Number</label>
						          <input type="tel" class="form-control" pattern="[0-9]{10}" title="Enter 10 digit number" id="cnumber" name="cnumber" placeholder="10 digit number">
						        </div>

						      </div>
						     	<hr>
						     	<div class="form-group">
						        
						        <div class="col-sm-4">
						        	<label for="contact_nature" class="control-label">Nature of Contact</label>
						          <input type="text" class="form-control" name="contact_nature">
						        </div>

						        <div class="col-sm-4">
						        	<label for="last_exposure" class="control-label">Date of Last Exposure</label>
						          <input type="date" class="form-control" name="last_exposure">
						        </div>
   
						      </div>
						      <div class="form-group">
						      	
						      	<div class="col-sm-8">
						        	<label for="symptoms" class="control-label">Symptoms</label>
						          <input type="text" class="form-control" name="symptoms">
						        </div>
						        
						        <div class="col-sm-4">
						        	<label for="isolation_place" class="control-label">Place of Isolation</label>
						          <input type="text" class="form-control" name="isolation_place">
						        </div>
						    		          
						      </div>

						      <div class="form-group">
						        
						        <div class="col-sm-4">
						        	<label for="illness_onset" class="control-label">Onset of Illness</label>
						          <input type="date" class="form-control" name="illness_onset">
						        </div>

						        <div class="col-sm-4">
						        	<label for="quarantine_period" class="control-label">Quarantine Period</label>
						          <input type="text" class="form-control" name="quarantine_period">
						        </div>

						        <div class="col-sm-4">
						        	<label for="recovery_date" class="control-label">Recovery Date</label>
						          <input type="date" class="form-control" name="recovery_date">
						        </div>
   
						      </div>

						      <div class="form-group">

						        <div class="col-sm-4">
						        	<label for="outcome" class="control-label">Outcome</label>
						          <input type="text" class="form-control" name="outcome">
						        </div>

						        <div class="col-sm-4">
						        	<label for="contact_tracing" class="control-label">Closed Contact Tracing Date</label>
						          <input type="date" class="form-control" name="contact_tracing">
						        </div>
   									
   									<div class="col-sm-4">
						        	<label for="closed_contact" class="control-label">No. of Closed Contact</label>
						          <input type="number" class="form-control" name="closed_contact">
						        </div>

						      </div>

						      <div class="form-group">

						        <div class="col-sm-4">
						        	<label for="status" class="control-label">Status</label>
						          <input type="text" class="form-control" name="status">
						        </div>

						        <div class="col-sm-4">
						        	<label for="vaccination_status" class="control-label">Vaccination Status</label>
						          <input type="text" class="form-control" name="vaccination_status">
						        </div>

						      </div>

						      <hr>
						      <button type="submit" style="color: white; float: right;" class="btn btn-success btn-sm btn-flat">Save Record</button>
						      <a href="<?=site_url('covid/covid_records'); ?>" class='btn btn-danger btn-sm btn-flat' style="color: white; float: right;  margin-right: 5px;"> Cancel</a>
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