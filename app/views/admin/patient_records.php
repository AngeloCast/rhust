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
        <i class="fa fa-wheelchair"></i> 
        <strong>
        Patient Records 
        </strong>
        <i>(Initial Records)</i>
      </h1>
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Patient Records</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php include 'includes/message.php'; ?>
      <div class="row">
        
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="<?=site_url('patient/new_patient');?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New Record</a>
              <button style="float: right" data-toggle="modal" data-target="#showstatistics" class="btn btn-info btn-sm btn-flat"><i class="fa fa-line-chart"></i> Records Statistics</button>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Serial No.</th>
                  <th>Type</th>
                  <th>First name</th>
                  <th>Last name</th>
                  <th>Address</th>
                  <th>Contact #</th>
                  <th>Visit Date</th>
                  <th>Action</th>

                </thead>
                <tbody>
                  <?php foreach ($data[2] as $row):?>
                  <tr>
                    <td><?=$row['serial_no']; ?></td>
                    <td><b style="background-color: #3fd764; padding: 0px 10px 0px 10px; color: white; border-radius: 5px;">INITIAL</b></td>
                    <td><?=$row['firstname']; ?></td>
                    <td><?=$row['lastname']; ?></td>
                    <td>
                    <?php 
                      if($row['address'] == ''){
                        echo 'not set';
                      }
                      else{
                        echo $row['address'];
                      }
                    ?>
                    </td>
                    <td><?php 
                      if($row['cnumber'] == ''){
                        echo 'not set';
                      }
                      else{
                        echo $row['cnumber'];
                      }
                    ?></td>
                    <td><?=$row['visit_date']; ?></td>
            
                    <td>
                      <button onclick="window.location.href='<?=site_url('patient/edit_patientrecord/'.$row['id']); ?>';" class="btn btn-success btn-xs btn-flat"><i class='fa fa-edit'></i> Edit</button>
                      <button onclick="window.location.href='<?=site_url('dopdf/generate_patientrecord/'.$row['id']); ?>';" class="btn btn-danger btn-xs btn-flat"><i class='fa fa-file-pdf-o'></i> PDF</button>
                      <button onclick="window.location.href='<?=site_url('patient/follow_up/'.$row['id']); ?>';" class="btn btn-primary btn-xs btn-flat"><i class='fa fa-plus'></i> Follow Up</button>
                      
                    </td>
                  </tr>
                  <?php include 'includes/delpatientrecord_modal.php'; ?>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="modal fade" id="showstatistics">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><i class="fa fa-line-chart"></i> INITIAL PATIENT RECORDS STATISTICS</b></h4>
              </div>
            
              <div class="modal-body" style="padding: 30px;">
                
                <div class="row" style="border: solid 1px dimgray; margin-bottom: 30px;">
                  <div class="col-sm-12" style="padding: 20px;">
                    <h4 class="modal-title text-center"><b>DAILY RECORDS</b></h4>
                    <br>
                    <canvas id="mylineChart"></canvas>
                  </div>
                </div>
                
                <div class="row" style="border: solid 1px dimgray; border-radius: 5px;">
                  <div class="col-sm-12">
                  <h4 class="modal-title text-center" style="margin-top: 10px;"><b>GENDER GROUP</b></h4>
                </div>
                  <div class="col-sm-4" style="margin-top: 20px;">
                    <!-- small box -->
                      <div class="small-box bg-teal">
                        <div class="inner">
                          <?php 
                            echo "<h3>".$data[6]['mrow']."</h3>"; 
                          ?>
                          <p>Male Patients</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-male"></i>
                        </div>
                      </div>
                  </div>

                  <div class="col-sm-4">
                    <!-- small box -->
                      <div class="small-box bg-red" style="margin-top: 20px;">
                        <div class="inner">
                          <?php 
                            echo "<h3>".$data[7]['frow']."</h3>"; 
                          ?>
                          <p>Female Patients</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-female"></i>
                        </div>
                      </div>
                  </div>

                  <div class="col-sm-4">
                    <!-- small box -->
                      <div class="small-box bg-yellow" style="margin-top: 20px;">
                        <div class="inner">
                          <?php 
                            echo "<h3>".$data[8]['orow']."</h3>"; 
                          ?>
                          <p>Other</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-question-circle"></i>
                        </div>
                      </div>
                  </div>
                </div>
                <br>
                <div class="row" style="margin-bottom: 30px;">
                  
                  <div class="col-sm-6" style="border: solid 1px dimgray; padding: 20px;">
                    <h4 class="modal-title text-center"><b>AGE GROUP</b></h4>
                    <br>
                    <canvas id="mydoughChart"></canvas>
                  </div>

                  <div class="col-sm-6" style="border: solid 1px dimgray;padding: 20px;">
                    <h4 class="modal-title text-center"><b>RECORDS PER BARANGAY</b></h4>
                    <br>
                    <canvas id="mypieChart"></canvas>
                  </div>


                </div>
              </div>
              
          </div>
      </div>
    </div>
  
  </div>
    <?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->
<?php
  
  foreach ($data[3] as $datum) {
      $label1[] = $datum['dayCreation'];
      $dataset1[] = $datum['perDayPatient'];
  }

  foreach ($data[4] as $datum) {
      $label2[] = $datum['patientAge'];
      $dataset2[] = $datum['numPerPatient'];
  }

  foreach ($data[5] as $datum) {
      $label3[] = $datum['address'];
      $dataset3[] = $datum['numPerPatient'];
  }
?>
<?php include 'includes/scripts.php'; ?>
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
                label: "Initial Records",
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
    const labels2 = <?php echo json_encode($label2) ?>;
    const num2 = <?php echo json_encode($dataset2) ?>;
    var ctx = document.getElementById("mydoughChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels2,
            datasets: [{
                data: num2,
                backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#008080', '#800000', '#008080', '#805c00'],
            }],
        },
    });
</script>
<script>
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';
    const labels3 = <?php echo json_encode($label3) ?>;
    const num3 = <?php echo json_encode($dataset3) ?>;
    var ctx = document.getElementById("mypieChart");
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels3,
            datasets: [{
                data: num3,
                backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#008080', '#800000', '#008080', '#805c00'],
            }],
        },
    });
</script>

</body>
</html>
