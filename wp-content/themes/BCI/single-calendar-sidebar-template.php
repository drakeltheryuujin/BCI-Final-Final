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
						 		<?php if (in_category("workshops") || (in_category("presentations")) ) {?>
								<ul id="sub-sections">
									<li><a href="<?php echo esc_url( home_url( '/?cat=34' ) ); ?>">Protected Site</a></li>  												 														
								</ul>
								<?php } ?>	
								<h2>Blue Carbon Event Calendar</h2>	
								<?php 
									
									$protected_category= get_category_by_slug( "protected" );

									$location = get_category_link($protected_category->term_id);
									?>

									<?php echo do_shortcode('[events_list limit="2"]'); ?>
    						</div>
                    	</div> 