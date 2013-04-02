        	           <div class="image" style="position: absolute; top: 0; left: 0; background: url(<?php echo $top_image; ?>) center center no-repeat; background-size: 100% auto;"></div>			

                       <div class="wrapper clearfix" id="post-<?php the_ID(); ?>">
							<div class="text">
								<ul>
									<li>           
										<h1><?php the_title(); ?></h1>
										<div class="description">
											<?php the_content(); ?>
										</div>
									</li>       
								</ul>	     
								<span class="photo-caption"><?php the_post_thumbnail_caption(); ?></span> 
							</div>        
							<div class="side-menu">
								<ul id="sub-sections">
								</ul>
							</div>
                    	</div>