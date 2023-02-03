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
    	<?php
				if($data[2]['type'] == 0){
					echo '<a href="'.site_url('patient/patient_records').'" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-arrow-left"></i> Back</a>';
				}
				else{
					echo '<a href="'.site_url('patient/follow_up_records').'" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-arrow-left"></i> Back</a>';
				}
			?>
    	 
				
			<div class="row" style="margin-top: 20px;">
				<div class="col-md-4 text-left">
					<div class="dropdown">
						<button class="btn btn-info dropdown-toggle" type="button" id="about-us" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-list"></i>
						Patient's Records
						<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="about-us">
						<?php
							foreach($data[3] as $records)
							{
								if($records['type'] == 0){
									if($records['id'] == $data[2]['id'])
									{
										echo '<li><a href="'.site_url('patient/edit_patientrecord/'.$records['id']).'"><i class="fa fa-circle"></i> <b>INITIAL | '.$records['date_created'].'</b></a></li>';
									}
									else
									{
										echo '<li><a href="'.site_url('patient/edit_patientrecord/'.$records['id']).'"><i class="fa fa-circle-o"></i> INITIAL | '.$records['date_created'].'</a></li>';
									}
									
								}
								else{
									if($records['id'] == $data[2]['id'])
									{
										echo '<li><a href="'.site_url('patient/edit_patientrecord/'.$records['id']).'"><i class="fa fa-circle"></i> <b>FOLLOW-UP | '.$records['date_created'].'</b></a></li>';
									}
									else
									{
										echo '<li><a href="'.site_url('patient/edit_patientrecord/'.$records['id']).'"><i class="fa fa-circle-o"></i> FOLLOW-UP | '.$records['date_created'].'</a></li>';
									}
								}

							}
						?>
						</ul>
					</div>
					
				</div>
				
				<div class="col-md-8 text-right">
					<button onclick="window.location.href='<?=site_url('patient/follow_up/'.$data[2]['id']);?>';" class="btn btn-success btn-md btn-flat"><i class='fa fa-plus'></i> Follow Up</button>
          <button onclick="window.location.href='<?=site_url('dopdf/generate_patientrecord/'.$data[2]['id']); ?>';" class="btn btn-warning btn-md btn-flat"><i class='fa fa-file-pdf-o'></i> PDF</button>
					<a href="#delpatientrecords_<?=$data[2]['id']?>" data-toggle="modal" class="btn btn-danger btn-md btn-flat"><i class="fa fa-trash"></i> Delete</a>

				</div>
					
			</div>

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Patient Record</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content" style="padding-top: 0;">
    	<br>
      <?php include('includes/message.php')?>
      <div class="row">
        <div class="col-sm-12 mx-auto">
        	<div class="row">
        		<div class="col-sm-12">
        			<h5 style="float: right; margin-bottom: 5px;"><b>Last Edited:</b> <u><?php echo date('M j, Y h:i A', strtotime($data[2]['last_edited']));?></u></h5>
        		</div>
        	</div>
          <div class="box" style="padding: 20px;">
          	
          	<div class="box-header with-border">
          		<h4>
				        <b><i class="fa fa-edit"></i> Individual Treatment Record - </b>
				        <b style="background-color: #50c73a; color: white; padding: 0px 5px 0px 5px; border-radius: 5px;"><?php if($data[2]['type'] == 0){echo 'INITIAL RECORD';}else{echo 'FOLLOW-UP RECORD';}?> </b>
				      </h4>
          	</div>
			      <div class="box-body">
			        <div class= "col-lg-12">
								<form class="form-horizontal" action="<?=site_url('patient/update_patientrecord');?>" method="post">
									<input type="hidden" name="id" value="<?=$data[2]['id']; ?>">
									<input type="hidden" name="p_id" value="<?=$data[2]['p_id']; ?>">
									<input type="hidden" name="type" value="<?=$data[2]['type']; ?>">
									<div class="form-group">
										<br>
											<h5 id="ptitle"><b>A. <u>Patient's Personal Profile: </u></b></h5>
						        	
                      <div class="col-sm-4">
                          <label for="lastname" class="control-label">Last Name</label>
                        <input type="text" class="form-control" name="lastname" value="<?=$data[2]['lastname']; ?>"  pattern="[a-zA-Z, ]+" title="Only letters are allowed!" required>
                      </div>
                      
                      <div class="col-sm-4">
                      	<label for="firstname" class="control-label">First Name</label>
                        <input type="text" class="form-control" name="firstname" value="<?=$data[2]['firstname']; ?>"  pattern="[a-zA-Z, ]+" title="Only letters are allowed!" required>
                      </div>

                      <div class="col-sm-4">
                          <label for="middlename" class="control-label">Middle Name</label>
                          <input type="text" class="form-control" name="middlename" value="<?=$data[2]['middlename']; ?>"  pattern="[a-zA-Z, ]+" title="Only letters are allowed!" required>
                      </div>

						     	</div>

						     	<div class="form-group">

						        <div class="col-sm-2">
						        	<label for="age" class="control-label">Age</label>
						          <input type="number" class="form-control" name="age" value="<?=$data[2]['age']; ?>" >
						        </div>

						        
										<div class="col-sm-2">
											<label for="gender" class="control-label">Gender</label>
							        <select class="form-control" name="gender">
							          <?php 
                          if($data[2]['gender'] == 'M'){
                            echo '<option value="'.$data[2]['gender'].'" selected>Male</option>
                                      <option value="F">Female</option> <option value="O">Other</option>';
                          }
                          else if($data[2]['gender'] == 'F'){
                            echo '<option value="'.$data[2]['gender'].'" selected>Female</option>
                                      <option value="M">Male</option> <option value="O">Other</option>';
                          }
                          else if($data[2]['gender'] == 'O'){
                            echo '<option value="'.$data[2]['gender'].'" selected>Other</option>
                                      <option value="M">Male</option> <option value="F">Female</option>';
                          }
                          else{
                            echo '<option value="'.$data[2]['gender'].'" selected>Not set</option>
                                      <option value="M">Male</option> <option value="F">Female</option> <option value="O">Other</option>';
                          }
                        ?>
							        </select>
						        </div>

						        <div class="col-sm-4">
						        	<label for="birthday" class="control-label">Birthday</label>
						          <input type="date" class="form-control" name="birthday" value="<?=$data[2]['birthday']; ?>" >
						        </div>

						        <div class="col-sm-4">
						        	<label for="civil_status" class="control-label">Civil Status</label>
						          <input type="text" class="form-control" name="civil_status" value="<?=$data[2]['civil_status']; ?>" >
						        </div>

						        
						      </div>
						     	
						     	<div class="form-group">
						        
						        <div class="col-sm-6">
						        	<label for="contact_person" class="control-label">Parent/Guardian/Contact Person</label>
						          <input type="text" class="form-control" name="contact_person" value="<?=$data[2]['contact_person']; ?>" >
						        </div>

						        <div class="col-sm-6">
						        	<label for="address" class="control-label">Address</label>
						          <input type="text" placeholder="Barangay, Municipality" class="form-control" name="address" value="<?=$data[2]['address']; ?>" >
						        </div>
   
						      </div>
						      <div class="form-group">
						      	
						      	<div class="col-sm-6">
						        	<label for="cnumber" class="control-label">Contact Number</label>
						          <input type="tel" class="form-control" pattern="[0-9]{10}" title="Enter 10 digit number" id="cnumber" name="cnumber" value="<?=$data[2]['cnumber']; ?>"  placeholder="10 digit number">
						        </div>
						        
						        <div class="col-sm-6">
						        	<label for="health_insurance" class="control-label">Health Insurance Membership</label>
						          <input type="text" class="form-control" name="health_insurance" value="<?=$data[2]['health_insurance']; ?>" >
						        </div>
						    		          
						      </div>

						      <div class="form-group">
						        
						        <div class="col-sm-4">
						        	<label for="religion" class="control-label">Religion</label>
						          <input type="text" class="form-control" name="religion" value="<?=$data[2]['religion']; ?>" >
						        </div>

						        <div class="col-sm-2">
						        	<label for="blood_type" class="control-label">Blood Type</label>
						          <input type="text" class="form-control" name="blood_type" value="<?=$data[2]['blood_type']; ?>" >
						        </div>
   
						      </div>

						      <hr>

						      <div class="form-group">

						      	<h5 id="ptitle"><b>B. <u>Patient Case Summary: </u></b></h5>

						        <div class="col-sm-4">
						        	<label for="visit_date" class="control-label">Date of visit</label>
						          <input type="date" class="form-control" name="visit_date" value="<?=$data[2]['visit_date']; ?>" >
						        </div>
						    		          
						        <div class="col-sm-4">
						        	<label for="visit_time" class="control-label">Time of visit</label>
						         <input type="time" class="form-control" name="visit_time" value="<?=$data[2]['visit_time']; ?>" >
						        </div>

						        <div class="col-sm-4">
						        	<label for="age_months" class="control-label">Age in months (if under 5 years old)</label>
						          <input type="number" class="form-control" name="age_months" value="<?=$data[2]['age_months']; ?>" >
						        </div>
						      </div>

						      <div class="form-group">

						        <div class="col-sm-4">
						        	<label for="food_allergy" class="control-label">Allergy to Food/s</label>
						          <input type="text" class="form-control" name="food_allergy" value="<?=$data[2]['food_allergy']; ?>" >
						        </div>
						    		          
						        <div class="col-sm-4">
						        	<label for="medicine_allergy" class="control-label">Allergy to Medication/s</label>
						         <input type="text" class="form-control" name="medicine_allergy" value="<?=$data[2]['medicine_allergy']; ?>" >
						        </div>

						      </div>

						      <hr>
						      <h5 id="ptitle2"><b>I. <u>Subjective Complaint/s: </u></b></h5>

						      <div class="form-group">

						        <div class="col-sm-12">
						        	<label for="chief_complaints" class="control-label">Chief Complaints</label>
						          <input type="text" class="form-control" name="chief_complaints" value="<?=$data[2]['chief_complaints']; ?>" >
						        </div>
						    		          
						      </div>
						      <div class="form-group">
						    		          
						        <div class="col-sm-12">
						        	<label for="history_presentillness" class="control-label">History of Present Illness</label>
						         <textarea row="3" class="form-control" name="history_presentillness"><?=$data[2]['history_presentillness']; ?></textarea>
						        </div>

						      </div>
						      <hr>
						      <h5 id="ptitle3"><b>Past Medical History: </b></h5>

						      <div class="form-group">

						        <div class="col-sm-6">
						        	<label for="hypertension_meds" class="control-label">Hypertension meds</label>
						          <input type="text" class="form-control" name="hypertension_meds" value="<?=$data[2]['hypertension_meds']; ?>" >
						        </div>

						        <div class="col-sm-6">
						        	<label for="diabetes_meds" class="control-label">Diabetes Mellitus meds</label>
						          <input type="text" class="form-control" name="diabetes_meds" value="<?=$data[2]['diabetes_meds']; ?>" >
						        </div>
						    		          
						      </div>

						      <div class="form-group">

						        <div class="col-sm-6">
						        	<label for="bronchial_meds" class="control-label">Bronchial Asthma meds</label>
						          <input type="text" class="form-control" name="bronchial_meds" value="<?=$data[2]['bronchial_meds']; ?>" >
						        </div>

						        <div class="col-sm-6">
						        	<label for="last_attack" class="control-label">Last Attack</label>
						          <input type="date" class="form-control" name="last_attack" value="<?=$data[2]['last_attack']; ?>" >
						        </div>
						    		          
						      </div>

						      <div class="form-group">

						        <div class="col-sm-6">
						        	<label for="other_hldse" class="control-label">Other Heart/Lung Dse.</label>
						          <input type="text" class="form-control" name="other_hldse" value="<?=$data[2]['other_hldse']; ?>" >
						        </div>

						        <div class="col-sm-6">
						        	<label for="operation" class="control-label">Operation</label>
						          <input type="text" class="form-control" name="operation" value="<?=$data[2]['operation']; ?>" >
						        </div>
						    		          
						      </div>

									<hr>
						      <h5 id="ptitle2"><b>II. <u>Objective Findings: </u></b></h5>

						      <div class="form-group">

						        <div class="col-sm-4">
						        	<label for="bp" class="control-label">BP</label>
						          <input type="text" class="form-control" name="bp" value="<?=$data[2]['bp']; ?>"  placeholder="mmhg">
						        </div>

						        <div class="col-sm-4">
						        	<label for="heart_rate" class="control-label">Heart Rate</label>
						          <input type="text" class="form-control" name="heart_rate" value="<?=$data[2]['heart_rate']; ?>"  placeholder="bpm">
						        </div>

						        <div class="col-sm-4">
						        	<label for="respiratory_rate" class="control-label">Respiratory Rate</label>
						          <input type="text" class="form-control" name="respiratory_rate" value="<?=$data[2]['respiratory_rate']; ?>"  placeholder="mmhg">
						        </div>
						    		          
						      </div>

						      <div class="form-group">

						        <div class="col-sm-4">
						        	<label for="temperature" class="control-label">Temperature °C</label>
						          <input type="number" class="form-control" name="temperature" value="<?=$data[2]['temperature']; ?>"  placeholder="°C">
						        </div>

						        <div class="col-sm-4">
						        	<label for="weight" class="control-label">Weight</label>
						          <input type="number" class="form-control" name="weight" value="<?=$data[2]['weight']; ?>"  placeholder="kg">
						        </div>

						        <div class="col-sm-4">
						        	<label for="height" class="control-label">Height</label>
						          <input type="number" class="form-control" name="height" value="<?=$data[2]['height']; ?>"  placeholder="cm">
						        </div>
						    		          
						      </div>

						      <div class="form-group">
						    		          
						        <div class="col-sm-12">
						        	<label for="physical_exam" class="control-label">Physical Examination</label>
						         <textarea row="3" class="form-control" name="physical_exam"><?=$data[2]['physical_exam']; ?></textarea>
						        </div>

						      </div>

						      <hr>
						      <h5 id="ptitle2"><b>III. <u>Assessment/Classification: </u></b></h5>

						      <div class="form-group">
						    		          
						        <div class="col-sm-12">
						         <textarea row="3" class="form-control" name="assessment"><?=$data[2]['assessment']; ?></textarea>
						        </div>

						      </div>

						      <hr>
						      <h5 id="ptitle2"><b>III. <u>Plan of Management: (Treat/Refer/Health Educate) </u></b></h5>

						      <div class="form-group">
						    		          
						        <div class="col-sm-12">
						         <textarea row="3" class="form-control" name="management_plan"><?=$data[2]['management_plan']; ?></textarea>
						        </div>

						      </div>

						      <div class="form-group">

						        <div class="col-sm-4">
						        	<label for="service_provider" class="control-label">Name of Service Provider</label>
						          <input type="text" class="form-control" name="service_provider" value="<?=$data[2]['service_provider']; ?>" >
						        </div>

						      </div>
						      <hr>
						      <button type="submit" style="color: white; float: right;" class="btn btn-success btn-md btn-flat"><i class="fa fa-save"></i> Save Changes</button>
						      <a href="<?=site_url('patient/patient_records'); ?>" class='btn btn-danger btn-md btn-flat' style="color: white; float: right;  margin-right: 5px;"> Cancel</a>
								</form>
							</div>
						</div>			
					</div>
				</div>
			</div>
			<!-- DELETE PATIENT RECORD -->

			<div class="modal fade" id="delpatientrecords_<?=$data[2]['id']?>">
			    <div class="modal-dialog modal-xs">
			        <div class="modal-content">
			            <div class="modal-header">
			              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                  <span aria-hidden="true">&times;</span></button>
			              <h4 class="modal-title"><b>DELETE PATIENT RECORD</b></h4>
			            </div>
			            <div class="modal-body" style="padding: 30px;">
			            	<form class="form-horizontal" method="POST" action="<?=site_url('patient/delete_patient_record/'.$data[2]['type'].'/'.$data[2]['id'])?>">
			                <h3 class="text-center">You are deleting <b><u><?=$data[2]['firstname'] . ' ' . $data[2]['lastname'];?>'s</u></b> record.</h3>
			                <h4 class="text-center">DO YOU WANT TO CONTINUE?</h4>
			            </div>
			            <div class="modal-footer">
			              <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> Confirm Delete</button>
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