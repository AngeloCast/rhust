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
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php include 'includes/message.php'; ?>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-3">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php 
                echo "<h3>".$data[2]['prows']."</h3>"; 
              ?>
              <p>Patient Records</p>
            </div>
            <div class="icon">
              <i class="fa fa-bed"></i>
            </div>
             <a href="<?=site_url('patient/patient_records'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> 
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-3">
          <!-- small box -->
          <div class="small-box bg-teal">
            <div class="inner">
              <?php 
                echo "<h3>".$data[5]['erows']."</h3>"; 
              ?>
              <p>Upcoming Events</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
              <a href="<?=site_url('admin/events'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-3">
           <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php 
                echo "<h3>".$data[1]['crows']."</h3>";  
              ?>
              <p>Unread Inquiries</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
              <a href="<?=site_url('admin/inquiry'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-3">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php 
                echo "<h3>".$data[3]['numrows']."</h3>"; 
              ?>
              <p>Users</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
              <a href="<?=site_url('admin/users'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
         

        </div>
        <!-- ./col -->


        <!-- ./col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-lg-6">
          <div class="box">
            <div class="box-body">
              <h6><b>RHUST PATIENTS</b></h6>
              <!-- <canvas id="barChart"></canvas> -->
              <canvas id="lineChart"></canvas>
            </div>
          </div>  
        </div>
        <div class="col-lg-6">
          <div class="box">
            <div class="box-body">
              <h6><b>DISEASES</b></h6>
              <canvas id="doughnutChart"></canvas>
            </div>
          </div>  
        </div>
      </div>
      <!-- includes/calendar.php -->

      </section>
      <!-- right col -->
    </div>
<?php include 'includes/footer.php'; ?>
<?php include 'includes/scripts.php'; ?>
<?php include 'includes/graphs.php'; ?>
</div>
</body>
</html>