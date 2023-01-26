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
  h1{
    overflow: hidden;
    text-align: center;
  }
  h1.hr-lines{
    color: darkslategray;
    font-size: 20px;
  }
  h1:before,
  h1:after {
    background-color: gray;
    content: "";
    display: inline-block;
    height: 1px;
    position: relative;
    vertical-align: middle;
    width: 50%;
    max-width: 100%;
  }

  h1:before {
    right: 0.5em;
    margin-left: -50%;
  }

  h1:after {
    left: 0.5em;
    margin-right: -50%;
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
                <b><i class="fas fa-edit"></i> COVID Vaccination Record- </b><i><?php echo 'Last edited: '.date('M j, Y h:i A', strtotime($data[2]['last_edited']));?></i>
                </h4>
            </div>
            <div class="col-md-6 text-right">
                <a href="#delvaccrecord" data-toggle="modal" class="btn btn-danger btn-md btn-flat"><i class="fa fa-trash"></i> Delete</a>
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
						      <button type="submit" style="color: white; float: right;" class="btn btn-success btn-md btn-flat"><i class="fa fa-save"></i> Save Changes</button>
						      <a href="<?=site_url('vaccination/vaccination_records'); ?>" class='btn btn-danger btn-md btn-flat' style="color: white; float: right;  margin-right: 5px;"> Cancel</a>
								</form>
							</div>
						</div>			
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<h1 class="hr-lines">VACCINATION DOSE DETAILS</h1>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12 mx-auto">
			    <div class="box" style="padding: 20px;">
					  <div class="box-header with-border">
					    <button data-toggle="modal" class="btn btn-primary btn-sm btn-flat" data-target="#add_vacc_dose"><i class="fa fa-plus"></i> New Dose</button>
					  </div>      
					  <div class="box-body">
					    <table id="example1" class="table table-bordered">
					      <thead>
					        <th>Dose</th>
					        <th>Vaccinator</th>  
					        <th>Vaccination Date</th>
					        <th>Lot Number</th>
					        <th>Manage</th>
					      </thead>
					      <tbody>
					        <?php foreach ($data[3] as $row):?>
					        <tr>
					          <td><?=$row['vacc_info']; ?></td>
					          <td><?=$row['vaccinator']; ?></td>
					          <td><?=$row['date']; ?></td>
					          <td><?=$row['lot_number'];?></td>
					          <td>
					            <button data-toggle="modal" data-id="<?=$row['id'];?>" class='btn btn-success btn-xs btn-flat editvaccdetail'><i class='fa fa-edit'></i> Edit</button>
					            <button data-toggle="modal" data-id="<?=$row['id'];?>" class="btn btn-danger btn-xs btn-flat delvaccdetail"><i class="fa fa-trash"></i> Delete</button>
					          </td>
					        </tr>
					        
					        <?php endforeach ?>
					      </tbody>
					    </table>
					  </div>
					</div>
				</div>
			</div>
    </section>


  <?php include 'vaccination_details.php'; ?>

  </div>
  	<?php include 'includes/footer.php'; ?>
  	<?php include 'includes/scripts.php'; ?>
</div>
<script type='text/javascript'>
$(document).ready(function(){

    $('.delvaccdetail').click(function(){
        var vaccid = $(this).data('id');
        $.ajax({
            url: '<?php echo site_url('vaccination/get_details');?>',
            type: 'post',
            data: {vaccid: vaccid},
            success: function(response){ 
                $('.vacc_detail').html(response); 
                $('#delModal').modal('show'); 
            }
        });
    });

    $('.editvaccdetail').click(function(){
        var vaccid = $(this).data('id');
        $.ajax({
            url: '<?php echo site_url('vaccination/get_vacc_details');?>',
            type: 'post',
            data: {vaccid: vaccid},
            success: function(response){ 
                $('.vacc_edit_detail').html(response); 
                $('#editModal').modal('show'); 
            }
        });
    });
});
</script>
</body>
</html>