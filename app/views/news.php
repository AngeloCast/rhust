<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>RHU San Teodoro - News & Activities</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="<?php echo BASE_URL . PUBLIC_DIR . '/images/MHOST_icon.png'; ?>">
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
		transition: transform .3s;
		-webkit-filter: brightness(100%);
	}
	.card_image:hover {
	  	transform: scale(1.03);
	  	-webkit-filter: brightness(80%);
	    -webkit-transition: all 0.5s ease;
	    -moz-transition: all 0.5s ease;
	    -o-transition: all 0.5s ease;
	    -ms-transition: all 0.5s ease;
	    transition: all 0.5s ease;
	}
</style>
<body>
	<?php include("includes/header.php");?>
	<div class="banner-inner2">
	</div>
	<!--/main-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.php">Home</a>
		</li>
		<li class="breadcrumb-item active">News & Activities</li>
	</ol>

	<section class="main-content-w3layouts-agileits">
		<div class="container">

			<div class="row">
				<!--left-->
				<div class="col-lg-8 left-blog-info-w3layouts-agileits text-left"  style="border: 1px solid #ced4da;">

					<br><h3 style="text-align: left;"><i class="fa fa-list"></i> NEWS & ACTIVITIES</h3><br><br>
					<?php

						
				        if(!empty($data[0])){
				      		foreach ($data[0] as $datas => $news) {
				      		# code...
				      	
							echo '<div class="blog-grids row mb-3">
							<div class="col-sm-12 blog-grid-left">
									<div class="imgcard">
										<a href="'.site_url('home/view_post/'.$news['id']).'"><img class="card_image" src="'.site_url('public/images/'.$news['photo']).'"  alt="news img" ></a>
										
										<h5><a href="'.site_url('home/view_post/'.$news['id']).'">'.$news['title'].'</a></h5>
										<div class="shorten">'.$news['content'].'</div>
										<div class="sub-meta">					
											<span><i class="fa fa-clock"></i> '. $news['date'].'</span>
											<a href="'.site_url('home/view_post/'.$news['id']).'" style="float: right; font-size: 14px;" href="">Read More >></a>	
										</div>
										</div>
									</div>
							</div><hr>';
							}
							echo $data[4] . '<br>';
						}
						else{
				                echo '<div class="blog-grids row mt-3">
										<div class="col-sm-12 blog-grid-left">
											<p style="font-size: 15px;">Sorry, No News Available...</p>
										</div>
									</div>';
						}
						
					?>
					
					
				</div>
				<?php include("includes/sidebar_news.php");?>

			</div>
		</div>
		
	</section>
<?php include("includes/chat.php");?>
<?php include("includes/footer.php");?>
<?php include("includes/scripts.php");?>
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/js/jquery-2.2.3.min.js"></script>
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/js/bootstrap.js"></script>
</body>

</html>