        	           <div class="image" style="position: absolute; top: 0; left: 0; background: url(<?php echo $top_image; ?>) center center no-repeat; background-size: 100% auto;"></div>			

                       <div class="wrapper clearfix" id="post-<?php the_ID(); ?>">
							<div class="text protected-site">    
								<h1>Protected Site</h1>
								<ul>
								<?php
									$sidebar = array();
									$protected_object = get_category_by_slug( 'protected' );
									$cat_posts = new WP_Query($query_string."&order=ASC");
	 									
										while($cat_posts->have_posts()):
										$cat_posts->the_post();
										$post_categories = wp_get_post_categories( get_the_ID() );
										
										if (in_array($protected_object->term_id, $post_categories)) {
										
									 ?>
									<li>
										<?php 
											$category_slug =  get_post_meta(get_the_ID(), 'category_url', true);
							
					
											if($category_slug) {
				
											$category_object= get_category_by_slug( $category_slug );
											$category_url = get_category_link($category_object->term_id);
				
											?>
												<a href="<?php echo $category_url; ?>">
													<h2><?php the_title(); ?></h2>
													<?php the_post_thumbnail("medium"); ?>
												</a>
										
											<?php 
										} ?>
									</li>
									<?php 
									} 
									endwhile; ?>	
								</ul>				
							</div>        
                    	</div>