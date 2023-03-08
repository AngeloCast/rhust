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

	.small-box{
		border-radius: 10px;
		padding: 20px;
		color: white;
		font-size: 20px;
		font-weight: bold;
	}
	.male_box{
		background-color: teal;
	}
	.female_box{
		background-color: #f44336;
	}
	.other_box{
		background-color: #ffc107;
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
								<div class="row">
									<div class="col-sm-2 mb-1">
										<button class="btn btn-info btn-sm" onclick="myFunction()"><i class="fa fa-info-circle"></i> How to use</button>
									</div>
								</div>
	    						<div class="card-header">
										<br>
										<h3 style="color: teal; font-style: bold"><i class="fa fa-map"></i> San Teodoro, Oriental Mindoro Map</h3>
										<br>
									</div>
									<div class="row" style="padding: 10px 10px 10px 30px;">
										<div class="col-sm-12">
											<div id="demo" style="font-size: 12px; display: none;">
												<ul>
													<li><p>Select the health disease | assessment | classification and click the show data button.</p></li>
													<li><p>You can click on the location marker on the map or the buttons bellow to show the statistics.</p></li>
													<li><p>Hover over the location marker to show all records in that barangay.</p></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="card-body mb-1" style="padding-bottom: 0px; background-color: #9ccde15c;">
										<form class="" action="<?=site_url('home/classification');?>" method="post">
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
										  
										  <area coords="140,403,32" shape="circle" data-toggle="modal" class="barangayrecord" data-target="#chart_caagutayan" title="<?php echo $data[12]['Caagutayanrecords']; ?> Records in Caagutayan">
									    <area coords="280,299,37" shape="circle" data-toggle="modal" data-target="#chart_calsapa" title="<?php echo $data[7]['Calsaparecords']; ?> Records in Calsapa">
									    <area coords="325,155,38" shape="circle" data-toggle="modal" data-target="#chart_ilag" title="<?php echo $data[8]['Ilagrecords']; ?> Records in Ilag">
									    <area coords="430,129,36" shape="circle" data-toggle="modal" data-target="#chart_poblacion" title="<?php echo $data[11]['Poblacionrecords']; ?> Records in Poblacion">
									    <area coords="380,392,35" shape="circle" data-toggle="modal" data-target="#chart_bigaan" title="<?php echo $data[5]['Bigaanrecords']; ?> Records in Bigaan">
									    <area coords="600,372,36" shape="circle" data-toggle="modal" data-target="#chart_lumangbayan" title="<?php echo $data[9]['Lumangbayanrecords']; ?> Records in Lumangbayan">
									    <area coords="710,704,41" shape="circle" data-toggle="modal" data-target="#chart_calangatan" title="<?php echo $data[6]['Calangatanrecords']; ?> Records in Calangatan">
									    <area coords="840,525,40" shape="circle" data-toggle="modal" data-target="#chart_tacligan" title="<?php echo $data[10]['Tacliganrecords']; ?> Records in Tacligan">
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
										    <li><a type="button" data-toggle="modal" data-target="#chart_bigaan" class="btn btn-light btn-sm btn-flat mb-2 barangayrecord" href="#">Bigaan <span class="badge badge-pill badge-danger"><?php echo $data[5]['Bigaanrecords']; ?></span></a></li>

										    <li><a type="button" data-toggle="modal" data-target="#chart_calangatan" class="btn btn-light btn-sm btn-flat mb-2" href="#">Calangatan <span class="badge badge-pill badge-danger"><?php echo $data[6]['Calangatanrecords']; ?></span></a></li>

										    <li><a type="button" data-toggle="modal" data-target="#chart_calsapa" class="btn btn-light btn-sm btn-flat mb-2" href="#">Calsapa <span class="badge badge-pill badge-danger"><?php echo $data[7]['Calsaparecords']; ?></span></a></li>

										    <li><a type="button" data-toggle="modal" data-target="#chart_ilag" class="btn btn-light btn-sm btn-flat mb-2" href="#">Ilag <span class="badge badge-pill badge-danger"><?php echo $data[8]['Ilagrecords']; ?></span></a></li>

										    <li><a type="button" data-toggle="modal" data-target="#chart_lumangbayan" class="btn btn-light btn-sm btn-flat mb-2" href="#">Lumangbayan <span class="badge badge-pill badge-danger"><?php echo $data[9]['Lumangbayanrecords']; ?></span></a></li>

										    <li><a type="button" data-toggle="modal" data-target="#chart_tacligan" class="btn btn-light btn-sm btn-flat mb-2" href="#">Tacligan <span class="badge badge-pill badge-danger"><?php echo $data[10]['Tacliganrecords']; ?></span></a></li>

										    <li><a type="button" data-toggle="modal" data-target="#chart_poblacion" class="btn btn-light btn-sm btn-flat mb-2" href="#">Poblacion <span class="badge badge-pill badge-danger"><?php echo $data[11]['Poblacionrecords']; ?></span></a></li>

										    <li><a type="button" data-toggle="modal" data-target="#chart_caagutayan" class="btn btn-light btn-sm btn-flat mb-2" href="#">Caagutayan <span class="badge badge-pill badge-danger"><?php echo $data[12]['Caagutayanrecords']; ?></span></a></li>
										</ul>
									</div>
								</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

<?php

	if($data[5]['Bigaanrecords'] != 0){
		foreach ($data[14]['bigaandough'] as $datum) {
			$label[] = $datum['patientClass'];
			$dataset[] = $datum['numPerPatient'];
		}
		foreach ($data[15]['bigaanpie'] as $datum) {
			$label0[] = $datum['patientAge'];
			$dataset0[] = $datum['numPerPatient'];
		}
		include("includes/barangay_modal/bigaan_modal.php");
		include("includes/barangay_script/bigaan_script.php");
	}

	if($data[6]['Calangatanrecords'] != 0){
		foreach ($data[14]['calangatandough'] as $datum) {
			$label1[] = $datum['patientClass'];
			$dataset1[] = $datum['numPerPatient'];
		}
		foreach ($data[15]['calangatanpie'] as $datum) {
			$label11[] = $datum['patientAge'];
			$dataset11[] = $datum['numPerPatient'];
		}
		include("includes/barangay_modal/calangatan_modal.php");
		include("includes/barangay_script/calangatan_script.php");
	}

	if($data[7]['Calsaparecords'] != 0){
		foreach ($data[14]['calsapadough'] as $datum) {
			$label2[] = $datum['patientClass'];
			$dataset2[] = $datum['numPerPatient'];
		}
		foreach ($data[15]['calsapapie'] as $datum) {
			$label12[] = $datum['patientAge'];
			$dataset12[] = $datum['numPerPatient'];
		}
		include("includes/barangay_modal/calsapa_modal.php");
		include("includes/barangay_script/calsapa_script.php");
	}

	if($data[8]['Ilagrecords'] != 0){
		foreach ($data[14]['ilagdough'] as $datum) {
			$label3[] = $datum['patientClass'];
			$dataset3[] = $datum['numPerPatient'];
		}
		foreach ($data[15]['ilagpie'] as $datum) {
			$label13[] = $datum['patientAge'];
			$dataset13[] = $datum['numPerPatient'];
		}
		include("includes/barangay_modal/ilag_modal.php");
		include("includes/barangay_script/ilag_script.php");
	}

	if($data[9]['Lumangbayanrecords'] != 0){
		foreach ($data[14]['lumangbayandough'] as $datum) {
			$label4[] = $datum['patientClass'];
			$dataset4[] = $datum['numPerPatient'];
		}
		foreach ($data[15]['lumangbayanpie'] as $datum) {
			$label14[] = $datum['patientAge'];
			$dataset14[] = $datum['numPerPatient'];
		}
		include("includes/barangay_modal/lumangbayan_modal.php");
		include("includes/barangay_script/lumangbayan_script.php");
	}

	if($data[10]['Tacliganrecords'] != 0){
		foreach ($data[14]['tacligandough'] as $datum) {
			$label5[] = $datum['patientClass'];
			$dataset5[] = $datum['numPerPatient'];
		}
		foreach ($data[15]['tacliganpie'] as $datum) {
			$label15[] = $datum['patientAge'];
			$dataset15[] = $datum['numPerPatient'];
		}
		include("includes/barangay_modal/tacligan_modal.php");
		include("includes/barangay_script/tacligan_script.php");
	}

	if($data[11]['Poblacionrecords'] != 0){
		foreach ($data[14]['poblaciondough'] as $datum) {
			$label6[] = $datum['patientClass'];
			$dataset6[] = $datum['numPerPatient'];
		}
		foreach ($data[15]['poblacionpie'] as $datum) {
			$label16[] = $datum['patientAge'];
			$dataset16[] = $datum['numPerPatient'];
		}
		include("includes/barangay_modal/poblacion_modal.php");
		include("includes/barangay_script/poblacion_script.php");
	}

	if($data[12]['Caagutayanrecords'] != 0){
		foreach ($data[14]['caagutayandough'] as $datum) {
			$label7[] = $datum['patientClass'];
			$dataset7[] = $datum['numPerPatient'];
		}
		foreach ($data[15]['caagutayanpie'] as $datum) {
			$label17[] = $datum['patientAge'];
			$dataset17[] = $datum['numPerPatient'];
		}
		include("includes/barangay_modal/caagutayan_modal.php");
		include("includes/barangay_script/caagutayan_script.php");
	}

?>

<?php include("includes/footer.php");?>
<?php include("includes/scripts.php");?>


<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/js/jquery-2.2.3.min.js"></script>
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/js/bootstrap.js"></script>
<script>
function myFunction() {
  var x = document.getElementById("demo");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
</body>
</html>