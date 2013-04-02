        	           <div class="image" style="position: absolute; top: 0; left: 0; background: url(<?php echo $top_image; ?>) center center no-repeat; background-size: 100% auto;"></div>			

                        <div class="wrapper clearfix">
							<div class="text presentations">
								<h1>Presentations</h1>
								<h1 id="pol-pres">Policy Working Group</h2>
								<ul>
								<?php
									$args = array(
									'category_name'	  => 'policy-presentations',
									'offset'          => 0,
									'order'         => 'title',
									'post_type'       => 'post',
									'post_status'     => 'publish',
									'suppress_filters' => true );
				
									$policy_posts = get_posts($args);				

									 foreach( $policy_posts as $post ) : setup_postdata($post); 

									?>
				
									<li> 
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail("medium"); ?>          
											<h3><?php the_title(); ?></h3>
											<span><?php the_date(); ?></span>
										</a>
									</li>
									
									<?php endforeach; wp_reset_postdata(); ?>      
								</ul>
								<h1 id="sci-pres">Scientific Working Group</h2>
								<ul>	 
								<?php
									$args = array(
									'category_name'	  => 'scientific-presentations',
									'offset'          => 0,
									'order'         => 'title',
									'post_type'       => 'post',
									'post_status'     => 'publish',
									'suppress_filters' => true );
				
									$scientific_posts = get_posts($args);				

									 foreach( $scientific_posts as $post ) : setup_postdata($post);
                       				
														
					
										?>
									<li> 
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail("medium"); ?>          
											<h3><?php the_title(); ?></h3>       
											<span><?php the_date(); ?></span>
										</a>
									</li>      
									 
									<?php endforeach; wp_reset_postdata(); ?>

								</ul>	    
								<span class="photo-caption"><?php the_post_thumbnail_caption(); ?></span>  
							</div>      
							<div class="side-menu">
								<ul id="sub-sections">
									<?php 
									
									$protected_category= get_category_by_slug( "protected" );

									$location = get_category_link($protected_category->term_id);

									?>
									<li><a href="<? echo $location; ?>">Protected Site</a></li>
									<li><a class="pol-pres">Policy Working Group</a></li>
									<li><a class="sci-pres">Scientific Working Group</a></li>
								</ul>
							</div>
                    	</div>


<!--$sidebar[$current_id] = get_the_title();--> 