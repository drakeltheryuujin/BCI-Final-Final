<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>


		<section id="primary">
			<div id="content" role="main">
                <section class="content inside">
                   <article class="home clearfix">

			<?php if ( have_posts() ) : ?>


                        <div class="wrapper results clearfix">
							<div class="text library">
                        		<h1>Search Results</h1>					
								<?php get_search_form(); ?>
								<ul>
							


								<?php twentyeleven_content_nav( 'nav-above' ); ?>

								<?php /* Start the Loop */ ?>
								<?php while ( have_posts() ) : the_post(); ?>

									<?php
										/* Include the Post-Format-specific template for the content.
										 * If you want to overload this in a child theme then include a file
										 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
										 */
										get_template_part( 'search-template', get_post_format() );
									?>

								<?php endwhile; ?>


							<?php else : ?>
						</ul>
					</div>
                    <div class="wrapper results clearfix">
						<h1><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
						<div class="text">
							<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyeleven' ); ?></p>
						</div>
							<?php get_search_form(); ?>
					</div>
					
			<?php endif; ?>

                        </div>
                    </div>
                </article>
            </section>

<?php get_footer(); ?>