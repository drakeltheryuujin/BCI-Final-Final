<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

if(is_category('about')) { ?>

				
				<div class="text">
	                <h1><?php the_title(); ?></h1>
                    <div class="description">
                        <?php the_content(); ?>
                    </div>
				</div>                    
                    
<?php
}
else if(is_category('newsroom')) { ?>

    <!-- put more html here for newsroom list -->
    <?php
}
else { ?>


  <!-- else -->
  
  
  
    <?php
}

?>


