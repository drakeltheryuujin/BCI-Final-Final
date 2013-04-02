<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>


			<div id="content" role="main">
                <section class="content inside">
                   <article class="home clearfix">
         	           <div class="image" style="position: absolute; top: 0; left: 0; background: url(<?php echo $top_image; ?>) center center no-repeat; background-size: 100% auto;"></div>			

                       <div class="wrapper clearfix" id="post-<?php the_ID(); ?>">
							<div class="text">
								<ul>
									<li>           
										<h1>404 Error</h1>
										<div class="description">
											<p>Sorry, this page could not be found.</p>
										</div>
									</li>       
								</ul>	      
							</div>    
                    	</div>
                   
                </article>
            </section>

<?php get_footer(); ?>