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

        <div class="row" style="margin-top: 20px;">
            <div class="col-md-6 text-left">
                <h4>
                <b><i class="fa fa-edit"></i> COVID Case Details - </b><i><?php echo 'Last edited: '.date('M j, Y h:i A', strtotime($data[2]['last_edited']));?></i>
                </h4>
            </div>
            <div class="col-md-6 text-right">
                <a href="#delcovidrecords_<?=$data[2]['id']?>" data-toggle="modal" class="btn btn-danger btn-md btn-flat"><i class="fa fa-trash"></i> Delete</a>
            </div>
        </div>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Covid Case</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="padding-top: 0;">
      <?php include('includes/message.php')?>
      <div class="row">
        <div class="col-sm-12 mx-auto">
          <div class="box" style="padding: 20px;">
                <div class="box-body">
                    <div class= "col-lg-12">
                        <form class="form-horizontal" action="<?=site_url('covid/update_covidcase');?>" method="post">
                            <input type="hidden" name="id" value="<?=$data[2]['id']; ?>">
                            <div class="form-group">
                                <h5 id="ptitle"><b>Covid Case Details: </b></h5>
                                    
                                <div class="col-sm-4">
                                    <label for="case_no" class="control-label">Case No.</label>
                                    <input type="number" class="form-control" name="case_no" value="<?=$data[2]['case_no'];?>" required>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="release_date" class="control-label">Release Date</label>
                                    <input type="date" class="form-control" name="release_date" value="<?=$data[2]['release_date'];?>">
                                </div>
                                    
                                <div class="col-sm-4">
                                    <label for="antigen_date" class="control-label">Date of Antigen</label>
                                    <input type="date" class="form-control" name="antigen_date" value="<?=$data[2]['antigen_date'];?>">
                                </div>

                                <div class="col-sm-4">
                                    <label for="rtpcr_date" class="control-label">Date of RTPCR</label>
                                    <input type="date" class="form-control" name="rtpcr_date" value="<?=$data[2]['rtpcr_date'];?>">
                                </div>

                            </div>

                            <div class="form-group">
                                    
                                <div class="col-sm-4">
                                    <label for="lastname" class="control-label">Last Name</label>
                                    <input type="text" class="form-control" name="lastname"  pattern="[a-zA-Z, ]+" title="Only letters are allowed!" value="<?=$data[2]['lastname'];?>" required>
                                </div>
                      
                                <div class="col-sm-4">
                                    <label for="firstname" class="control-label">First Name</label>
                                    <input type="text" class="form-control" name="firstname" pattern="[a-zA-Z, ]+" title="Only letters are allowed!" value="<?=$data[2]['firstname'];?>" required>
                                </div>

                                <div class="col-sm-4">
                                    <label for="middlename" class="control-label">Middle Name</label>
                                    <input type="text" class="form-control" name="middlename" pattern="[a-zA-Z, ]+" title="Only letters are allowed!" value="<?=$data[2]['middlename'];?>" required>
                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-sm-4">
                                    <label for="birthday" class="control-label">Birthday</label>
                                    <input type="date" class="form-control" name="birthday" value="<?=$data[2]['birthday'];?>">
                                </div>

                                <div class="col-sm-2">
                                    <label for="age" class="control-label">Age</label>
                                    <input type="number" class="form-control" name="age" value="<?=$data[2]['age'];?>">
                                </div>

                                <div class="col-sm-2">
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

                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label for="cnumber" class="control-label">Contact Number</label>
                                  <input type="tel" class="form-control" pattern="[0-9]{10}" title="Enter 10 digit number" id="cnumber" name="cnumber" placeholder="10 digit number" value="<?=$data[2]['cnumber'];?>">
                                </div>

                                <div class="col-sm-4">
                                    <label for="address" class="control-label">Address</label>
                                  <input type="text" class="form-control" id="address" name="address" value="<?=$data[2]['address'];?>">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                
                                <div class="col-sm-4">
                                    <label for="contact_nature" class="control-label">Nature of Contact</label>
                                  <input type="text" class="form-control" name="contact_nature" value="<?=$data[2]['contact_nature'];?>">
                                </div>

                                <div class="col-sm-4">
                                    <label for="last_exposure" class="control-label">Date of Last Exposure</label>
                                  <input type="date" class="form-control" name="last_exposure" value="<?=$data[2]['last_exposure'];?>">
                                </div>
   
                            </div>

                            <div class="form-group">
                                
                                <div class="col-sm-8">
                                    <label for="symptoms" class="control-label">Symptoms</label>
                                  <input type="text" class="form-control" name="symptoms" value="<?=$data[2]['symptoms'];?>">
                                </div>
                                
                                <div class="col-sm-4">
                                    <label for="isolation_place" class="control-label">Place of Isolation</label>
                                  <input type="text" class="form-control" name="isolation_place" value="<?=$data[2]['isolation_place'];?>">
                                </div>
                                              
                            </div>

                            <div class="form-group">
                                
                                <div class="col-sm-4">
                                    <label for="illness_onset" class="control-label">Onset of Illness</label>
                                  <input type="date" class="form-control" name="illness_onset" value="<?=$data[2]['illness_onset'];?>">
                                </div>

                                <div class="col-sm-4">
                                    <label for="quarantine_period" class="control-label">Quarantine Period</label>
                                  <input type="text" class="form-control" name="quarantine_period" value="<?=$data[2]['quarantine_period'];?>">
                                </div>

                                <div class="col-sm-4">
                                    <label for="recovery_date" class="control-label">Recovery Date</label>
                                  <input type="date" class="form-control" name="recovery_date" value="<?=$data[2]['recovery_date'];?>">
                                </div>
   
                            </div>

                            <div class="form-group">

                                <div class="col-sm-4">
                                    <label for="outcome" class="control-label">Outcome</label>
                                  <input type="text" class="form-control" name="outcome" value="<?=$data[2]['outcome'];?>">
                                </div>

                                <div class="col-sm-4">
                                    <label for="contact_tracing" class="control-label">Closed Contact Tracing Date</label>
                                  <input type="date" class="form-control" name="contact_tracing" value="<?=$data[2]['contact_tracing'];?>">
                                </div>
                                    
                                    <div class="col-sm-4">
                                    <label for="closed_contact" class="control-label">No. of Closed Contact</label>
                                  <input type="number" class="form-control" name="closed_contact" value="<?=$data[2]['closed_contact'];?>">
                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-sm-4">
                                    <label for="status" class="control-label">Status</label>
                                  <input type="text" class="form-control" name="status" value="<?=$data[2]['status'];?>">
                                </div>

                                <div class="col-sm-4">
                                    <label for="vaccination_status" class="control-label">Vaccination Status</label>
                                  <input type="text" class="form-control" name="vaccination_status" value="<?=$data[2]['vaccination_status'];?>">
                                </div>

                            </div>

                            <hr>
                            <button type="submit" style="color: white; float: right;" class="btn btn-success btn-md btn-flat"><i class="fa fa-save"></i> Save Changes</button>
                            <a href="<?=site_url('covid/covid_records'); ?>" class='btn btn-danger btn-md btn-flat' style="color: white; float: right;  margin-right: 5px;"> Cancel</a>
                            </form>
                            </div>
                        </div>          
                    </div>
                </div>
            </div>
    </section>
     <!-- DELETE COVID-->

    <div class="modal fade" id="delcovidrecords_<?=$data[2]['id']?>">
        <div class="modal-dialog modal-xs">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><b>DELETE COVID19 RECORD</b></h4>
                </div>
                <div class="modal-body" style="padding: 30px;">
                  <form class="form-horizontal" method="POST" action="<?=site_url('covid/delete_covid/'.$data[2]['id']);?>">
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