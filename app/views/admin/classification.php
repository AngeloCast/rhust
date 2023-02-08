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
        <i class="fa fa-plus"></i> 
        <strong>
        New Health Disease/Assessment/Classification 
        </strong>
      </h1>
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">New Classification</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php include 'includes/message.php'; ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <button data-toggle="modal" data-target="#addnew" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New Classification</button>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Name</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  <?php foreach ($data[2] as $row):?>
                  <tr>
                    <td><?=$row['name']; ?></td>
            
                    <td>
                      <button data-toggle="modal" data-id="<?=$row['id'];?>" class='btn btn-success btn-xs btn-flat editclass'><i class='fa fa-edit'></i> Edit</button>
                      <button data-toggle="modal" data-id="<?=$row['id'];?>" class="btn btn-danger btn-xs btn-flat deleteclass"><i class='fa fa-trash'></i> Delete</button>
                    </td>
                  </tr>
                  <?php ?>
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

    <?php include 'includes/classification_modal.php'; ?>
</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script type='text/javascript'>
$(document).ready(function(){
  $('.deleteclass').click(function(){
      var cid = $(this).data('id');
      $.ajax({
          url: '<?php echo site_url('patient/get_classification_delete');?>',
          type: 'post',
          data: {cid: cid},
          success: function(response){ 
              $('.del_class').html(response); 
              $('#delModal').modal('show'); 
          }
      });
  });
});
</script>
<script type="text/javascript">
$('.editclass').click(function(){
    var cid = $(this).data('id');
    $.ajax({
        url: '<?php echo site_url('patient/get_classification_edit');?>',
        type: 'post',
        data: {cid: cid},
        success: function(response){ 
            $('.edit_class').html(response); 
            $('#editModal').modal('show'); 
        }
    });
});
</script>
</body>
</html>
