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
       <i class="fa fa-line-chart"></i> 
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
                      <button onclick="window.location.href='<?=site_url('covid/edit_covidcase/'.$row['id']); ?>';" class='btn btn-success btn-xs btn-flat'><i class='fa fa-edit'></i> Edit</button>
                      <button data-toggle="modal" data-id="<?=$row['id'];?>" class="btn btn-danger btn-xs btn-flat delvaccrecord"><i class="fa fa-trash"></i> Delete</button>
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

  <!-- DELETE COVID -->
  <div class="modal fade" id="delModal">
    <div class="modal-dialog modal-xs">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><b>DELETE COVID19 RECORD</b></h4>
        </div>
        <form class="form-horizontal" method="POST" action="<?=site_url('covid/delete_covid');?>">
        <div class="modal-body c_record" style="padding: 30px;">

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

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script type='text/javascript'>
$(document).ready(function(){

    $('.delvaccrecord').click(function(){
        var cid = $(this).data('id');
        $.ajax({
            url: '<?php echo site_url('covid/get_covid_record');?>',
            type: 'post',
            data: {cid: cid},
            success: function(response){ 
                $('.c_record').html(response); 
                $('#delModal').modal('show'); 
            }
        });
    });
});
</script>
</body>
</html>
