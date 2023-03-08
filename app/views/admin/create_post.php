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
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<?php
	    	if($data[2] == 'news_activities') {
			    echo '<a href="'.site_url('admin/news_activities').'" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-arrow-left"></i> BACK</a>';
			   }
			   elseif($data[2] == 'health_info') {
			    echo '<a href="'.site_url('admin/health_info').'" class="btn btn-primary btn-sm btn-flat"> <i class="fa fa-arrow-left"></i> BACK</a>';
			   }
			   elseif($data[2] == 'health_faqs') {
			    echo '<a href="'.site_url('admin/health_faqs').'" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-arrow-left"></i> BACK</a>';
			   }
			   else{
			    echo '<a href="'.site_url('admin/announcements').'" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-arrow-left"></i> BACK</a>';
			   }
    	?>
      <h1 style="margin-top: 10px;">
      	<i class="fa fa-edit"></i> 
      	<strong>
        CREATE 
        <?php
        	if($data[2] == 'news_activities'){
        		echo 'NEWS & ACTIVITIES'; 
        	}
         	elseif($data[2] == 'health_faqs'){
         		echo 'HEALTH FAQs'; 
         	}
         	elseif($data[2] == 'health_info'){
         		echo 'HEALTH INFORMATION'; 
         	}
         	else{
         		echo 'ANNOUNCEMENT'; 
         	}
       	?>
       	 
        </strong>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create New Post</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php include 'includes/message.php'; ?>
      	<div class="row">
        	<div class="col-sm-12 mx-auto">
        		<div class="box" style="padding: 40px;">
            	<div class="box-body">
            		<div class= "col-lg-12">
	        		<form class="form-horizontal" method="POST" action="<?=site_url('admin/post');?>" enctype="multipart/form-data">
	            	<input type="hidden" name="userid" value="<?=$data[0]['id'];?>">
	            	<?php 
            		if($data[2] == 'announcement'){
            			echo '<input type="hidden" name="category" value="1">';
            		}
            		elseif($data[2] == 'news_activities'){
            			echo '<input type="hidden" name="category" value="2">';
            		}
            		elseif($data[2] == 'health_faqs'){
            			echo '<input type="hidden" name="category" value="3">';
            		}
            		else{
            			echo '<input type="hidden" name="category" value="4">';
            		}
            	
            		if($data[2] != 'announcement')
	            		echo
	                '<div class="form-group">

	                    <div class="col-sm-6">
	                    	<label for="photo" class="control-label">Photo</label>

	                      <input class="form-control" type="file" accept="image/*" id="fileToUpload" name="fileToUpload" onchange="preview();" required>
	                      
	                    </div>

	                </div>

	                <div class="form-group">
	                	<div class="col-sm-12">
	                		<label for="photo" class="control-label">Image Preview</label>
			            		<div class="imgcard">
				            		<img class="card_image" id="thumb" src="#"/>
				            	</div>
				            </div>
				          </div>
	                ';
            		?>
                <div class="form-group">

                    <div class="col-sm-6">
                    	<label for="title" class="control-label">Title</label>
                      <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                    	<label for="content" class="control-label">Content</label>
                      <textarea rows="10" id="editor1" class="form-control" id="content" name="content" required> </textarea>
                    </div>
                </div>

                <hr>

		            <div class="form-footer text-right">
		              	<button type="submit" name="draft" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save as draft</button>
		              	<button type="submit" name="publish" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Publish</button>
		              </form>
		            </div>

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
<script type="text/javascript">
    function preview() {
		   thumb.src=URL.createObjectURL(event.target.files[0]);
		}
</script>
</body>
</html>