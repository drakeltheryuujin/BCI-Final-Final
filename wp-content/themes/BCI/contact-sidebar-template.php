        	           <div class="image" style="position: absolute; top: 0; left: 0; background: url(<?php echo $top_image; ?>) center center no-repeat; background-size: 100% auto;"></div>			

                       <div class="wrapper clearfix" id="post-<?php the_ID(); ?>">
							<div class="text members">
								<h1>Member List</h1>
    								<h2 id="coordinators">Coordinators</h2>	
								<ul>
									<?php
									$args = array(
									'category_name'	  => 'coordinators-contact',
									'offset'          => 0,
									'orderby'		 => 'title',
									'order'           => 'ASC',
									'post_type'       => 'post',
									'post_status'     => 'publish',
									'suppress_filters' => true );
				
									$policy_posts = get_posts($args);				

									 foreach( $policy_posts as $post ) : setup_postdata($post); 

										$contact_email =  get_post_meta(get_the_ID(), 'contact_email', true);
		
										
										?>
									<li>           
										<strong><?php the_title(); ?></strong>
										<?php the_content(); ?>
										
										<? 					
																			
										if($contact_email) {
											
											$display = '&nbsp;';
											 if($logged_in) {
												 
												 $display = $contact_email;
											 }
										
										?>
										<a class="btn mail-to" rel="<?php echo $contact_email; ?>"><?php echo $display; ?></a>
									</li>       
									<?php } endforeach; ?>
								</ul>	
								<h2 id="pol-work">Policy Members</h2>	
								<ul>
									<?php
									$args = array(
									'category_name'	  => 'policy-group-contact',
									'numberposts'     => '9999',
									'offset'          => 0,
									'orderby'		 => 'title',
									'order'           => 'ASC',
									'post_type'       => 'post',
									'post_status'     => 'publish',
									'suppress_filters' => true );
				
									$policy_posts = get_posts($args);				

									 foreach( $policy_posts as $post ) : setup_postdata($post); 

										$contact_email =  get_post_meta(get_the_ID(), 'contact_email', true);
		
										
										?>
									<li>           
										<strong><?php the_title(); ?></strong>
										<?php the_content(); ?>
										
										<? 					
																			
										if($contact_email) {
											
											$display = '&nbsp;';
											 if($logged_in) {
												 
												 $display = $contact_email;
											 }
										
										?>
										<a class="btn mail-to" rel="<?php echo $contact_email; ?>"><?php echo $display; ?></a>
									</li>       
									<?php } endforeach; ?>
								</ul>	     
								<h2 id="sci-work">Scientific Members</h2>	
								<ul>
									<?php
									$args = array(
									'category_name'	  => 'scientific-group-contact',
									'numberposts'     => '9999',
									'offset'          => 0,
									'orderby'		 => 'title',
									'order'           => 'ASC',
									'post_type'       => 'post',
									'post_status'     => 'publish',
									'suppress_filters' => true );
				
									$policy_posts = get_posts($args);				

									 foreach( $policy_posts as $post ) : setup_postdata($post); 

										$contact_email =  get_post_meta(get_the_ID(), 'contact_email', true);
				
										?>
									<li>           
										<strong><?php the_title(); ?></strong>
										<?php the_content(); ?>
										
										<? 					
																			
										if($contact_email) {
											
											
											$display = '&nbsp;';
											 if($logged_in) {
												 
												 $display = $contact_email;
											 }										
										?>
										
										<a class="btn mail-to" rel="<?php echo $contact_email; ?>"><?php echo $display; ?></a>
									</li>         
									<?php } endforeach; ?>
								</ul>	 
								<span class="photo-caption"><?php the_post_thumbnail_caption(); ?></span>
							</div>
							<div class="side-menu">
								<!--
								<div class="side-search">
									<input class="input" value="Search" type="text"/>
									<input class="go" type="submit" value="go"/>
								</div>
								-->
								<ul id="sub-sections">

									<?php 
									
									$protected_category= get_category_by_slug( "protected" );

									$location = get_category_link($protected_category->term_id);

									?>									
									<li><a href="<? echo $location; ?>">Protected Site</a></li>
									<li><a class="coordinators">Coordinators</a></li>
									<li><a class="pol-work">Policy Members</a></li>
									<li><a class="sci-work">Scientific Members</a></li>
								</ul>
							</div>
                    	</div>