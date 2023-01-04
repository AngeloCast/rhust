<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <h1>
        <i class="fa fa-wheelchair"></i> 
        <strong>
        Patient Records
        </strong>
      </h1>
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Patient Records</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php include 'includes/message.php'; ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="<?=site_url('patient/new_patient');?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New Record</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Patient ID</th>
                  <th>First name</th>
                  <th>Last name</th>
                  <th>Address</th>
                  <th>Contact #</th>
                  <th>Date Created</th>
                  <th>Action</th>

                </thead>
                <tbody>
                  <?php foreach ($data[2] as $row):?>
                  <tr>
                    <td><?=$row['id']; ?></td>
                    <td><?=$row['firstname']; ?></td>
                    <td><?=$row['lastname']; ?></td>
                    <td>
                    <?php 
                      if($row['address'] == ''){
                        echo 'not set';
                      }
                      else{
                        echo $row['address'];
                      }
                    ?>
                    </td>
                    <td><?php 
                      if($row['cnumber'] == ''){
                        echo 'not set';
                      }
                      else{
                        echo $row['cnumber'];
                      }
                    ?></td>
                    <td><?=$row['date_created']; ?></td>
            
                    <td>
                      <a href="<?=site_url('patient/edit_patientrecord/'.$row['id']); ?>" style="margin-right: 10px;" class='btn btn-success btn-xs btn-flat'><i class='fa fa-edit'></i> Edit</a>
                      <a href="<?=site_url('dopdf/generate_patientrecord/'.$row['id']); ?>" style="margin-right: 10px;" class='btn btn-danger btn-xs btn-flat'><i class="fa fa-file-pdf-o"></i> PDF</a> 
                      
                    </td>
                  </tr>
                  <?php include 'includes/delpatientrecord_modal.php'; ?>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
     
  </div>
    <?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>

</script>
</body>
</html>
