					<?php
					
						function get_excerpt($count){
 						 $permalink = get_permalink($post->ID);
						  $excerpt = get_the_excerpt();
						  $excerpt = strip_tags($excerpt);
						  $excerpt = substr($excerpt, 0, $count);
						  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
						  $excerpt = $excerpt.'<a class="btn more" href="'. esc_url( get_permalink() ) . '">' . __( 'Read More' ) . '</a>';
						  return $excerpt;
						}
					
						$cat_posts = new WP_Query(
							array(
							'category_name'	  => "newsroom",	
							'order'			  => 'date'
    					));

						if($cat_posts->have_posts()):
							$cat_posts->the_post();
							$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
       	           		?>
						<div class="image" style="position: absolute; top: 0; left: 0; background: url(<?php echo $url; ?>) center center no-repeat; background-size: 100% auto;"></div>
						<?php
						endif;
						?>		

                       <div class="wrapper clearfix" id="post-<?php the_ID(); ?>">
							<div class="text home-like">
								<h1>Newsroom</h1>
								<ul>
								<?php
								
														
								$page = (get_query_var('page')) ? get_query_var('page') : 1; //get the page url
							
							$prev = add_query_arg( "page", $page - 1 ); //current page - 1
							$next = add_query_arg( "page", $page + 1 ); //current page + 1
					
						$args = array(
						'category_name'	  => 'newsroom',
						'numberposts'  	  => 10, //Make count +1 of the number of posts to display
						'offset'          => 0,
						'order_by'        => 'date',
						'order'           => 'DESC',
						'post_type'       => 'post',
						'post_status'     => 'publish',
						'paged'			  => $page, //the page variable
						'suppress_filters' => true );

						$args2 = array(
						'category_name'	  => 'newsroom',
						'numberposts'  	  => 11, //Make count +1 of the number of posts to display
						'offset'          => 0,
						'order_by'        => 'date',
						'order'           => 'DESC',
						'post_type'       => 'post',
						'post_status'     => 'publish',
						'paged'			  => $page, //the page variable
						'suppress_filters' => true );
						
						$page_test = get_posts($args2);
						$article_posts = get_posts($args);				

						foreach( $article_posts as $post ) : setup_postdata($post); 
						


								 ?>

										

									<li>           
										<div class="thumb">
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("medium"); ?></a>
										</div>
										<strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong>
										<em><?php the_date(); ?></em>
										<?php if($article_author) {?>
										<span><?php echo $article_author ?></span>
										<?php }?>
										<?php echo get_excerpt(300); ?>
									</li>	    
									
									<?php endforeach;  ?>
									
								
								</ul>
								<span class="photo-caption"><?php the_post_thumbnail_caption(); ?></span>
							</div>		    
							<div class="side-menu">
								<!--
								<div class="side-search">

                                    <form method="get" id="searchform_specific" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    	<input type="hidden" name="cat" value="<?php echo $cat_ID;?>" />
                                        <input class="input" value="<?php printf( __( 'Search Results for: %s', 'twentyeleven' ), '' . get_search_query() . '' ); ?>" name="s" id="s" type="text"/>
                                        <input class="go"  name="submit" id="searchsubmit_specific" type="submit" value="<?php esc_attr_e( 'Go', 'twentyeleven' ); ?>"/>
                                    </form>
								
								</div>
								-->
								<ul id="sub-sections">			
									<li><a id="newsletter-btn">Newsletter</a></li>
									<?php
										if($page > 1) {?> <!-- if page is greater than 1 show prev button -->				
									<li><a href="<?php echo $prev ?>">Prev</a></li>
									<?php }
										if(count($page_test) == 11) {?>									
										<li><a href="<?php echo $next ?>">Next</a></li>
									<?php } ?>
								</ul>
							</div>
                    	</div>