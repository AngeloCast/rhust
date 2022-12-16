<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>RHU San Teodoro - Health Information</title>
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

	
	<link rel="stylesheet" href="<?php echo BASE_URL . PUBLIC_DIR;?>/calendar/fullcalendar/lib/main.min.css">
	<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/calendar/fullcalendar/lib/main.min.js"></script>
</head>
<style>
	body:not(.modal-open){
  	  	padding-right: 0px !important;
  	}
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
	table, tbody, td, tfoot, th, thead, tr {
	    border-color: #ededed !important;
	    border-style: solid;
	    border-width: 1px !important;
	}
</style>
<body>
	<?php include("header.php");?>

	<!--/main-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.php">Home</a>
		</li>
		<li class="breadcrumb-item active">Events</li>
	</ol>
	<section class="main-content-w3layouts-agileits">
		<div class="container">

			<div class="row">
				<!--left-->
				<div class="col-lg-7 left-blog-info-w3layouts-agileits text-left" style="border: 1px solid #ced4da;">
					<div class="container mt-3" style="background-color: teal">
						<br>
						<h3 style="text-align: center; color: white; font-weight: bold;">EVENT CALENDAR</h3>
						<h6 style="text-align: center; color: white;">Rural Health Unit of San Teodoro</h6>
						<br>
					</div>
					<hr>
					<div class="box">
		                <div class="box-body">
		                  <div id="calendar"></div>
		                </div>
		            </div>
		            <br>
				</div>
				
				<aside class="col-lg-5 agileits-w3ls-right-blog-con text-right" style="padding: 0px 40px 40px 40px;">
					<div class="right-blog-info text-left">

							<h6 style="background-color: #146e3c; color: white; padding: 10px;"><strong><i class="fa fa-list"></i> EVENTS LIST</strong></h6>
							<ul class="list-group single">
								<?php 
									if(empty($data[2])){
								        echo '<li class="list-group-item d-flex justify-content-between align-items-center">
												<p style="font-size: 15px;">Sorry, No Events Available...</p>
												</li>
											';
								    }
								    else{
										foreach ($data[2] as $allevents => $events) {
											echo '

											<div class="modal fade" id="details_'.$events['id'].'">
											    <div class="modal-dialog modal-dialog-centered modal-lg">
											        <div class="modal-content">
											            <div class="modal-header">
											              <h5 class="modal-title"><b>'.$events['title'].'</b></h5>
											              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											                  <span aria-hidden="true">&times;</span></button>
											              
											            </div>
											            <div class="modal-body">
												            <div class="row">
												            	<div class="col-8">
														            <img class="modal-content" style="width: 100%; height: auto;" src="'. BASE_URL . PUBLIC_DIR . '/images/' . $events['photo'].'">	
														        </div>
														        <div class="col-4">
														        	<header class="container p-3 border" style="color: white; background-color: teal; font-size: 14px;"><b>EVENT DETAILS <i class="fa fa-info-circle"></i></b></header>
														        	<div class="container p-3 border">
															        	<h6 style="font-size: 13px;"><i class="fa fa-calendar"></i> '.date('M d', strtotime($events['start_datetime'])).' - '.date('M d Y', strtotime($events['end_datetime'])).'</h6>
															            <hr>
															           	<p style="font-size: 12px;">'.$events['details'].'</p>
														           	</div>
														        </div>
													        </div>
												        </div>
											        </div>
											    </div>
											</div>

											<li class="list-group-item d-flex justify-content-between align-items-center">
											<h6 style="font-size: 12px">'.$events['title'].'</h6>
											<span class="badge"><a href="#details_'.$events['id'].'" class="btn btn-info btn-sm" data-toggle="modal" href="http://localhost/rhust/home/view_post/'.$events['id'].'">Details <i class="fa fa-info-circle"></i></a></span>
											</li>

											';
											
										}
									}
								?>

							</ul>

					</div>
				</aside>

				
			</div>
		</div>
	</section>
<?php include("includes/footer.php");?>
<?php include("includes/scripts.php");?>
<script src="http://localhost/rhust/public/js/jquery-2.2.3.min.js"></script>
<script src="http://localhost/rhust/public/js/bootstrap.js"></script>
<?php 

$schedules = $data[2];
$sched_res = [];
foreach($schedules as $row){
    $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
    $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
    $sched_res[$row['id']] = $row;
}
?>
<!-- ./wrapper -->
<script src="<?php echo BASE_URL . PUBLIC_DIR;?>/calendar/eventscript.js"></script>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
</body>
</html>