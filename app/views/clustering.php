<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>RHU San Teodoro - Clustering</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="<?php echo BASE_URL . PUBLIC_DIR . '/images/MHOST_icon.png'; ?>">
	<meta charset="utf-8">
	<link href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/jquery.desoslide.css">
	<link href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/style.css" rel='stylesheet' type='text/css' />
	<link href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/fontawesome-all.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
	<!-- Add jQuery library -->

</head>
<style>
	#barangay {
		margin-top:  10px;
		margin-left: 30px;
	    -webkit-column-count: 3;
	    -moz-column-count: 3;
	    column-count: 3;
	}

  area:hover {
    cursor: pointer;
    opacity: 0.5;
  }
  body { padding-right: 0 !important }

  title {
  	color: red;
}

</style>
<body>
	<?php include("includes/header.php");?>

	<!--/main-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.php">Home</a>
		</li>
		<li class="breadcrumb-item active">Health Records Clustering</li>
	</ol>
	<section class="main-content-w3layouts-agileits">

		<div class="container" style="padding: 10px;">

			<div class="row">
				<!--left-->
				<div class="col-lg-12 left-blog-info-w3layouts-agileits">
							<?php include 'includes/message.php'; ?>
							<h3 class="tittle">Health Records Clustering</h3>
							<p class="sub text-center">Rural Health Unit of San Teodoro</p>
							
							<br><br><br>
							<div class="container">

								<div class="card">

	    						<div class="card-header">
										<br>
										<h3 style="color: teal; font-style: bold"><i class="fa fa-map"></i> San Teodoro, Oriental Mindoro Map</h3>
										<br>
									</div>
									<p style="font-size: 12px;"><i class="fa fa-info-circle"></i> How to use: Select the health disease | assessment | classification and click the show data button.</p>
									<div class="card-body mb-1" style="padding-bottom: 0px; background-color: #9ccde15c;">
										<form class="" action="<?=site_url('patient/update_patientrecord');?>" method="post">
										  <div class="form-group row">
										    <label for="colFormLabel" class="col-sm-4 col-form-label">Disease | Classification | Assessment: </label>
										    <div class="col-sm-4">
										      <select class="form-control" id="classification" name="classification">
										      	<?php 
															foreach($data[4] as $datum)
											        {
																echo "<option value='".$datum['name']."'>".$datum['name']."</option>";
															}
														?>
														</select>
										    </div>
										    <div class="col-sm-4">
										    	<button type="submit" class="btn btn-success btn-md btn-flat"><i class="fa fa-line-chart"></i> Show Data</button>
										    </div>
										  </div>
										</form>

									</div>

										<img src="<?php echo BASE_URL . PUBLIC_DIR;?>/images/mapstmarker2.jpg" style="border: 2px solid grey;" height="auto" width="100%" usemap="#image-map" alt="Map Image">
										<map name="image-map">
										  
										  <area coords="140,403,32" shape="circle" data-toggle="modal" data-target="#chart_caagutayan" title="<?php echo $data[15]['Caagutayanrecords']; ?> Records in Caagutayan">
									    <area coords="280,299,37" shape="circle" data-toggle="modal" data-target="#chart_calsapa" title="<?php echo $data[10]['Calsaparecords']; ?> Records in Calsapa">
									    <area coords="325,155,38" shape="circle" data-toggle="modal" data-target="#chart_ilag" title="<?php echo $data[11]['Ilagrecords']; ?> Records in Ilag">
									    <area coords="430,129,36" shape="circle" data-toggle="modal" data-target="#chart_poblacion" title="<?php echo $data[14]['Poblacionrecords']; ?> Records in Poblacion">
									    <area coords="380,392,35" shape="circle" data-toggle="modal" data-target="#chart_bigaan" title="<?php echo $data[8]['Bigaanrecords']; ?> Records in Bigaan">
									    <area coords="600,372,36" shape="circle" data-toggle="modal" data-target="#chart_lumangbayan" title="<?php echo $data[12]['Lumangbayanrecords']; ?> Records in Lumangbayan">
									    <area coords="710,704,41" shape="circle" data-toggle="modal" data-target="#chart_calangatan" title="<?php echo $data[9]['Calangatanrecords']; ?> Records in Calangatan">
									    <area coords="840,525,40" shape="circle" data-toggle="modal" data-target="#chart_tacligan" title="<?php echo $data[13]['Tacliganrecords']; ?> Records in Tacligan">
										</map>
									
								</div>
							</div>
							
							<div class="container">
								<hr>
								<div class="card">
									
									<div class="card-header">
										<h6><i class="fa fa-list"></i> List of Barangays</h6>
									</div>
									<div class="card-body" style="padding: 20px; background-color: #80808029;">
										<ul id="barangay">
										    <li><a type="button" data-toggle="modal" data-target="#chart_bigaan" class="btn btn-light btn-sm btn-flat mb-2 chart" href="#">Bigaan <span class="badge badge-pill badge-danger"><?php echo $data[8]['Bigaanrecords']; ?></span></a></li>

										    <li><a type="button" data-toggle="modal" data-target="#chart_calangatan" class="btn btn-light btn-sm btn-flat mb-2" href="#">Calangatan <span class="badge badge-pill badge-danger"><?php echo $data[9]['Calangatanrecords']; ?></span></a></li>

										    <li><a type="button" data-toggle="modal" data-target="#chart_calsapa" class="btn btn-light btn-sm btn-flat mb-2" href="#">Calsapa <span class="badge badge-pill badge-danger"><?php echo $data[10]['Calsaparecords']; ?></span></a></li>

										    <li><a type="button" data-toggle="modal" data-target="#chart_ilag" class="btn btn-light btn-sm btn-flat mb-2" href="#">Ilag <span class="badge badge-pill badge-danger"><?php echo $data[11]['Ilagrecords']; ?></span></a></li>

										    <li><a type="button" data-toggle="modal" data-target="#chart_lumangbayan" class="btn btn-light btn-sm btn-flat mb-2" href="#">Lumangbayan <span class="badge badge-pill badge-danger"><?php echo $data[12]['Lumangbayanrecords']; ?></span></a></li>

										    <li><a type="button" data-toggle="modal" data-target="#chart_tacligan" class="btn btn-light btn-sm btn-flat mb-2" href="#">Tacligan <span class="badge badge-pill badge-danger"><?php echo $data[13]['Tacliganrecords']; ?></span></a></li>

										    <li><a type="button" data-toggle="modal" data-target="#chart_poblacion" class="btn btn-light btn-sm btn-flat mb-2" href="#">Poblacion <span class="badge badge-pill badge-danger"><?php echo $data[14]['Poblacionrecords']; ?></span></a></li>

										    <li><a type="button" data-toggle="modal" data-target="#chart_caagutayan" class="btn btn-light btn-sm btn-flat mb-2" href="#">Caagutayan <span class="badge badge-pill badge-danger"><?php echo $data[15]['Caagutayanrecords']; ?></span></a></li>
										</ul>
									</div>
								</div>
						</div>
					</div>
				</div>
				

				<?php 
					$barangay = ['bigaan', 'calangatan', 'calsapa', 'ilag', 'lumangbayan', 'tacligan', 'poblacion', 'caagutayan'];
					foreach($barangay as $row){
						include("includes/cluster_charts_modal.php");
					}
				?>

			</div>
		</div>
	</section>
<?php include("includes/footer.php");?>
<?php include("includes/scripts.php");?>
<?php
	
	//BIGAAN
  foreach ($data[5] as $datum) {
      $label01[] = $datum['dayCreation'];
      $dataset01[] = $datum['perDayPatient'];
	}

	foreach ($data[6] as $datum) {
      $label02[] = $datum['patientAge'];
      $dataset02[] = $datum['numPerPatient'];
	}

	foreach ($data[7] as $datum) {
      $label03[] = $datum['patientClass'];
      $dataset03[] = $datum['numPerPatient'];
	}

	//CALANGATAN

	foreach ($data[16] as $datum) {
      $label11[] = $datum['dayCreation'];
      $dataset11[] = $datum['perDayPatient'];
	}

	foreach ($data[17] as $datum) {
      $label12[] = $datum['patientAge'];
      $dataset12[] = $datum['numPerPatient'];
	}

	foreach ($data[18] as $datum) {
      $label13[] = $datum['patientClass'];
      $dataset13[] = $datum['numPerPatient'];
	}

	//CALSAPA

	foreach ($data[19] as $datum) {
      $label21[] = $datum['dayCreation'];
      $dataset21[] = $datum['perDayPatient'];
	}

	foreach ($data[20] as $datum) {
      $label22[] = $datum['patientAge'];
      $dataset22[] = $datum['numPerPatient'];
	}

	foreach ($data[21] as $datum) {
      $label23[] = $datum['patientClass'];
      $dataset23[] = $datum['numPerPatient'];
	}

	//ILAG

	foreach ($data[22] as $datum) {
      $label31[] = $datum['dayCreation'];
      $dataset31[] = $datum['perDayPatient'];
	}

	foreach ($data[23] as $datum) {
      $label32[] = $datum['patientAge'];
      $dataset32[] = $datum['numPerPatient'];
	}

	foreach ($data[24] as $datum) {
      $label33[] = $datum['patientClass'];
      $dataset33[] = $datum['numPerPatient'];
	}

	//LUMANGBAYAN

	foreach ($data[25] as $datum) {
      $label41[] = $datum['dayCreation'];
      $dataset41[] = $datum['perDayPatient'];
	}

	foreach ($data[26] as $datum) {
      $label42[] = $datum['patientAge'];
      $dataset42[] = $datum['numPerPatient'];
	}

	foreach ($data[27] as $datum) {
      $label43[] = $datum['patientClass'];
      $dataset43[] = $datum['numPerPatient'];
	}

	//TACLIGAN

	foreach ($data[28] as $datum) {
      $label51[] = $datum['dayCreation'];
      $dataset51[] = $datum['perDayPatient'];
	}

	foreach ($data[29] as $datum) {
      $label52[] = $datum['patientAge'];
      $dataset52[] = $datum['numPerPatient'];
	}

	foreach ($data[30] as $datum) {
      $label53[] = $datum['patientClass'];
      $dataset53[] = $datum['numPerPatient'];
	}

	//POBLACION

	foreach ($data[31] as $datum) {
      $label61[] = $datum['dayCreation'];
      $dataset61[] = $datum['perDayPatient'];
	}

	foreach ($data[32] as $datum) {
      $label62[] = $datum['patientAge'];
      $dataset62[] = $datum['numPerPatient'];
	}

	foreach ($data[33] as $datum) {
      $label63[] = $datum['patientClass'];
      $dataset63[] = $datum['numPerPatient'];
	}


	//CAAGUTAYAN

	foreach ($data[34] as $datum) {
      $label71[] = $datum['dayCreation'];
      $dataset71[] = $datum['perDayPatient'];
	}

	foreach ($data[35] as $datum) {
      $label72[] = $datum['patientAge'];
      $dataset72[] = $datum['numPerPatient'];
	}

	foreach ($data[36] as $datum) {
      $label73[] = $datum['patientClass'];
      $dataset73[] = $datum['numPerPatient'];
	}
?>

<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/js/jquery-2.2.3.min.js"></script>
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/js/bootstrap.js"></script>
<?php include("includes/charts_script.php");?>
</body>
</html>