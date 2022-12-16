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
       <i class="fas fa-virus"></i> 
        <strong>
        COVID19 Records
        </strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">COVID19</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php include 'includes/message.php'; ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box-header with-border">
              <a href="<?=site_url('covid/new_covidcase');?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New Record</a>
            </div>      
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Case No.</th>
                  <th>Last Name</th>  
                  <th>First Name</th>
                  <th>Contact #</th>
                  <th>Date Created</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php foreach ($data[2] as $row):?>
                  <tr>
                    <td><?=$row['case_no']; ?></td>
                    <td><?=$row['lastname']; ?></td>
                    <td><?=$row['firstname']; ?></td>
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
                      <a href="<?=site_url('covid/edit_covidcase/'.$row['id']); ?>" style="margin-right: 10px;" class='btn btn-success btn-xs btn-flat'><i class='fa fa-edit'></i> Edit</button>
                      <a href="#delcovidrecords_<?=$row['id']?>" data-toggle="modal" class="btn btn-danger btn-xs btn-flat"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                  </tr>
                  <?php include 'includes/delcovid_modal.php'; ?>
                  <?php endforeach ?>
                <tbody>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
     
  </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include 'includes/covid_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>

</script>
</body>
</html>
