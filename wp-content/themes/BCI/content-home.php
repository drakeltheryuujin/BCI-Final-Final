<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
 

 
 
query_posts('category_name=home&orderby=date&order=ASC'); 

while(have_posts()) : the_post(); 

if (has_post_thumbnail($post->ID) ): 
 $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'single-post-thumbnail' ); 
endif;

?>	

	<?php if ( in_category( 'top-story' ) ) {?>
    
    <article class="home top">
    
    
    <?php if (has_post_thumbnail( $post->ID ) ): ?>
			

			<div class="image" style="position: absolute; top: 0; left: 0; background: url(<?php echo $image[0]; ?>) center center no-repeat; background-size: 100% auto;"></div>			
            
			<?php endif; ?>
			<div class="wrapper clearfix">
				<h1><?php the_title(); ?></h1>	
				<div class="text">
					<div class="description">
						<?php the_content(); ?>
					</div>
					<?php getFactoids(); ?>
					<a class="down">down</a>
					<span class="photo-caption"><?php the_post_thumbnail_caption(); ?></span>
				</div>
			</div>
		</article>
    
    <?php }else if ( in_category( 'home-slideshow' ) ) {?>
    
        <article class="home slideshow">
        
			<?php $slides = getSlideshow(); ?>
            
			<div class="pagination">
				<a id="prev">Prev</a> 
				<a id="next">Next</a>
			</div>			
			<div class="wrapper clearfix">
				<div class="text">
					<h1><?php the_title(); ?></h1>
					<div class="description">
                    	<?php the_content(); ?>
					</div>
                    
				<?php 
					$button_text =  get_post_meta(get_the_ID(), 'button_text', true);
					$button_url =  get_post_meta(get_the_ID(), 'button_url', true);
					
					if($button_text && $button_url) {
					
						?>
						<a href="<?php echo $button_url; ?>" class="btn"><?php echo $button_text; ?></a>
                    	<?php
					} ?>
					<a class="down">down</a>
				</div>
				    <?php
							
						foreach( $slides as $post ) :	setup_postdata($post); ?>
			
							<span class="photo-caption"><?php the_post_thumbnail_caption(); ?></span>
						<?php endforeach; wp_reset_postdata(); ?>					

			</div>
		</article>

	<?php } else if ( !in_category(array('factoids','homepage-images','footer-credits'))  ){ 
		?>
    	
        <article class="home" id="post_<?php echo $post->ID; ?>">
			<?php 
			
			$graphic_overlay =  get_post_meta($post->ID, 'graphic_overlay', true);
			$graphic_overlay_url =  get_post_meta($post->ID, 'graphic_overlay_url', true);
			?>
			<div class="image" style="background: url(<?php echo $image[0]; ?>) center center no-repeat; background-size: 100% auto;">
				
			<?php
			if($graphic_overlay) {?>
				<div style="width: 961px; margin: 0 auto; height: 100%; background: url(<?php echo $graphic_overlay; ?>) center center no-repeat;"><a style="position: relative; z-index: 10; height: 100%; width: 100%; display: block;" href="<?php echo $graphic_overlay_url; ?>"></a></div>
			<?php }?>
			
			</div>

            
			<div class="wrapper clearfix">
				<div class="text">
					<h1><?php the_title(); ?></h1>
					<div class="description">
						<?php the_content(); ?>
					</div>
                    
                    <?php 
					$button_text =  get_post_meta(get_the_ID(), 'button_text', true);
					$button_url =  get_post_meta(get_the_ID(), 'button_url', true);
					
					if($button_text && $button_url) {
					
						?>
						<a href="<?php echo $button_url; ?>" class="btn"><?php echo $button_text; ?></a>
                    	<?php
					} ?>
					<a class="down">down</a>
					<span class="photo-caption"><?php the_post_thumbnail_caption(); ?></span>
				</div>
			</div>
		</article>
    
    <?php
    } ?>

<?php endwhile; ?>
 