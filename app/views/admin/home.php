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
              <h6><b>DAILY RHUST PATIENTS</b></h6>
              <!-- <canvas id="barChart"></canvas> -->
              <canvas id="mylineChart"></canvas>
            </div>
          </div>  
        </div>
        <div class="col-lg-6">
          <div class="box">
            <div class="box-body">
              <h6><b>PATIENT RECORDS PER BARANGAY</b></h6>
              <canvas id="mydoughChart"></canvas>
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
<?php
  
  foreach ($data[6] as $datum) {
      $label1[] = $datum['dayCreation'];
      $dataset1[] = $datum['perDayPatient'];
  }
  foreach ($data[7] as $datum) {
      $label[] = $datum['address'];
      $dataset[] = $datum['numPerPatient'];
  }

?>
<script>
        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';
        const labels1 = <?php echo json_encode($label1) ?>;
        const num1 = <?php echo json_encode($dataset1) ?>;
        var ctx = document.getElementById("mylineChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels1,
                datasets: [{
                    label: "Records",
                    lineTension: 0.3,
                    backgroundColor: "rgba(73,163,140,0.71)",
                    borderColor: "rgba(2,117,216,1)",
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(2,117,216,1)",
                    pointBorderColor: "rgba(255,255,255,0.8)",
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(2,117,216,1)",
                    pointHitRadius: 50,
                    pointBorderWidth: 2,
                    data: num1,
                }],
            },
            options: {
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: num1.max,
                            maxTicksLimit: 5
                        },
                        gridLines: {
                            color: "rgba(0, 0, 0, .125)",
                        }
                    }],
                },
                legend: {
                    display: true
                }
            }
        });

    </script>
    <script>
        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';
        const labels = <?php echo json_encode($label) ?>;
        const num = <?php echo json_encode($dataset) ?>;
        var ctx = document.getElementById("mydoughChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: num,
                    backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#008080', '#800000', '#00008B', '#805c00'],
                }],
            },
        });
    </script>
</body>
</html>