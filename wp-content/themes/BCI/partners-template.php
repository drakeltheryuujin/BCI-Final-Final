
			     <div class="image" style="position: absolute; top: 0; left: 0; background: url(<?php echo $top_image; ?>) center center no-repeat; background-size: 100% auto;"></div>			

					<span class="photo-caption" style="display: none;"><?php the_post_thumbnail_caption(); ?></span>
                       <div class="wrapper clearfix" id="post-<?php the_ID(); ?>">
							<div class="text partners">
								<h1>Partners</h1>
								<ul>	
								<span class="photo-caption"><?php the_post_thumbnail_caption(); ?></span>
								<?php
									$args = array(
									'category_name'	  => 'partners-main',
									'offset'          => 0,
									'order'           => 'ASC',
									'post_type'       => 'post',
									'posts_per_page'       => '30',
									'post_status'     => 'publish',
									'suppress_filters' => true );
				
									$partners_posts = get_posts($args);				

									 foreach( $partners_posts as $post ) : setup_postdata($post);
									
									?>
									<li>
										<div class="thumb">
											<?php the_post_thumbnail("medium"); ?>
										</div>	           
										<div class="description">
											<h3><?php the_title(); ?></h3>
											<?php the_content(); ?>
										</div>
									</li>       
									<?php endforeach; wp_reset_postdata(); ?>
								</ul>
								<ul class="bottom">	
								<?php
									$args = array(
									'category_name'	  => 'partners-sub',
									'offset'          => 0,
									'order'           => 'ASC',
									'post_type'       => 'post',
									'posts_per_page'       => '30',
									'post_status'     => 'publish',
									'suppress_filters' => true );
				
									$sub_posts = get_posts($args);				

									 foreach( $sub_posts as $post ) : setup_postdata($post);
									
									?>
									<li>
										<div class="thumb">
											<?php the_post_thumbnail("medium"); ?>
										</div>	        
									</li>       
									<?php endforeach; wp_reset_postdata(); ?>
								</ul>
						</div>	
                    	</div>
		<script>
		$(".photo-caption").appendTo(".bottom");
		</script>
