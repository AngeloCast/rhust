<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<style>
		input[type="file"]{
        height:20px;
  }

    input[type="file"]::-webkit-file-upload-button{
        height:20px;
  }
  textarea{
    resize: vertical;
  }
	</style>
  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <a href="<?=site_url('admin/inquiry'); ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-arrow-left"></i> Back</a> 
			
			<h1 style="margin-top: 10px;">
				<i class="fas fa-info-circle"></i> 
        <strong>
        INQUIRY DETAILS
      	</strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Inquiry Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php include 'includes/message.php'; ?>
      <div class="row">
        <div class="col-sm-12 mx-auto">
          <div class="box" style="padding: 20px;">
            <div class="box-header with-border">
	            
            </div>
            <div class="box-body">
              
		        <div class="row mt-5">
		            <div class= "col-sm-12 mx-auto">
		                <div class="card">
		                    <div class= "card-body">
								<div class="row">
			                    	<div class="col-sm-12">
			                    		<b><h5>From: </b> <?=$data[2]['firstname'] . ' ' . $data[2]['lastname'];?></h5>
			                    	</div>
			                    	<div class="col-sm-12">
			                    		<b><h5>Email:</b>  <?=$data[2]['email'];?></h5>
			                    	</div>
			                    	<div class="col-sm-12">
			                    		<b><h5>Date: </b><?=$data[2]['date'];?></h5>
			                    	</div>


			                    	<div class="col-sm-12">
			                    		<hr>
			                    		<b><h4>Subject:</b> <?=$data[2]['subject'];?></h4>
			                    	</div>
			                    	
			                    	<div class="col-sm-12">
			                    		<br>
			                    		<textarea class="form-control" readonly><?=$data[2]['message'];?></textarea>
			                    		<hr>
			                    	</div>
						        
						        <!--<button type="submit" style="color: white; float: right;" class="btn btn-success btn-md btn-flat"></button>--->
							        <div class="col-sm-12">
								        <a href="#replyinquiry" style="color: white; float: right;" data-toggle="modal" class="btn btn-success btn-md btn-flat"> Reply <i class="fa fa-reply"></i></a>
								        <a href="<?=site_url('admin/inquiry'); ?>" class='btn btn-danger btn-md btn-flat' style="color: white; float: right;  margin-right: 5px;"> Back</a>
								    </div>
						    	</div>
							</div>			
						
					</div>
				</div>
			</div>
            </div>
          </div>
        </div>
      </div>
    </section>
     
  </div>
  	<?php include 'includes/footer.php'; ?>
  	<?php include 'includes/inquiry_modal.php'; ?>
    <?php include 'includes/scripts.php'; ?>

</div>

</body>
</html>