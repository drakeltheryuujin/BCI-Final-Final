<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); 

?>

		<section id="primary">
			<div id="content" role="main">
                <section class="content inside">
                   <article class="home clearfix">
                   <?php 
                   
				   if ( have_posts() ) : the_post();
				   
						if (has_post_thumbnail($post->ID) ):
						   $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'single-post-thumbnail' );
						   $top_image = $image[0];
						endif;					   
                   
					   $calendar_sidebar = array('the-initiative','scientific','policy','workshops');
					   $headline_sidebar = array('blue-carbon');
					   $map_sidebar = array('field-work');
					   $text = array('footer-links','terms-and-conditions','contact-us');
					   $newsroom = array('newsroom','library','presentations');
					   $members = array('member-list');
					   $restricted = array('protected', 'presentations', 'documents-and-papers');
					   $protected = array('protected');
					   
					   if(has_category($restricted) && !is_user_logged_in()) {
							
							$category = get_category_by_slug("restricted-page-header");
									
							$top_image = getImageFromCategory($category->term_id); 

							include 'redirect-template.php';  
					   }
					   else {
						   
						   
						   if(has_category($calendar_sidebar)) {
								
								include 'single-calendar-sidebar-template.php';   
						   }
						   elseif(has_category($headline_sidebar)) {
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
								
								include 'single-headline-sidebar-template.php';   
							   
						   }
						   elseif(has_category($map_sidebar)) {
							   
								include 'single-map-sidebar-template.php';   
							   
						   }
						   
						   elseif(has_category($text)) {
							   
								include 'text-template.php'; 
						   }
						
						   elseif(has_category($newsroom)) {
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
								include 'single-newsroom-sidebar-template.php'; 
						   }
						   elseif(has_category($members)) {
							   
								include 'contact-sidebar-template.php';   
						   }						
							   
						   
					   } ?>
					   
					   
                   
                </article>
            </section>

			<?php endif; ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_footer(); ?>