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
    	<a href="<?=site_url('patient/patient_records'); ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-arrow-left"></i> Back</a> 
			
			<h3 style="margin-top: 20px;">
        <b>New Patient Record</b>
      </h3>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">New Patient Record</li>
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
								<form class="form-horizontal" action="<?=site_url('patient/add_patientrecord');?>" method="post">

									<div class="form-group">
											<h5 id="ptitle"><b>A. <u>Patient's Personal Profile: </u></b></h5>
						        	
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

						        <div class="col-sm-2">
						        	<label for="age" class="control-label">Age</label>
						          <input type="number" class="form-control" name="age">
						        </div>

						        
										<div class="col-sm-2">
											<label for="gender" class="control-label">Gender</label>
							        <select class="form-control" name="gender">
							          <option value="N">Not Set</option>
							          <option value="M">Male</option>
							          <option value="F">Female</option> 
							          <option value="O">Other</option>
							        </select>
						        </div>

						        <div class="col-sm-4">
						        	<label for="birthday" class="control-label">Birthday</label>
						          <input type="date" class="form-control" name="birthday">
						        </div>

						        <div class="col-sm-4">
						        	<label for="civil_status" class="control-label">Civil Status</label>
						          <input type="text" class="form-control" name="civil_status">
						        </div>

						        
						      </div>
						     	
						     	<div class="form-group">
						        
						        <div class="col-sm-6">
						        	<label for="contact_person" class="control-label">Parent/Guardian/Contact Person</label>
						          <input type="text" class="form-control" name="contact_person">
						        </div>

						        <div class="col-sm-6">
						        	<label for="address" class="control-label">Address</label>
						          <input type="text" placeholder="Barangay, Municipality" class="form-control" name="address">
						        </div>
   
						      </div>
						      <div class="form-group">
						      	
						      	<div class="col-sm-6">
						        	<label for="cnumber" class="control-label">Contact Number</label>
						          <input type="tel" class="form-control" pattern="[0-9]{10}" title="Enter 10 digit number" id="cnumber" name="cnumber" placeholder="10 digit number">
						        </div>
						        
						        <div class="col-sm-6">
						        	<label for="health_insurance" class="control-label">Health Insurance Membership</label>
						          <input type="text" class="form-control" name="health_insurance">
						        </div>
						    		          
						      </div>

						      <div class="form-group">
						        
						        <div class="col-sm-4">
						        	<label for="religion" class="control-label">Religion</label>
						          <input type="text" class="form-control" name="religion">
						        </div>

						        <div class="col-sm-2">
						        	<label for="blood_type" class="control-label">Blood Type</label>
						          <input type="text" class="form-control" name="blood_type">
						        </div>
   
						      </div>

						      <hr>

						      <div class="form-group">

						      	<h5 id="ptitle"><b>B. <u>Patient Case Summary: </u></b></h5>

						        <div class="col-sm-4">
						        	<label for="visit_date" class="control-label">Date of visit</label>
						          <input type="date" class="form-control" name="visit_date">
						        </div>
						    		          
						        <div class="col-sm-4">
						        	<label for="visit_time" class="control-label">Time of visit</label>
						         <input type="time" class="form-control" name="visit_time">
						        </div>

						        <div class="col-sm-4">
						        	<label for="age_months" class="control-label">Age in months (if under 5 years old)</label>
						          <input type="number" class="form-control" name="age_months">
						        </div>
						      </div>

						      <div class="form-group">

						        <div class="col-sm-4">
						        	<label for="food_allergy" class="control-label">Allergy to Food/s</label>
						          <input type="text" class="form-control" name="food_allergy">
						        </div>
						    		          
						        <div class="col-sm-4">
						        	<label for="medicine_allergy" class="control-label">Allergy to Medication/s</label>
						         <input type="text" class="form-control" name="medicine_allergy">
						        </div>

						      </div>

						      <hr>
						      <h5 id="ptitle2"><b>I. <u>Subjective Complaint/s: </u></b></h5>

						      <div class="form-group">

						        <div class="col-sm-12">
						        	<label for="chief_complaints" class="control-label">Chief Complaints</label>
						          <input type="text" class="form-control" name="chief_complaints">
						        </div>
						    		          
						      </div>
						      <div class="form-group">
						    		          
						        <div class="col-sm-12">
						        	<label for="history_presentillness" class="control-label">History of Present Illness</label>
						         <textarea row="3" class="form-control" name="history_presentillness"></textarea>
						        </div>

						      </div>
						      <hr>
						      <h5 id="ptitle3"><b>Past Medical History: </b></h5>

						      <div class="form-group">

						        <div class="col-sm-6">
						        	<label for="hypertension_meds" class="control-label">Hypertension meds</label>
						          <input type="text" class="form-control" name="hypertension_meds">
						        </div>

						        <div class="col-sm-6">
						        	<label for="diabetes_meds" class="control-label">Diabetes Mellitus meds</label>
						          <input type="text" class="form-control" name="diabetes_meds">
						        </div>
						    		          
						      </div>

						      <div class="form-group">

						        <div class="col-sm-6">
						        	<label for="bronchial_meds" class="control-label">Bronchial Asthma meds</label>
						          <input type="text" class="form-control" name="bronchial_meds">
						        </div>

						        <div class="col-sm-6">
						        	<label for="last_attack" class="control-label">Last Attack</label>
						          <input type="date" class="form-control" name="last_attack">
						        </div>
						    		          
						      </div>

						      <div class="form-group">

						        <div class="col-sm-6">
						        	<label for="other_hldse" class="control-label">Other Heart/Lung Dse.</label>
						          <input type="text" class="form-control" name="other_hldse">
						        </div>

						        <div class="col-sm-6">
						        	<label for="operation" class="control-label">Operation</label>
						          <input type="text" class="form-control" name="operation">
						        </div>
						    		          
						      </div>

									<hr>
						      <h5 id="ptitle2"><b>II. <u>Objective Findings: </u></b></h5>

						      <div class="form-group">

						        <div class="col-sm-4">
						        	<label for="bp" class="control-label">BP</label>
						          <input type="text" class="form-control" name="bp" placeholder="mmhg">
						        </div>

						        <div class="col-sm-4">
						        	<label for="heart_rate" class="control-label">Heart Rate</label>
						          <input type="text" class="form-control" name="heart_rate" placeholder="bpm">
						        </div>

						        <div class="col-sm-4">
						        	<label for="respiratory_rate" class="control-label">Respiratory Rate</label>
						          <input type="text" class="form-control" name="respiratory_rate" placeholder="mmhg">
						        </div>
						    		          
						      </div>

						      <div class="form-group">

						        <div class="col-sm-4">
						        	<label for="temperature" class="control-label">Temperature °C</label>
						          <input type="number" class="form-control" name="temperature" placeholder="°C">
						        </div>

						        <div class="col-sm-4">
						        	<label for="weight" class="control-label">Weight</label>
						          <input type="number" class="form-control" name="weight" placeholder="kg">
						        </div>

						        <div class="col-sm-4">
						        	<label for="height" class="control-label">Height</label>
						          <input type="number" class="form-control" name="height" placeholder="cm">
						        </div>
						    		          
						      </div>

						      <div class="form-group">
						    		          
						        <div class="col-sm-12">
						        	<label for="physical_exam" class="control-label">Physical Examination</label>
						         <textarea row="3" class="form-control" name="physical_exam"></textarea>
						        </div>

						      </div>

						      <hr>
						      <h5 id="ptitle2"><b>III. <u>Assessment/Classification: </u></b></h5>

						      <div class="form-group">
						    		          
						        <div class="col-sm-12">
						         <textarea row="3" class="form-control" name="assessment"></textarea>
						        </div>

						      </div>

						      <hr>
						      <h5 id="ptitle2"><b>III. <u>Plan of Management: (Treat/Refer/Health Educate) </u></b></h5>

						      <div class="form-group">
						    		          
						        <div class="col-sm-12">
						         <textarea row="3" class="form-control" name="management_plan"></textarea>
						        </div>

						      </div>

						      <div class="form-group">

						        <div class="col-sm-4">
						        	<label for="service_provider" class="control-label">Name of Service Provider</label>
						          <input type="text" class="form-control" name="service_provider">
						        </div>

						      </div>
						      <hr>
						      <button type="submit" style="color: white; float: right;" class="btn btn-success btn-sm btn-flat">Save Record</button>
						      <a href="<?=site_url('patient/patient_records'); ?>" class='btn btn-danger btn-sm btn-flat' style="color: white; float: right;  margin-right: 5px;"> Cancel</a>
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