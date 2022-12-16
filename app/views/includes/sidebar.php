
<aside class="col-lg-4 agileits-w3ls-right-blog-con text-right" style="padding: 0px 40px 40px 40px;">
	<div class="right-blog-info text-left">
				
				<?php
					if(!empty($data[2])){
						echo
						'<ul class="list-group single"><li class="list-group-item d-flex justify-content-between align-items-center" style="border: 3px dashed darkorange">
							<div class="col-12 text-center">
								<h6><strong><center>ANNOUNCEMENT <i class="fa fa-bell faa-ring animated"></i></strong></center></h6>
								
								<h6 style="font-size: 13px; width: 100%; margin-top: 5px; color: #007eff;"><a href="#details_'.$data[2]['id'].'" data-toggle="modal">'.$data[2]['title'].' <i class="fa fa-info-circle"></i></a></h6>
								
							</div>
						</li></ul><br>';
					}
				?>
			
			<h6 style="background-color: #146e3c; color: white; padding: 10px; font-family: arial;"><strong>Health Articles</strong></h6>
			<ul class="list-group single">
				<?php 
					if(empty($data[1])){
				        echo '<li class="list-group-item d-flex justify-content-between align-items-center">
								<p style="font-size: 15px;">Sorry, No Articles Available...</p>
								</li>
							';
				    }
					foreach ($data[1] as $posts => $articles) {
					echo '<li class="list-group-item d-flex justify-content-between align-items-center">
						<h6 style="font-size: 13px">'.$articles['title'].'</h6>
						<span class="badge"><a style="color: #007bff;"href="'.site_url('home/view_post/'.$articles['id']).'">Read more>></a></span>
						</li>';
					}
				?>
			</ul>
			<br>
			<h6 style="background-color: #146e3c; color: white; padding: 10px;font-family: arial;"><strong>News & Activities</strong></h6>
			<div class="tech-btm" style="padding: 10px 10px 0px 10px; border: 1px solid #ced4da; background-color: white;">		
					<?php 
						if(empty($data[0])){
					        echo '<div class="blog-grids row mb-3"><div class="col-sm-12 blog-grid-right">
									<p style="font-size: 15px;">Sorry, No News Available...</p>
									</div></div>
								';
					    }
						foreach ($data[0] as $posts => $news) {
				      	# code...
							echo '<div class="blog-grids row">
							
								<div class="col-sm-12 blog-grid-right">
									<h6 style="font-size: 12px;"><i class="fa fa-circle"></i> <a style="color: #007eff; font-size: 12px;" href="'.site_url('home/view_post/'.$news['id']).'">'.$news['title'].'</a></h6>
									<div class="sub-meta">
										<span><i class="fa fa-clock"></i> '.$news['date'].'</span>
									</div>
								</div>
							</div>';
						}
					?>
					<div class="text-right mb-2"> 
						<p style="font-size: 12px; font-family: arial;"><a href="<?=site_url('home/news');?>">View more>></a></p>
					</div>
			</div>
			
			<div class="text-btm" style="padding: 10px 10px 0px 10px; border: 1px solid #ced4da; background-color: white;">
				<h6 style="background-color: #146e3c; color: white; padding: 10px;font-family: arial;"><strong>Latest Event</strong></h6><br>
				<?php 
						if(empty($data[5])){
					        echo '<div class="blog-grids row mb-3"><div class="col-sm-12 blog-grid-right">
									<p style="font-size: 15px;">No Upcoming Events</p>
									</div></div>
								';
					    }
					    else{
						    foreach ($data[5] as $events => $event) {

								echo  '<div class="blog-grids row">
									<div class="col-md-12">
										<img src="'.site_url('public/images/'.$event['photo']).'" class="img-fluid" alt="rhu image">
									</div>
									<div class="col-md-12 mt-2">
										<h6 style="font-size: 12px; color: #007eff">'.$event['title'].'</a></h6>
										<div class="sub-meta">
											<p style="font-size: 12px;"><i class="fa fa-calendar"></i> '.date('M d', strtotime($event['start_datetime'])).' - '.date('M d Y', strtotime($event['end_datetime'])).'</p>
											
										</div>
									</div>
								</div>';
							}
						}	
				?>
				<hr style="margin: 0px;">
				<div class="text-center mt-2 mb-2"> 
					<p style="font-size: 12px; font-family: arial;"><a href="<?=site_url('home/events');?>">Click here to see more upcoming events</a></p>
				</div>
			</div>
			<br>
			<hr>
			<div class="blog-grids row">
				<div class="col-sm-12 blog-grid-left">
					<img src="<?php echo BASE_URL . PUBLIC_DIR . '/images/hotlines.jpg'; ?>" style="width: 100%; height: auto;"></a>
				</div>
			</div>
			<br>
			<div class="blog-grids row">
				<div class="col-sm-12 blog-grid-left">
					<h5 style="font-size: 12px;">Have a question? <a style="color: teal;" href="<?=site_url('home/contact_us'); ?>"> Send inquiry <i class="fa fa-envelope"></i> >></a></h5>
				</div>
			</div>
		</div>
	</div>
</aside>

