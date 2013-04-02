        	           <div class="image" style="position: absolute; top: 0; left: 0; background: url(<?php echo $top_image; ?>) center center no-repeat; background-size: 100% auto;"></div>			

                       <div class="wrapper clearfix" id="post-<?php the_ID(); ?>">
							<div class="text publications">
								<h1>Publications List</h1>
								<ul>
								<?php
								$cat_posts = new WP_Query($query_string."&order=ASC");
								while($cat_posts->have_posts()):
									$cat_posts->the_post();
							
								
								?>
									<li>           
										<div class="description">
											<?php the_content(); ?>
										</div>
										<?php

										$publication_link =  get_post_meta(get_the_ID(), 'publication_link', true);
																														
										if($publication_link) {
																					
										?>
										<a class="btn" target="_blank" href="<?php echo $publication_link; ?>">View Publication</a>	
									</li>       
									<?php } endwhile; ?>
								</ul>	      
								<span class="photo-caption"><?php the_post_thumbnail_caption(); ?></span>
							</div>      
                    	</div>