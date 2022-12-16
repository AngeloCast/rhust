<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <a href="<?=site_url('admin/users'); ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-arrow-left"></i> Back</a> 
			
			<h1 style="margin-top: 10px;">
				<i class="fas fa-info-circle"></i> 
        <strong>
        User Information
      	</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User Information</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php include 'includes/message.php'; ?>
      		<div class="row">
        		<div class="col-sm-4 mx-auto">
          		<div class="box">
            		<div class="box-header with-border">
									<div class="col-sm-12">
	            			<img src="<?php echo BASE_URL . PUBLIC_DIR . '/images/' . $data[2]['photo']; ?>" style="margin-top: 10px; height: 100%; width: 100%; max-height: auto; max-width: auto;">									
	            		</div>
								</div>

								<div class="box-body">
									
									<div class="col-sm-12">
										<div style="color: white; padding: 10px; background-color: green">
										<?php if($data[2]['status'] == 1){
												echo '<strong>REGISTERED </strong>';
											}
											else{
												echo '<strong>NOT REGISTERED </strong>';
											}
										?>
										</div>
									</div>

									<div class="col-sm-12">
										<h5><b>FULL NAME: </b><?=$data[2]['fullname'];?></h5>
									</div>
									<div class="col-sm-12">
										<h5><b>EMAIL: </b><?=$data[2]['email'];?></h5>
									</div>
									<div class="col-sm-12">
										<h5><b>CONTACT NUMBER: </b><?=$data[2]['cnumber'];?></h5>
									</div>
									<div class="col-sm-12">
										<h5><b>ADDRESS: </b><?=$data[2]['address'];?></h5>
									</div>
									
								</div>
							</div>
						</div>
					</div>
		</section>
  </div>
  	<?php include 'includes/footer.php'; ?>
  	<?php include 'includes/scripts.php'; ?>
</div>

</body>
</html>