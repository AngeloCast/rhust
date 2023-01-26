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
        <i class="fas fa-users"></i> 
        <strong>
        Users
        </strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php include 'includes/message.php'; ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">

            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>ID</th>
                  <th>Email</th>
                  <th>Full Name</th>
                  <th>Address</th>
                  <th>Contact</th>
                  <th>Manage</th>
                </thead>
                <tbody>
                  <?php foreach ($data[2] as $row):?>
                  <tr>
                    <td><?=$row['id']; ?></td>
                    <td><?=$row['email']; ?></td>
                    <td><?=$row['fullname']; ?></td>
                    <td>
                      <?php 
                        if(strlen($row['address']) == 0){
                          echo '<p style="color: red;">address not set</p>';
                        }
                        else{
                          echo $row['address'];
                        }
                        ?>
                    </td>
                    <td>
                        <?php 
                        if(strlen($row['cnumber']) == 0){
                          echo '<p style="color: red;">contact not set</p>';
                        }
                        else{
                          echo $row['cnumber'];
                        }
                        ?>
                    </td>
                    
                    <td>
                      <button onclick="window.location.href='<?=site_url('admin/view_user/'.$row['id']); ?>';" class="btn btn-primary btn-xs btn-flat"><i class='fa fa-eye'></i> View</button>
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
     
  </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include 'includes/users_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>

</script>
</body>
</html>
