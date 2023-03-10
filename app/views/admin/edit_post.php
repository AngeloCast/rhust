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
	h1.published{
		color: #68cb40;
		font-weight: bold;
	}
	h1.draft{
		color: red;
		font-weight: bold;
	}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    	<?php
		   if($data[2]['category'] == 1) {
		    echo '<a href="'.site_url('admin/announcements').'" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-arrow-left"></i> BACK</a>';
		   }
		   elseif($data[2]['category'] == 2) {
		    echo '<a href="'.site_url('admin/news_activities').'" class="btn btn-primary btn-sm btn-flat"> <i class="fa fa-arrow-left"></i> BACK</a>';
		   }
		   elseif($data[2]['category'] == 3) {
		    echo '<a href="'.site_url('admin/health_faqs').'" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-arrow-left"></i> BACK</a>';
		   }
		   else{
		    echo '<a href="'.site_url('admin/health_info').'" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-arrow-left"></i> BACK</a>';
		   }
		  ?>
      <h1 style="margin-top: 20px;">
      	<i class="fa fa-edit"></i> 
      	<strong>
      	<?php
        	if($data[2]['category'] == 1){
        		echo 'Edit Announcement';
        	}
        	else if($data[2]['category'] == 2){
        		echo 'Edit News & Activities';
        	}
        	else if($data[2]['category'] == 3){
        		echo 'Edit Health FAQs';
        	}
        	else{
        		echo 'Edit Health Information';
        	}
        ?>
      </strong>
      - <i style="font-size: 18px;">Last edited: <?php echo date('M j, Y h:i A', strtotime($data[2]['edited']));?></i></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Post</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php include 'includes/message.php'; ?>
      	<div class="row">
        	<div class="col-sm-12 mx-auto">
						  <?php
		        				if($data[2]['status'] == 'publish'){
		        					echo '<h1 class="published">PUBLISHED';
		        				}
		        				else{
		        					echo '<h1 class="draft">DRAFT';
		        				}
		        			?>
		        	</h1>
          		<div class="box" style="padding: 40px;">

	            	<div class="box-header with-border">

	            		<div class="box-body">
		            		<div class="col-sm-12 text-right">
		            			<?php 
				        				if($data[2]['status'] == 'publish'){
				        					echo "<h5><b>Date Published:</b> " . $data[2]['date'] . "</h5>"	;
				        				}
				        				else{
				        					echo "<h5><b>Date Created:</b> " . $data[2]['date'] . "</h5>"	;
				        				}
				        			?>
		            			
		            		</div>

		            	<?php
		            	if($data[2]['category'] != 1){
		            		echo
			            	'<div class="col-sm-12">
			            		<div class="imgcard">
				            		<img class="card_image" src="'.BASE_URL . PUBLIC_DIR . '/images/' . $data[2]['photo'] .'"  style="margin-top: 10px;"><br><br>
				            	</div>
				            </div>';
			          		}
			          	?>

		        	<form class="form-horizontal" method="POST" action="<?=site_url('admin/update_post');?>" enctype="multipart/form-data">
		        		<input type="hidden" name="id" value="<?=$data[2]['id'];?>">
		        		<input type="hidden" name="title" value="<?=$data[2]['title'];?>">
		        		<input type="hidden" name="photo" value="<?=$data[2]['photo'];?>">
		        		<input type="hidden" name="status" value="<?=$data[2]['status'];?>">
		        		<input type="hidden" name="category" value="<?=$data[2]['category'];?>">
		        		<input type="hidden" name="content" value="<?=$data[2]['content'];?>">

		        				<?php
			            	if($data[2]['category'] != 1){
			            		echo
					        		'<div class="form-group">
								        <div class="col-sm-4">
								        		<label for="photo" class="control-label">Change Photo</label>
								            <input class="form-control" type="file" accept="image/*" id="fileToUpload" name="fileToUpload">
								        </div>
							       	</div>
							       	<hr>';
							       	}
						       	?>
						       	<div class="form-group">

		                    <div class="col-sm-6">
		                    	<label for="title" class="control-label">Title</label>
		                      <input type="text" class="form-control" id="title" name="title" value="<?=$data[2]['title'];?>" required>
		                    </div>
		                </div>
		                <?php
			            	if($data[2]['category'] != 1){
			            		echo'
			                <div class="form-group">
												<div class="col-sm-3">
			                    <label for="category" class="control-label">Category</label>
			                    	<select class="form-control" id="category" name="category" required>';
			              
						            if($data[2]['category'] == '2'){
						           		echo '<option value="'.$data[2]['category'].'" selected>News & Activities</option>
						                    <option value="3">Health FAQs</option> 
						                    <option value="4">Health Information</option>';
						            }
						            else if($data[2]['category'] == '3'){
						           		echo '<option value="'.$data[2]['category'].'" selected>Health FAQs</option>
						                    <option value="2">News & Activities</option> 
						                    <option value="4">Health Information</option>';
						            }
						            else{
						             	echo '<option value="'.$data[2]['category'].'" selected>Other</option>
						                    <option value="2">News & Activities</option> 
						                    <option value="3">Health FAQs</option>';
						            }
							        echo'</select></div></div>';
							        }
		                ?>

		                
		                <div class="form-group">
		                    <div class="col-sm-12">
		                    	<label for="content" class="control-label">Content</label>
		                      <textarea rows="10" class="form-control" id="editor1" name="content" required><?=$data[2]['content'];?></textarea>
		                    </div>
		                </div>
			            <div class="box-footer text-right">
			            	<?php 
			        				if($data[2]['status'] == 'publish'){
			        					echo '
			              			<button type="submit" name="save" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Save Changes</button>';
			        				}
			        				else{
			        					echo '<button type="submit" name="publish" class="btn btn-primary btn-flat"><i class="fa fa-paper-plane"></i> Publish</button>
			              	<button type="submit" name="save" class="btn btn-success btn-flat"><i class="fa fa-save"></i> Save Changes</button>';
			        				}
			        			?>
			              	
			              </form>
			              </div>
			            </div>
	        		</div>
    			</div>
			</div>
		</div>

		<?php 
			if($data[2]['category'] == 2)
			{
				echo '
				<div class="row">
		        	<div class="col-sm-12 mx-auto">
						<div class="box" style="padding: 20px 40px 40px 40px;">
							
							<div class="box-body">
							<div class="col-sm-12">
								<h4><b>Update Gallery <i class="fa fa-edit"></i></b></h4>
							</div>
				        		<form method="POST" action="'.site_url('admin/add_gallery').'" enctype="multipart/form-data">
				        			<input type="hidden" name="id" value="'.$data[2]['id'].'">
				        			<div class="form-group">

				        				<div class="col-sm-6">
					                    	<input class="form-control" accept="image/*" type="file" name="images[]" multiple>
					                    </div>
					                    <div class="col-sm-6">
					                    	<button class="btn-info btn" type="submit" name="upload">Upload Image/s</button>
					                    </div>
				                    </div>

				                </form>
				                <div class="col-sm-12">
				                <hr>
				                <br>
				                	<h4><b>Current Gallery <i class="fa fa-photo"></i></b> - ('.count($data[3]).') Images</h4>
				                	<div class="row">';
				
				if(count($data[3]) == 0){
					echo "<div class='col-sm-12'><i>News gallery is currently empty! Upload your images above</i></div>";
				}
				foreach ($data[3] as $images => $gallery) {
					echo'
				                
                		<div class="col-sm-3" >
						  	<div class="card" style="width: 100%; margin-bottom: 10px;">
						    	<img class="card-img-top" src="'.BASE_URL . PUBLIC_DIR . '/images/gallery/' . $gallery['image'] .'" alt="Card image" style="width:100%; border: 1px solid black; height: auto;max-height: 120px; object-fit: cover;">
							    <div class="card-body">
							      <a style="width: 100%" href="'.site_url('admin/delete_gallery/'.$gallery['id'].'/'.$gallery['n_id']).'" class="btn btn-sm btn-danger">Delete <i class="fa fa-trash"></i></a>
							    </div>
						  	</div>
					  	</div>';
					}

					echo
									'</div>
				               	</div>
		                	</div>
		                </div>
					</div>
				</div>';
				
			}
		?>
	</div>
	</section>
  	
    <?php include 'includes/scripts.php'; ?>
    <?php include 'includes/footer.php'; ?>

</div>
</body>
</html>