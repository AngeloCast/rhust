<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>RHU San Teodoro - Read Article</title>
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

	<!--/main-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.php">Home</a>
		</li>
		<li class="breadcrumb-item active">Read <?php if($data[7]==3){ echo ' HEALTH FAQS'; } elseif($data[7]==4){ echo ' HEALTH INFORMATION'; } else{ echo ' NEWS AND ACTIVITIES';} ?></li>
	</ol>

	<section class="main-content-w3layouts-agileits">

		<div class="container">
			
			<div class="row">
				
				<!--left-->
				<div class="col-lg-8 left-blog-info-w3layouts-agileits text-left" style="border: 1px solid #ced4da;">
					<br>
					<form class="form-inline" action="<?=site_url('home/search_article');?>" method="post">
						<div class="form-group mb-2">
							<h3 style="text-align: left;"><i class="fa fa-list"></i> <?php if($data[7]==3){ echo ' HEALTH FAQS'; } elseif($data[7]==4){ echo ' HEALTH INFORMATION'; } else{ echo ' NEWS AND ACTIVITIES';} ?></h3>
						</div>
						<div class="form-group mx-sm-2 mb-2">
							<label for="inputsearch" class="sr-only">Search</label>
							<input type="hidden" name="category" value="2">
							<input type="text" class="form-control" id="inputsearch" name="title" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-primary mb-2">Search</button>
					</form>
					<br>
					<?php include("includes/message.php");?>
					<hr>
					
					<?php 
						if(empty($data[0])){
				                echo '<div class="blog-grids row mt-3">
										<div class="col-sm-12 blog-grid-left">
											<p style="font-size: 15px;">Sorry, no articles were found using the keyword: '.strtoupper($data[6]).'</p>
										</div>
									</div>';
				        }
				        else{
							
				      		foreach ($data[0] as $datas => $info) {
				      		# code...
								
							echo '<div class="blog-grids row mb-3">
							<div class="col-sm-12 blog-grid-left">

									<div class="imgcard">
										<a href="'.site_url('home/view_post/'.$info['id']).'"><img class="card_image" src="'.site_url('public/images/'.$info['photo']).'"  alt="health info img" ></a>
										
										<h5><a href="'.site_url('home/view_post/'.$info['id']).'">'.$info['title'].'</a></h5>
										<div class="shorten">'.$info['content'].'</div>
										<div class="sub-meta">					
											<span><i class="fa fa-clock"></i> '.$info['date'].'</span>
											<a href="'.site_url('home/view_post/'.$info['id']).'" style="float: right; font-size: 14px;" href="">Read More >></a>	
										</div>
										</div>
									</div>
							</div><hr>';
							}
							echo $data[4] . '<br>';
						}
					?>
					
				</div>
				<?php include("includes/sidebar_article.php");?>

			</div>
		</div>
	</section>
<?php include("includes/footer.php");?>
<?php include("includes/scripts.php");?>
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/js/jquery-2.2.3.min.js"></script>
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/js/bootstrap.js"></script>
</body>
</html>