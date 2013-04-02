        	           <div class="image" style="position: absolute; top: 0; left: 0; background: url(<?php echo $top_image; ?>) center center no-repeat; background-size: 100% auto;"></div>			

                       <div class="wrapper clearfix" id="post-<?php the_ID(); ?>">
							<div class="text library protected">
								<h1>Protected Site</h1>
								<?php
								$args = array(
								'category_name'	  => 'protected-site-workshops',
								'offset'          => 0,
								'order'           => 'title',
								'post_type'       => 'post',
								'post_status'     => 'publish',
								'suppress_filters' => true );
			
								$policy_posts = get_posts($args);				

								 foreach( $policy_posts as $post ) : setup_postdata($post); 

									 the_content(); 
									
									endforeach; ?>
								<h2 id="documents">Documents &amp; Papers</h2>
									<?php
									$args = array(
									'category_name'	  => 'documents-and-papers',
									'offset'          => 0,
									'order'           => 'DESC',
									'post_type'       => 'post',
									'post_status'     => 'publish',
									'suppress_filters' => true );
				
									$policy_posts = get_posts($args);				

									 foreach( $policy_posts as $post ) : setup_postdata($post); 														
								

									 the_content(); 
									
									endforeach; ?>         
								<h2 id="contacts-btn">Member List</h2>
								<a class="btn" href="<?php echo esc_url( home_url( '/?cat=37' ) ); ?>">View All Contacts</a>
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
									<li><a class="scientific">Scientific Working Group</a></li>
									<li><a class="policy">Policy Working Group</a></li>
									<li><a class="documents">Documents &amp; Papers</a></li>
									<li><a class="contacts-btn">Contacts</a></li>
								</ul>
							</div>
                    	</div>