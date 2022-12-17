<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>RHUST - <?php if(!empty($data[4])) { echo $data[4]['title']; } else { echo 'Post does not exist'; }?></title>
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

	.shorten{
		display: block;
		width: 100%;
	    white-space: nowrap;
	    overflow: hidden;
	    text-overflow: ellipsis;
	}
	.imgcard{
		background: white;
		width: 100%;
		padding: 3px;
	}
	.card_image{
		width: 100%;
		height: 200px;
		object-fit: cover;
		object-position: top left;
		border: 3px solid gray;
	}

</style>
<body>
	<?php include("header.php");?>
	<section class="main-content-w3layouts-agileits"  style="background-color: #e9ecef; padding-top: 40px">
		<div class="container">

			<div class="row" >
				<!--left-->
				<div class="col-lg-8 left-blog-info-w3layouts-agileits text-left" style="padding: 30px 50px 50px 50px; background-color: white;">

					<?php 
						if(empty($data[4])){
							echo 'Sorry, post does not exist...';
						}
						else{
				      	# code...
							echo '<br><h2 style="font-family: arial narrow;">'. $data[4]['title'] . '</h2>
									<p ><i>ADMIN</i> - <i class="fa fa-clock"></i> Published ' . date('F d Y', strtotime($data[4]['date'])) . '</p>
									<br>

							<div class="blog-grids row mb-3">
								<div class="col-sm-12 blog-grid-left">
									<img width="100%" height="auto" style="border: solid gray 1px;" src="'.site_url('public/images/'.$data[4]['photo']).'"  alt="post image" >
									

									<p style="margin-top: 20px;"><b>'.$data[4]['content'].'</b></p>
								</div>	
							</div>';
						}
					?>
					<hr>
				
				<br>
				<?php include("includes/gallery.php");?>
				</div>

				<?php include("includes/sidebar_post.php");?>

			</div>
		</div>

	</section>
<?php include("includes/footer.php");?>
<?php include("includes/scripts.php");?>
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/js/jquery-2.2.3.min.js"></script>
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/js/bootstrap.js"></script>
</body>
</html>