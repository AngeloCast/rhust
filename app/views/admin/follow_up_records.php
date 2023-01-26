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
        <i>(Follow-up Records)</i>
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

            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>No.</th>
                  <th>Type</th>
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
                    <td><b style="background-color: #3fd764; padding: 0px 10px 0px 10px; color: white; border-radius: 5px">FOLLOW-UP</b></td>
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
                      <button onclick="window.location.href='<?=site_url('patient/edit_patientrecord/'.$row['id']); ?>';" class="btn btn-success btn-xs btn-flat"><i class='fa fa-edit'></i> Edit</button>
                      <button onclick="window.location.href='<?=site_url('dopdf/generate_patientrecord/'.$row['id']); ?>';" class="btn btn-danger btn-xs btn-flat"><i class='fa fa-file-pdf-o'></i> PDF</button>
                      <button onclick="window.location.href='<?=site_url('patient/follow_up/'.$row['id']); ?>';" class="btn btn-info btn-xs btn-flat"><i class='fa fa-plus'></i> Follow Up</button>
                      
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