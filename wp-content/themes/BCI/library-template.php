        	           <div class="image" style="position: absolute; top: 0; left: 0; background: url(<?php echo $top_image; ?>) center center no-repeat; background-size: 100% auto;"></div>			

                       <div class="wrapper clearfix" id="post-<?php the_ID(); ?>">
							<div class="text library">
								<h1>Library</h1>
								<h2 id="reports">Reports</h2>
								<ul>
									<?php
									$args = array(
									'numberposts'      => '999999999',
									'category_name'	  => 'reports',
									'offset'          => 0,
									'orderby'		 => 'title',
									'order'           => 'ASC',
									'post_type'       => 'post',
									'post_status'     => 'publish',
									'suppress_filters' => true );
				
									$policy_posts = get_posts($args);				

									 foreach( $policy_posts as $post ) : setup_postdata($post); 
									
										$original_article_url =  get_post_meta(get_the_ID(), 'original_article_url', true);				    					

										?>
									<li>       
									
										<strong><a href="<?php echo $original_article_url; ?>" target="_blank"><?php the_title(); ?></a></strong>											
										<?php the_excerpt(); 
										
										$author_citations = get_post_meta(get_the_ID(), 'author_citations', true);

										if($author_citations) {										
										?>
										<span><?php echo $author_citations; ?></span>
									</li>       
									<?php } endforeach; ?>
								</ul>	     
								<h2 id="scientific">Scientific Papers</h2>
								<ul>
									<?php
									$args = array(
									'numberposts'      => '999999999',
									'category_name'	  => 'scientific-papers',
									'offset'          => 0,
									'orderby'		 => 'title',
									'order'           => 'ASC',
									'post_type'       => 'post',
									'post_status'     => 'publish',
									'suppress_filters' => true );
				
									$policy_posts = get_posts($args);				

									 foreach( $policy_posts as $post ) : setup_postdata($post); 														
									
										$original_article_url =  get_post_meta(get_the_ID(), 'original_article_url', true);				    						
									?>
									<li>           
										<strong><a href="<?php echo $original_article_url; ?>" target="_blank"><?php the_title(); ?></a></strong>
										<?php the_excerpt();
				
										$author_citations = get_post_meta(get_the_ID(), 'author_citations', true);
										
										if($author_citations) {
														
										?>
										<span><?php echo $author_citations; ?></span>
									</li>         
									<?php } endforeach; ?>
								</ul>	  
								<span class="photo-caption"><?php the_post_thumbnail_caption(); ?></span>    
							</div>        
							<div class="side-menu">
								<div class="side-search">
                                    <form method="get" id="searchform_specific" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    	<input type="hidden" name="cat" value="<?php echo $cat_ID;?>" />
                                        <input class="input" value="<?php printf( __( 'Search Results for: %s', 'twentyeleven' ), '' . get_search_query() . '' ); ?>" name="s" id="s" type="text"/>
                                        <input class="go"  name="submit" id="searchsubmit_specific" type="submit" value="<?php esc_attr_e( 'Go', 'twentyeleven' ); ?>"/>
                                    </form>
								</div>
								<ul id="sub-sections">
									<li><a class="reports">Reports</a></li>
									<li><a class="scientific">Scientific Papers</a></li>
								</ul>
							</div>
                    	</div>