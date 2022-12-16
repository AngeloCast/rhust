<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR;?>/calendar/fullcalendar/lib/main.min.css">
<link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR;?>/calendar/calendaradmin.css">
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/jquery/dist/js/jquery.min.js"></script>
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/calendar/fullcalendar/lib/main.min.js"></script>
<style type="text/css">
  .fc-h-event {
  display: block;
  border: 1px solid green !important;
  border: 1px solid var(--fc-event-border-color, green) !important;
  background-color: green !important;
  background-color: var(--fc-event-bg-color, green) !important
  }
  textarea{
    resize: vertical;
  }
</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-calendar"></i> <strong>EVENTS</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Events</li>
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
                  <th>Title</th>
                  <th>Details</th>
                  <th>Start</th>
                  <th>End</th>
                  <th>Manage</th>
                </thead>
                <tbody>
                  <?php foreach ($data[2] as $row):?>
                  <tr>
                    <td><?=$row['title']; ?></td>
                    <td><?=$row['details']; ?></td>
                    <td><?=$row['start_datetime']; ?></td>
                    <td><?=$row['end_datetime']; ?></td>
                    <td>
                      <a href="<?=site_url('admin/edit_event/'.$row['id']); ?>" style="margin-right: 10px;" class="btn btn-success btn-xs btn-flat"><i class='fa fa-edit'></i> Edit</a>
                      <a href="#delevent_<?=$row['id']?>" data-toggle="modal" class="btn btn-danger btn-xs btn-flat"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                  </tr>
                  <?php include 'includes/delevent_modal.php'; ?>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php include 'includes/events_modal.php'; ?>
          <h5 class="hr-lines">EVENT CALENDAR</h5>
        </div>
      </div>
      <br>
      <div class="row">
            <div class="col-md-7">
              <div class="box">
                <div class="box-body">
                  <div id="calendar"></div>
                </div>
              </div>
            </div>

            <div class="col-md-5">
                <div class="box rounded-0 shadow">
                    <div class="box-header text-center bg-gradient bg-primary" style="color: white;">
                        <h4 class="box-title">ADD EVENT <i class="fa fa-pencil"></i></h4>
                    </div>
                    <div class="box-body">
                        <div class="container-fluid">
                            <form action="<?=site_url('admin/save_event');?>" method="post" id="schedule-form" enctype="multipart/form-data">
                                <div class="form-group mb-2">
                                    <label for="photo" class="control-label">Poster</label>
                                    <input class="form-control form-control-sm rounded-0" type="file" id="fileToUpload" name="fileToUpload" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="title" class="control-label">Title</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="details" class="control-label">Details</label>
                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="details" id="description" required></textarea>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-labels">Start of event</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="end_datetime" class="control-label">End of event</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="end_datetime" id="end_datetime" required>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="text-center">
                            <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i class="fa fa-save"></i> Save</button>
                            <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

      </div>

    </section>

<?php 

$schedules = $data[2];
$sched_res = [];
foreach($schedules as $row){
    $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
    $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
    $sched_res[$row['id']] = $row;
}
?>
  </div>
  	<?php include 'includes/footer.php'; ?>
    

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/calendar/eventscript.js"></script>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
</body>
</html>
