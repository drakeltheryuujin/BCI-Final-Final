<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header();
$cat_ID = get_query_var('cat');
$category_obj = get_category($cat_ID);
		
$top_image = getImageFromCategory($cat_ID); 
		
?>

		<section id="primary">
			<div id="content" role="main">
                <section class="content inside">
                   <article class="home clearfix">
                   <?php 
				   if ( have_posts() ) :
				   
				   
					   $this_slug = $category_obj->slug;
					   
					   $calendar_sidebar = array('the-initiative','scientific','policy','workshops');
					   $headline_sidebar = array('blue-carbon');
					   $map_sidebar = array('field-work');
					   $calendar = array('calendar');
					   $restricted = array('presentations', 'documents-and-papers', 'protected');
					   $protected = array('protected');
					   $presentations = array('presentations','documents-and-papers');
					   $text = array('contact-us');
					   $newsroom = array('newsroom');
					   $library = array('library');
					   $partners = array('partners');
					   $publications = array('publications-list');
					   $contacts = array('contact-list');
					
										  
					   if(in_array($this_slug, $restricted) && !is_user_logged_in()) {
							
							$category = get_category_by_slug("restricted-page-header");
								
							$top_image = getImageFromCategory($category->term_id); 
							
							include 'redirect-template.php';   
					   }					
					   else {
											   
						   if(in_array($this_slug, $calendar_sidebar)) {
								
								include 'calendar-sidebar-template.php';   
						   }
						   elseif(in_array($this_slug, $headline_sidebar)) {
							
							   ?>
							
								<script>
								
									$(document).ready(function(){
	
										$(".side-menu ul#sub-sections li a").click(function (){
			
											var titleID = $(this).attr("class");
					
											$('html, body').animate({
												scrollTop: $("h1" + "#" + titleID).offset().top - 150
											}, 2000);
										});
																		
									});
								</script>
							
							<?php
									
								include 'headline-sidebar-template.php';   
							   
						   }
						   elseif(in_array($this_slug, $map_sidebar)) {
							   
								include 'map-sidebar-template.php';   
							   
						   }
						   elseif(in_array($this_slug, $calendar)) {
							   
								include 'calendar-template.php';   
						   }
						   elseif(in_array($this_slug, $presentations)) {
							   
							   ?>
							
								<script>
								
									$(document).ready(function(){
	
										$(".side-menu ul#sub-sections li a").click(function (){
			
											var titleID = $(this).attr("class");
					
											$('html, body').animate({
												scrollTop: $("h2" + "#" + titleID).offset().top - 150
											}, 2000);
										});
																		
									});
								</script>
							
							<?php
							
								$category = get_category_by_slug("presentations-header");
									
								$top_image = getImageFromCategory($category->term_id);
								
								include 'presentations-headline-sidebar-template.php';   
						   }
						   elseif(in_array($this_slug, $protected)) {
							
								$category = get_category_by_slug("protected-header");
									
								$top_image = getImageFromCategory($category->term_id);
							   ?>
							
	
								<script>
								
									$(document).ready(function(){
	
										$(".side-menu ul#sub-sections li a").click(function (){
			
											var titleID = $(this).attr("class");
					
											$('html, body').animate({
												scrollTop: $("h2" + "#" + titleID).offset().top - 150
											}, 2000);
										});
																		
									});
								</script>
								<?php
								
								include 'protected-template.php';   
						   }
						   elseif(in_array($this_slug, $text)) {
							   
								include 'text-template.php';   
						   } 
						   elseif(in_array($this_slug, $library)) {
							?>
								<script>
								
									$(document).ready(function(){
	
										$(".side-menu ul#sub-sections li a").click(function (){
			
											var titleID = $(this).attr("class");
					
											$('html, body').animate({
												scrollTop: $("h2" + "#" + titleID).offset().top - 150
											}, 2000);
										});
																		
									});
								</script>
						<?php 	
								
								include 'library-template.php';   
						   }
						   elseif(in_array($this_slug, $partners)) {
							   
								$category = get_category_by_slug("partners-header");
									
								$top_image = getImageFromCategory($category->term_id); 
							
								include 'partners-template.php';   
						   } 
						   elseif(in_array($this_slug, $publications)) {
							   
								include 'publications-template.php';   
						   } 
						   elseif(in_array($this_slug, $newsroom)) {
	
							
								include 'newsroom-template.php';   
						   }
						   elseif(in_array($this_slug, $contacts)) {
								?>
								
								<script>
								
									$(document).ready(function(){
	
										$(".side-menu ul#sub-sections li a").click(function (){
			
											var titleID = $(this).attr("class");
					
											$('html, body').animate({
												scrollTop: $("h2" + "#" + titleID).offset().top - 150
											}, 2000);
										});
																		
									});
								</script>
								<?php 	
		
	
								include 'contact-sidebar-template.php';   
						   } 						  
						   
					   }
					   
						?>
                   
                </article>
            </section>
			<?php else : ?>
					<div class="image" style="position: absolute; top: 0; left: 0; background: url(<?php bloginfo( 'template_directory' ); ?>/images/bg-earth.jpg) center center no-repeat; background-size: 100% auto;"></div>			
             		<div class="wrapper clearfix">
                        <div class="text">				
                            <h1><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>	
                            <div class="description">
                                <p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
           						<?php get_search_form(); ?>
                            </div>
                        </div>
                    </div>
                </article>
            </section>


			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_footer(); ?>
