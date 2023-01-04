<?php //require("libs/fetch_data.php");?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>RHU San Teodoro - About Us</title>
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

</style>
<body>
	<?php include("includes/header.php");?>
	<div class="banner-inner4">
	</div>
	<!--/main-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.php">Home</a>
		</li>
		<li class="breadcrumb-item active">About Us</li>
	</ol>
	<section class="main-content-w3layouts-agileits">

		<div class="container">

			<div class="row">
				<!--left-->
				<div class="col-lg-12 left-blog-info-w3layouts-agileits">
					<?php include 'includes/message.php'; ?>
					<h3 class="tittle">About Us</h3>
					<p class="sub text-center">Rural Health Unit of San Teodoro</p>
					
					<br>
					
					<div class="contact-map">

						<br>
						<h3 style="color: teal; font-style: bold">Rural Health Unit of San Teodoro</h3>
						<br>
						<div class="row">
						<div class="col-sm-6">
						<iframe src="https://www.google.com/maps/embed?pb=!4v1666828282342!6m8!1m7!1s7JVPjLZAh1lBUcCiMI3V_A!2m2!1d13.42761192007582!2d121.021207775316!3f271.4621386554139!4f0.8008482778639774!5f1.7939029247613982" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
						<div class="col-sm-6">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3880.751680282488!2d121.01834281413967!3d13.427691808340674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bcf0edbd412673%3A0x962d3555f10af42d!2sSan%20Teodoro%20Rural%20Health%20Unit!5e0!3m2!1sen!2sph!4v1665657667820!5m2!1sen!2sph" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</div>
						<!--<p>San Teodoro, officially the Municipality of San Teodoro, is a 4th class municipality in the province of Oriental Mindoro, Philippines.</p>-->
					</div>
					<hr>
					<h6><i class="fa fa-clock"></i> Opening Hours: 7:00AM - 6:00pm</h6>
					<br>
					<h6><i class="fa fa-phone"></i> 0966 751 5691</h6>
					<br>
					<h6><i class="fa fa-envelope"></i> rhusanteodoro@gmail.com</h6>
					<br>
					<h6><i class="fa fa-facebook-official"></i><a href="https://www.facebook.com/RHUSanTeodoro"> www.facebook.com/RHUSanTeodoro</a></h6>
					


				</div>

				<!-- include("includes/sidebar.php"); -->

			</div>
			<?php include("includes/team.php"); ?>
		</div>
	</section>
<?php include("includes/footer.php");?>
<?php include("includes/scripts.php");?>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
			$('html,body').animate({
				scrollTop: $(this.hash).offset().top
				}, 900);
			});
			});
	</script>
					<!--// end-smoth-scrolling -->

	<script>
		$(document).ready(function () {
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
									
		$().UItoTop({
			easingType: 'easeOutQuart'
		});

		});
	</script>

<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/js/jquery-2.2.3.min.js"></script>
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/js/bootstrap.js"></script>
</body>
</html>