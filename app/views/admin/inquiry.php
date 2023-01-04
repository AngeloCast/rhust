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
        <i class="fas fa-envelope"></i> 
        <strong>
        Inquiries
        </strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Inquiries</li>
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
                  <th>Status</th>
                  <th>Subject</th>
                  <th>Message</th>
                  
                  <th>Email</th>
                  <th>Date</th>
                  <th>Manage</th>
                </thead>
                <tbody>
                  <?php foreach ($data[2] as $row):?>
                  <tr>
                    <?php if($row['status'] == 'read'){
                      echo '<td><i class="fa fa-envelope-open-o"></i> READ</td>';
                      }
                      else{
                        echo '<td><div style="color:green"><i class="fa fa-envelope"></i> UNREAD</div></td>';
                      }
                    ?>
                    <td><?=$row['subject']; ?></td>
                    <td><?php 
                          if(strlen($row['message'])>50){
                            echo $row['message']=substr($row['message'],0,50).' ...';
                          }
                          else{
                            echo $row['message'];
                          }
                        ?>  
                    </td>
                    
                    <td><?=$row['email']; ?></td>
                    <td><?=$row['date']; ?></td>
                    <td>
                      <a href="<?=site_url("admin/view_inquiry/".$row['id']); ?>" style="margin-right: 10px;" class="btn btn-primary btn-xs btn-flat"><i class="fa fa-eye"></i> View</a>
                      <a href="#delinquiry_<?=$row['id']?>" data-toggle="modal" class="btn btn-danger btn-xs btn-flat"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                  </tr>
                  <?php include 'includes/delinquiry_modal.php'; ?>
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
