        	           <div class="image" style="position: absolute; top: 0; left: 0; background: url(<?php echo $top_image; ?>) center center no-repeat; background-size: 100% auto;"></div>			

                       <div class="wrapper clearfix" id="post-<?php the_ID(); ?>">
							<div class="text">
								<h1><?php the_title(); ?></h1>
								<div class="description">
									<?php the_content(); ?>
								</div>
								<span class="photo-caption"><?php the_post_thumbnail_caption(); ?></span>
							</div>        
							<div class="side-menu">
								<?php
								    // Get the ID of a given category
								    $newsroom_id = get_cat_ID('newsroom');
								    $library_id = get_cat_ID('library');
								    $protected_id = get_cat_ID('34');

								    // Get the URL of this category
								    $newsroom_link = get_category_link( $newsroom_id );
								    $library_link = get_category_link( $library_id );
								    $protected_link = get_category_link( $protected_id );
								?>
								<ul id="sub-sections">
									<?php if(in_category('presentations')) {?>
									<li><a onclick="history.go(-1);return true;">Workshop Page</a></li>
									<?php } ?>
									<li><a href="<?php 
									if(has_category($newsroom_id)) {echo esc_url( $newsroom_link);} 
									elseif(has_category($library_id)) {	echo esc_url( $library_link);} 
									elseif(has_category($protected_id)) {echo esc_url( home_url( '/?cat=34' ) );} 
									?>"><?php if(has_category($newsroom_id)) {echo 'Newsroom';}
									elseif(has_category($library_id)) {echo 'Library';}
									elseif(has_category($protected_id)) {echo 'Protected Site';}
									?></a></li> 
									<?php
															
									$original_article_url =  get_post_meta(get_the_ID(), 'original_article_url', true);
									$contact_email =  get_post_meta(get_the_ID(), 'contact_email', true);
					
									if($original_article_url) {
										
									?>	
									<li><a target="_blank" href="<?php echo $original_article_url; ?>">Original Article</a></li>
									<?php }
									
									if($contact_email) {
										
									?>	
									<li><a class="mail-to" rel="<?php echo $contact_email; ?>">Contact Author</a></li>
                    				<?php
									} ?>									
								</ul>
							</div>
                    	</div>