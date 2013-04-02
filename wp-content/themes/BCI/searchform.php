<?php
/**
 * The template for displaying search forms in Twenty Eleven
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input class="input" value="<?php printf( __( 'Search Results for: %s', 'twentyeleven' ), '' . get_search_query() . '' ); ?>" name="s" id="s" type="text"/>
	<input class="go"  name="submit" id="searchsubmit" type="submit" value="<?php esc_attr_e( 'Go', 'twentyeleven' ); ?>"/>
</form>
    