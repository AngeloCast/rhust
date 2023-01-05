<aside class="col-lg-4 agileits-w3ls-right-blog-con text-right" style="padding: 0px 40px 40px 40px;">
	<div class="right-blog-info text-left">
			
			<h6 style="background-color: #146e3c; color: white; padding: 10px;"><strong><i class="fa fa-list"></i> Health FAQs</strong></h6>
			<ul class="list-group single">
				<?php 
					if(empty($data[0])){
				        echo '<li class="list-group-item d-flex justify-content-between align-items-center">
								<p style="font-size: 12px;">Sorry, No Articles Available...</p>
								</li>
							';
				    }
					foreach ($data[0] as $posts => $articles) {
					echo '<li class="list-group-item d-flex justify-content-between align-items-center">
						
						<p style="font-size: 10px;"><i class="fa fa-circle fa-sm"></i></p><h6 style="font-size: 12px"> <a style="color: #007bff;"href="'.site_url('home/faqs/'.$articles['id']).'">'.$articles['title'].'</h6> </a>
						</li>';
					}
				?>
			</ul>
			<br>
			<div class="blog-grids row">
				<div class="col-sm-12 blog-grid-left">
					<h5 style="font-size: 12px;">Have a question? <a style="color: teal;" href="<?=site_url('home/contact_us'); ?>"> Send inquiry <i class="fa fa-envelope"></i> >></a></h5>
				</div>
			</div>
			
			</div>
	</div>
</aside>

