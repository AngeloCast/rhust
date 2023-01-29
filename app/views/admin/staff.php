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
        <i class="fa fa-user-md"></i> 
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
              <button data-toggle="modal" data-target="#addnewstaff" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New Staff Account</button>
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
                      <button onclick="window.location.href='<?=site_url('admin/edit_staff/'.$row['staff_id']); ?>';" class="btn btn-success btn-xs btn-flat"><i class='fa fa-edit'></i> Edit</button>
                      <button data-toggle="modal" data-id="<?=$row['staff_id'];?>" class="btn btn-danger btn-xs btn-flat delstaff"><i class="fa fa-trash"></i> Delete</button>
                      
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

  <!-- DELETE STAFF -->

  <div class="modal fade" id="delstaff">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><b>DELETE STAFF RECORD</b></h4>
        </div>
        <form class="form-horizontal" method="POST" action="<?=site_url('admin/delete_staff');?>">
        <div class="modal-body staff" style="padding: 30px;">
        
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
    <?php include 'includes/staff_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script type='text/javascript'>
$(document).ready(function(){

    $('.delstaff').click(function(){ //button class
        var sid = $(this).data('id');
        $.ajax({
            url: '<?php echo site_url('admin/get_staff_info');?>',
            type: 'post',
            data: {sid: sid},
            success: function(response){ 
                $('.staff').html(response); //modal-body class
                $('#delstaff').modal('show');  //modal id
            }
        });
    });
});
</script>
</body>
</html>
