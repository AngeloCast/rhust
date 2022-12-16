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
			
			<div class="row" style="margin-top: 20px;">
            <div class="col-md-6 text-left">
                <h4>
                <b><i class="fas fa-edit"></i> COVID Vaccination Record</b>
                </h4>
            </div>
            <div class="col-md-6 text-right">
                <a href="#delvaccination_<?=$data[2]['id']?>" data-toggle="modal" class="btn btn-danger btn-md btn-flat"><i class="fa fa-trash"></i> Delete</a>
            </div>
      </div>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Vaccination Record</li>
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
								<form class="form-horizontal" action="<?=site_url('vaccination/update_vaccinationrecord');?>" method="post">
									<input type="hidden" name="id" value="<?=$data[2]['id']; ?>">
									<div class="form-group">
											<h5 id="ptitle"><b>Covid Vaccination Details: </b></h5>
						        	
                      <div class="col-sm-3">
                          <label for="priority_group" class="control-label">Priority Group</label>
                        <input type="text" class="form-control" name="priority_group" value="<?=$data[2]['priority_group']; ?>" required>
                      </div>

                      <div class="col-sm-3">
                          <label for="uniqueperson_id" class="control-label">Unique Person ID</label>
                          <input type="num" class="form-control" name="uniqueperson_id" value="<?=$data[2]['uniqueperson_id']; ?>" required>
                      </div>
                  </div>
                  <hr>
                  <div class="form-group">
                  	<div class="col-sm-3">
                  	<?php
                  		if($data[2]['indigenous_member'] == 'no'){
                  			echo '<input type="hidden" name="indigenous_member" value="no">
					                  	<label for="indigenous_member" class="control-label">
									                <input type="checkbox" name="indigenous_member" value="yes"> Indigenous Member
									            </label>';
                  		}
                  		elseif($data[2]['indigenous_member'] == 'yes'){
                  			echo '<input type="hidden" name="indigenous_member" value="no">
					                  	<label for="indigenous_member" class="control-label">
									                <input type="checkbox" name="indigenous_member" checked value="yes"> Indigenous Member
									            </label>';
                  		}
                  	?>
                  	</div>

				            <div class="col-sm-3">
				            	<?php
                  		if($data[2]['pwd'] == 'no'){
                  			echo '<input type="hidden" name="pwd" value="no">
					                  	<label for="pwd" class="control-label">
									              <input type="checkbox" name="pwd" value="yes"> PWD
									            </label>';
                  		}
                  		elseif($data[2]['pwd'] == 'yes'){
                  			echo '<input type="hidden" name="pwd" value="no">
					                  	<label for="pwd" class="control-label">
									              <input type="checkbox" name="pwd" checked value="yes"> PWD
									            </label>';
                  		}
                  		?>
	                  	
					          </div>

						     	</div>
						     	<hr>
									<div class="form-group">
						        	
                      <div class="col-sm-3">
                          <label for="lastname" class="control-label">Last Name</label>
                        <input type="text" class="form-control" name="lastname" value="<?=$data[2]['lastname']; ?>"  pattern="[a-zA-Z, ]+" title="Only letters are allowed!" required>
                      </div>
                      
                      <div class="col-sm-3">
                      	<label for="firstname" class="control-label">First Name</label>
                        <input type="text" class="form-control" name="firstname" value="<?=$data[2]['firstname']; ?>" pattern="[a-zA-Z, ]+" title="Only letters are allowed!" required>
                      </div>

                      <div class="col-sm-3">
                          <label for="middlename" class="control-label">Middle Name</label>
                          <input type="text" class="form-control" name="middlename" value="<?=$data[2]['middlename']; ?>" pattern="[a-zA-Z, ]+" title="Only letters are allowed!" required>
                      </div>

                      <div class="col-sm-2">
                          <label for="suffix" class="control-label">Suffix</label>
                          <input type="text" class="form-control" name="suffix" value="<?=$data[2]['suffix']; ?>" pattern="[a-zA-Z, ]+" title="Only letters are allowed!">
                      </div>


						     	</div>

						     	<div class="form-group">

						     		<div class="col-sm-3">
						        	<label for="birthday" class="control-label">Birthday</label>
						          <input type="date" class="form-control" name="birthday" value="<?=$data[2]['birthday']; ?>">
						        </div>

										<div class="col-sm-3">
											<label for="sex" class="control-label">Sex</label>
							        <select class="form-control" name="sex">
							          <?php 
                          if($data[2]['sex'] == 'M'){
                            echo '<option value="'.$data[2]['sex'].'" selected>Male</option>
                                      <option value="F">Female</option> <option value="O">Other</option>';
                          }
                          else if($data[2]['sex'] == 'F'){
                            echo '<option value="'.$data[2]['sex'].'" selected>Female</option>
                                      <option value="M">Male</option> <option value="O">Other</option>';
                          }
                          else if($data[2]['sex'] == 'O'){
                            echo '<option value="'.$data[2]['sex'].'" selected>Other</option>
                                      <option value="M">Male</option> <option value="F">Female</option>';
                          }
                          else{
                            echo '<option value="'.$data[2]['sex'].'" selected>Not set</option>
                                      <option value="M">Male</option> <option value="F">Female</option> <option value="O">Other</option>';
                          }
                        ?>
							        </select>
						        </div>

						        <div class="col-sm-3">
						        	<label for="cnumber" class="control-label">Contact Number</label>
						          <input type="tel" class="form-control" pattern="[0-9]{10}" title="Enter 10 digit number" id="cnumber" name="cnumber" placeholder="10 digit number" value="<?=$data[2]['cnumber']; ?>">
						        </div>

						      </div>
						     	<hr>
						     	<div class="form-group">
						        
						        <div class="col-sm-3">
						        	<label for="region" class="control-label">Region</label>
						          <input type="text" class="form-control" name="region" value="<?=$data[2]['region']; ?>">
						        </div>

						        <div class="col-sm-3">
						        	<label for="province" class="control-label">Province</label>
						          <input type="text" class="form-control" name="province" value="<?=$data[2]['province']; ?>">
						        </div>
						      	
						      	<div class="col-sm-3">
						        	<label for="municipality" class="control-label">Municipality</label>
						          <input type="text" class="form-control" name="municipality" value="<?=$data[2]['municipality']; ?>">
						        </div>
						        
						        <div class="col-sm-3">
						        	<label for="barangay" class="control-label">Barangay</label>
						          <input type="text" class="form-control" name="barangay" value="<?=$data[2]['barangay']; ?>">
						        </div>
						    		          
						      </div>
						      <hr>

						      <div class="form-group">
						        <div class="col-sm-3">
						        	<label for="vaccination_info" class="control-label">Vaccination Information</label>
						          <select class="form-control" name="vaccination_info">
						          	<?php 
                          if($data[2]['vaccination_info'] == '1st Dose'){
                            echo '<option value="'.$data[2]['vaccination_info'].'" selected>1st Dose</option>
                                      <option value="2nd Dose">2nd Dose</option>
                                      <option value="1st Booster">1st Booster</option>
                                      <option value="2nd Booster">2nd Booster</option>
                                      ';
                          }
                          else if($data[2]['vaccination_info'] == '2nd Dose'){
                            echo '<option value="'.$data[2]['vaccination_info'].'" selected>2nd Dose</option>
                                      <option value="1st Dose">1st Dose</option>
                                      <option value="1st Booster">1st Booster</option>
                                      <option value="2nd Booster">2nd Booster</option>
                                      ';
                          }
                          else if($data[2]['vaccination_info'] == '1st Booster'){
                            echo '<option value="'.$data[2]['vaccination_info'].'" selected>1st Booster</option>
                            					<option value="1st Dose">1st Dose</option>
                                      <option value="2nd Dose">2nd Dose</option>
                                      <option value="2nd Booster">2nd Booster</option>
                                      ';
                          }
                          else if($data[2]['vaccination_info'] == '2nd Booster'){
                            echo '<option value="'.$data[2]['vaccination_info'].'" selected>2nd Booster</option>
                                      <option value="1st Dose">1st Dose</option>
                                      <option value="2nd Dose">2nd Dose</option>
                                      <option value="1st Booster">1st Booster</option>
                                      ';//GAWING NONE ANG OPTIOn
                          }
                          else{
                            echo '<option value="'.$data[2]['vaccination_info'].'" selected>Not set</option>
                            					<option value="1st Dose">1st Dose</option>
                                      <option value="2nd Dose">2nd Dose</option>
                                      <option value="1st Booster">1st Booster</option>
                                      <option value="2nd Booster">2nd Booster</option>';
                          }
                        ?>
							        </select>
						        </div>

						        <div class="col-sm-3">
						        	<label for="vaccinator" class="control-label">Vaccinator Name</label>
						          <input type="text" class="form-control" name="vaccinator" value="<?=$data[2]['vaccinator']; ?>">
						        </div>

						        <div class="col-sm-3">
						        	<label for="vaccination_date" class="control-label">Date of Vaccination</label>
						          <input type="date" class="form-control" name="vaccination_date" value="<?=$data[2]['vaccination_date']; ?>">
						        </div>

						        <div class="col-sm-3">
						        	<label for="lot_number" class="control-label">Lot Number</label>
						          <input type="text" class="form-control" name="lot_number" value="<?=$data[2]['lot_number']; ?>">
						        </div>
   									
						      </div>
						     
						      <hr>
						      <button type="submit" style="color: white; float: right;" class="btn btn-success btn-sm btn-flat">Save Changes</button>
						      <a href="<?=site_url('vaccination/vaccination_records'); ?>" class='btn btn-danger btn-sm btn-flat' style="color: white; float: right;  margin-right: 5px;"> Cancel</a>
								</form>
							</div>
						</div>			
					</div>
				</div>
			</div>
    </section>
    <!-- DELETE VACCINATION-->

		<div class="modal fade" id="delvaccination_<?=$data[2]['id']?>">
		    <div class="modal-dialog modal-xs">
		        <div class="modal-content">
		            <div class="modal-header">
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                  <span aria-hidden="true">&times;</span></button>
		              <h4 class="modal-title"><b>DELETE VACCINATION RECORD</b></h4>
		            </div>
		            <div class="modal-body" style="padding: 30px;">
		              <form class="form-horizontal" method="POST" action="<?=site_url('vaccination/delete_vaccinationrecord/'.$data[2]['id']);?>">
		                <h3 class="text-center">You are deleting <b><?=$data[2]['firstname'] . ' ' . $data[2]['lastname'];?>'s</b> record.</h3>
		                <h4 class="text-center">DO YOU WANT TO CONTINUE?</h4>
		            </div>
		            <div class="modal-footer">
		              <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i> Confirm Delete</button>
		              </form>
		            </div>
		        </div>
		    </div>
		</div>
  </div>
  	<?php include 'includes/footer.php'; ?>
  	<?php include 'includes/scripts.php'; ?>
</div>

</body>
</html>