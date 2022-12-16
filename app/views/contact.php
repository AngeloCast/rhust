<?php //require("libs/fetch_data.php");?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>RHU San Teodoro - Contact Us</title>
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

<body>
	<?php include("header.php");?>
	</div>
	<!--/main-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.php">Home</a>
		</li>
		<li class="breadcrumb-item active">Contact Us</li>
	</ol>
	
	<section class="main-content-w3layouts-agileits">

		<div class="container">
			<div class="row">
				
				<!--left-->
				<div class="col-lg-8 left-blog-info-w3layouts-agileits text-left" style="border: solid 2px #ced4da; padding: 10px; border-radius: 10px;">
					<?php include 'includes/message.php'; ?>
					<br>
					<h3 class="tittle">Contact Us</h3>
					<h6 class="sub text-center">Send inquiry to the Rural Health Unit of San Teodoro</h6>
					<br>
					<br>
							<form class="form-horizontal" action="<?=site_url('home/send_inquiry');?>" method="post">
								<input type="hidden" name="" value=""> 
											
								<div class="form-group">
									<label for="firstname" class="col-sm-4 control-label"><b>Firstname: </b></label>

									<div class="col-sm-12">
									  <input type="text" placeholder="Firstname" class="form-control" name="firstname" value="" required>
									</div>
								</div>

								<div class="form-group">
									<label for="lastname" class="col-sm-4 control-label"><b>Lastname: </b></label>

									<div class="col-sm-12">
									  <input type="text" placeholder="Lastname" class="form-control" name="lastname" value="" required>
									</div>
								</div>
								
								<div class="form-group">
									<label for="email" class="col-sm-4 control-label"><b>Email: </b></label>

									<div class="col-sm-12">
									  <input type="email" placeholder="Email" class="form-control" name="email" required>
									</div>
								</div>
								
								<div class="form-group">
									<label for="subject" class="col-sm-4 control-label"><b>Subject: </b></label>

									<div class="col-sm-12">
									  <input type="text" class="form-control" name="subject" required>
									</div>
								</div>

								<div class="form-group">
									<label for="message" class="col-sm-4 control-label"><b>Message: </b></label>

									<div class="col-sm-12">
									  <textarea type="text" rows="8" placeholder="Enter message here...." class="form-control" name="message" required></textarea>
									</div>
								</div>      
								
								<div class="form-group">
									<div class="col-sm-8">
									  <button type="submit" style="color: white; background-color: teal;" class="btn btn-md btn-flat">Send Inquiry <i class="fa fa-paper-plane"></i></button>
									</div>
								</div> 
								
							</form>

				</div>
				<?php include("includes/sidebar_contact.php");?>

			</div>
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
		<a href="#home" class="scroll" id="toTop" style="display: block;">
			<span id="toTopHover" style="opacity: 1;"> </span>
		</a>
<script src="http://localhost/rhust/public/js/jquery-2.2.3.min.js"></script>
<script src="http://localhost/rhust/public/js/bootstrap.js"></script>
</body>
</html>