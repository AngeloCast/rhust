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
        <i class="fa fa-bullhorn"></i> <strong>Announcements </strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Announcements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php include 'includes/message.php'; ?>
      <div class="row">
        <div class="col-xs-12">
          <div style="text-align: center; margin-bottom: 20px;">
            <a style="width: 200px;" href="<?=site_url('admin/new_post/announcement'); ?>" class="btn btn-primary btn-md btn-flat"> NEW ANNOUNCEMENT <i class="fa fa-pencil"></i></a>
          </div>
          <div class="box">

            <div class="box-header with-border">
              
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Date Posted</th>
                  <th>Manage</th>
                </thead>
                <tbody>
                  <?php foreach ($data[2] as $row):?>
                  <tr>
                    <td><?=$row['title']; ?></td>
                    <td>
                      <?php 
                        if($row['status'] == 'publish'){
                          echo 'published';
                        }
                        else{
                          echo $row['status'];
                        }
                      ?>
                    </td>
                    <td><?=$row['date']; ?></td>
                    
                    <td>
                      <a href="<?=site_url('admin/edit_post/'.$row['id']); ?>" style="margin-right: 10px;" class="btn btn-success btn-xs btn-flat"><i class='fa fa-edit'></i> Edit</a>
                      <a href="#delpost_<?=$row['id']?>" data-toggle="modal" class="btn btn-danger btn-xs btn-flat"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                  </tr>
                  <?php include 'includes/delpost_modal.php'; ?>
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
