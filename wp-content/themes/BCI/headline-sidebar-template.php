        	           <div class="image" style="position: absolute; top: 0; left: 0; background: url(<?php echo $top_image; ?>) center center no-repeat; background-size: 100% auto;"></div>			
						
                        <div class="wrapper clearfix">
							<div class="text">
								<ul>
								<?php
								$sidebar = array();
								$cat_posts = new WP_Query($query_string."&order=ASC");
								while($cat_posts->have_posts()):
									$cat_posts->the_post();
									$current_id = get_the_ID();
								 ?>
									<li>           
										<h1 id="post_<?php echo $current_id;?>"><?php the_title(); ?></h1>
										<div class="description">
											<?php the_content(); ?>
										</div>
									</li>       
									<?php    
									$sidebar[$current_id] = get_the_title();
									endwhile; ?>
								</ul>	  
								<span class="photo-caption"><?php the_post_thumbnail_caption(); ?></span>    
							</div>      
							<div class="side-menu">
								<ul id="sub-sections">
									<?php
									foreach($sidebar as $id => $title) { ?>
	
										<li><a class="post_<?php echo $id;?>"><?php echo $title; ?></a></li>
										<?php
									}?>
								</ul>
							</div>
                    	</div>