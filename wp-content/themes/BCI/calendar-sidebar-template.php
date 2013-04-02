        	           <div class="image" style="position: absolute; top: 0; left: 0; background: url(<?php echo $top_image; ?>) center center no-repeat; background-size: 100% auto;"></div>			

                       <div class="wrapper clearfix">
							<div class="text">
								<ul>
								<?php
								$sidebar = array();
								$cat_posts = new WP_Query($query_string."&order=ASC");
								while($cat_posts->have_posts()):
								$cat_posts->the_post(); ?>
									<li>           
										<h1><?php the_title(); ?></h1>
										<div class="description">
											<?php the_content(); ?>
										</div>
									</li>       
									<?php     
									$sidebar[get_the_ID()] = get_the_title();
									endwhile; ?> 
								</ul>	      
								<span class="photo-caption"><?php the_post_thumbnail_caption(); ?></span>
							</div>     
                        	<div class="side-menu">
							 		<?php if (in_category("workshops") || (in_category("presentations")) ) {?>
									<ul id="sub-sections">
										<li><a href="<?php echo esc_url( home_url( '/?cat=34' ) ); ?>">Protected Site</a></li>  														
									</ul>
									<?php } 
									
									$protected_category= get_category_by_slug( "calendar" );

									$location = get_category_link($protected_category->term_id);
									?>

								<h2 class="cal"><a href="<?php echo $location; ?>">Blue Carbon Event Calendar</a></h2>
  								<?php echo do_shortcode('[events_list limit="2"]'); ?>
    						</div>
                    	</div>