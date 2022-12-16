<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>
<style type="text/css">
	.imgcard{
		background: white;
		
	}
	.card_image{
		width: 100%;
		height: auto;
		max-height: 400px;
		object-fit: cover;
		border: 3px solid #999;
	}
	h2{
		color: #68cb40;
		font-weight: bold;
	}
	textarea{
    resize: vertical;
  }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
			<a href="<?=site_url('admin/events'); ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-arrow-left"></i> Back</a> 
			
			<h1 style="margin-top: 10px;">
				Edit Event
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Event</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php include 'includes/message.php'; ?>
      	<div class="row">
        	<div class="col-sm-12 mx-auto">
		        
          		<div class="box" style="padding: 40px;">
	            	<div class="box-header with-border">
	            		
		            	<div class="col-sm-12">
		            		<div class="imgcard">
			            		<img class="card_image" src="<?php echo BASE_URL . PUBLIC_DIR . '/images/' . $data[2]['photo']; ?>"  style="margin-top: 10px;"><br><br>
			            	</div>
			            	
			            </div>

		        	<form class="form-horizontal" method="POST" action="<?=site_url('admin/update_event');?>" enctype="multipart/form-data">
		        		<input type="hidden" name="id" value="<?=$data[2]['id'];?>">
		        		<input type="hidden" name="photo" value="<?=$data[2]['photo'];?>">
				        		<div class="form-group">

							        <div class="col-sm-4">
							        		<label for="photo" class="control-label">Change Photo</label>
							            <input class="form-control" type="file" accept="image/*" id="fileToUpload" name="fileToUpload">
							        </div>
						       	</div>
						       	<hr>
						       	<div class="form-group">

		                    <div class="col-sm-6">
		                    	<label for="title" class="control-label">Title</label>
		                      <input type="text" class="form-control" id="title" name="title" value="<?=$data[2]['title'];?>" required>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <div class="col-sm-12">
		                    	<label for="details" class="control-label">Details</label>
		                      <textarea rows="10" class="form-control" name="details" required><?=$data[2]['details'];?></textarea>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <div class="col-sm-4">
		                    	<label for="start_datetime" class="control-label">Start of event</label>
		                      <input type="datetime-local" class="form-control" name="start_datetime" value="<?=$data[2]['start_datetime'];?>" required>
		                    </div>
		                </div>

		                <div class="form-group">
		                    <div class="col-sm-4">
		                    	<label for="end_datetime" class="control-label">End of event</label>
		                      <input type="datetime-local" class="form-control" name="end_datetime" value="<?=$data[2]['end_datetime'];?>" required>
		                    </div>
		                </div>
			            <div class="modal-footer">
			              	<button type="submit" name="submit" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Save Changes</button>';
			              </form>
			            </div>
	        		</div>
    			</div>
			</div>
		</div>
	</div>
	</section>
  	
    <?php include 'includes/scripts.php'; ?>
    <?php include 'includes/footer.php'; ?>

</div>

</body>
</html>