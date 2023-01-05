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
        <i class="fas fa-user-md"></i> 
        <strong>
        Staff
        </strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Staff Members</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php include 'includes/message.php'; ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnewstaff" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Full name</th>
                  <th>Email</th>
                  <th>Cnumber</th>
                  <th>Address</th>
                  <th>Displayed</th>
                  <th>Manage</th>
                  
                </thead>
                <tbody>
                  <?php foreach ($data[2] as $row):?>
                  <tr>
                    <td><?=$row['fullname']; ?></td>
                    <td><?=$row['email']; ?></td>
                    <td><?=$row['cnumber']; ?></td>
                    <td><?=$row['address']; ?></td>
                    <td><?php if($row['display'] == 0){echo'No';}else{echo'Yes';} ?></td>
                    <td>
                      <a href="<?=site_url('admin/edit_staff/'.$row['staff_id']); ?>" style="margin-right: 10px;" class='btn btn-success btn-xs btn-flat'><i class='fa fa-edit'></i> Edit</button>
                      <a href="#delstaff_<?=$row['staff_id']?>" data-toggle="modal" class="btn btn-danger btn-xs btn-flat"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                  </tr>
                  <?php include 'includes/delstaff_modal.php'; ?>
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
    <?php include 'includes/staff_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>

</script>
</body>
</html>
