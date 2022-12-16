<?php //require("libs/fetch_data.php");?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>RHU San Teodoro - Clustering</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="<?php echo BASE_URL . PUBLIC_DIR . '/images/MHOST_logo.jpg'; ?>">
	<meta charset="utf-8">
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/jquery.desoslide.css">
	<link href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/style.css" rel='stylesheet' type='text/css' />
	<link href="<?php echo BASE_URL . PUBLIC_DIR;?>/css/fontawesome-all.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800"
	rel="stylesheet">
</head>
<style>
	#barangay {
		margin-top:  10px;
		margin-left: 30px;
	    -webkit-column-count: 3;
	    -moz-column-count: 3;
	    column-count: 3;
	}
</style>
<body>
	<?php include("header.php");?>

	<!--/main-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.php">Home</a>
		</li>
		<li class="breadcrumb-item active">Disease Clustering</li>
	</ol>
	<section class="main-content-w3layouts-agileits">

		<div class="container">

			<div class="row">
				<!--left-->
				<div class="col-lg-12 left-blog-info-w3layouts-agileits">
					<?php include 'includes/message.php'; ?>
					<h3 class="tittle">Disease Clustering</h3>
					<p class="sub text-center">Rural Health Unit of San Teodoro</p>
					
					<br>
					
					<div class="contact-map">

						<br>
						<h3 style="color: teal; font-style: bold">San Teodoro</h3>
						<br>
						
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3880.751680282488!2d121.01834281413967!3d13.427691808340674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bcf0edbd412673%3A0x962d3555f10af42d!2sSan%20Teodoro%20Rural%20Health%20Unit!5e0!3m2!1sen!2sph!4v1665657667820!5m2!1sen!2sph" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						
						
					</div>
					<hr>
					<h6><i class="fa fa-list"></i> List of Barangay</h6>
						<ul id="barangay">
						    <li><a href="#">Bigaan</a></li>
						    <li><a href="#">Calangatan</a></li>
						    <li><a href="#">Calsapa</a></li>

						    <li><a href="#">Ilag</a></li>
						    <li><a href="#">Lumangbayan</a></li>
						    <li><a href="#">Tacligan</a></li>

						    <li><a href="#">Poblacion</a></li>
						    <li><a href="#">Caagutayan</a></li>
						</ul>
				</div>


			</div>
		</div>
	</section>
<?php include("includes/footer.php");?>
<?php include("includes/scripts.php");?>

<script src="http://localhost/rhu/public/js/jquery-2.2.3.min.js"></script>
<script src="http://localhost/rhu/public/js/bootstrap.js"></script>
</body>
</html>