<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
    
    <meta name="keywords" content="The International Blue Carbon Initiative, Blue Carbon Scientific Working Group, Blue Carbon Policy Working Group, Coastal ecosystem management, Blue carbon, Coastal carbon, Conservation and restoration of coastal and marine ecosystems, Reducing impacts of climate change, Mitigating climate change, Mangroves, Tidal marshes, Seagrasses" />
	<meta name="description" content="A comprehensive, coordinated global program focused on mitigating climate change through coastal ecosystem conservation and management." />
  	<meta name="author" content="Conversation Agency">
 	<meta property="og:title" content="The Blue Carbon Initiative" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="" />
	<meta property="og:image" content="images/logo-bluecarbon.jpg" />
	<meta property="og:site_name" content="" />
	<meta property="fb:admins" content="" />
  	<meta name="viewport" content="width=980;">
	<link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/favicon.ico">
    
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>


	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
	<script src="<?php bloginfo( 'template_directory' ); ?>/js/libs/modernizr-1.6.min.js"></script>
	<script src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.cycle.all.js"></script>
	
	<script>
	$(document).ready(function(){	
		$('#slideshow').cycle({ 
			fx:     'fade', 
			speed:  'slow', 
			timeout: 0,
    		timeout: 5000,
			next:   '#next', 
			prev:   '#prev' 
		});

		$('#pager') 
			.after('<div id="nav">') 
			.cycle({ 
				fx:     'fade', 
				speed:  'slow', 
				timeout: 0, 
				pager:  '#nav' 
		});
	});
	
    <!--
    $(function () {        
        $('div.news marquee').marquee('pointer').mouseover(function () {
            $(this).trigger('stop');
        }).mouseout(function () {
            $(this).trigger('start');
        }).mousemove(function (event) {
            if ($(this).data('drag') == true) {
                this.scrollLeft = $(this).data('scrollX') + ($(this).data('x') - event.clientX);
            }
        }).mousedown(function (event) { 
            $(this).data('drag', true).data('x', event.clientX).data('scrollX', this.scrollLeft);
        }).mouseup(function () {
            $(this).data('drag', false);
        });
    });
    //-->
    </script>
</head>
<body id="page-top">
	<header role="banner">
		<div class="wrapper clearfix" style="*	z-index: 13;">
			<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				<?php bloginfo( 'name' ); ?>
			</a>
        </div>    
		<div class="wrapper clearfix" style="*	z-index: 12;">
			<nav>
            	<?php wp_nav_menu( array(
					'sort_column' => 'menu_order',
					'menu_class'  => 'top-level',
					'include'     => '',
					'exclude'     => '',
					'echo'        => true,
					'show_home'   => false,
					'link_before' => '',
					'link_after'  => '') 
				);?>
            	<!--
				<ul class="top-level">
					<li><a class="dropdown">About</a>
						<ul class="second-level">
							<li><a>The Initiative</a>
								<ul class="third-level"> 
									<li><a>Overview</a></li>
									<li><a>What are we working on?</a></li>
								</ul>	
							</li>
							<li><a>Blue Carbon</a></li>
						</ul>	
					</li>
					<li><a class="dropdown">Working Groups</a>
						<ul class="second-level">
							<li><a>Scientific</a></li>
							<li><a>Policy</a>
								<ul class="third-level">
									<li><a>Overview</a></li>						
									<li><a>Summary of Workshops</a></li>			
								</ul>
							</li>				
						</ul>
					</li>
					<li><a>Field Work</a></li>
					<li><a>Resources</a></li>
				</ul>
                -->
				<div class="search">
					<?php get_search_form(); ?>
					<!--
					<input class="input" value="Search" type="text"/>
					<input class="go" type="submit" value="go"/>
					-->
				</div>
			</nav>
		</div>
		<ul class="other-nav">
			<?	if(!is_user_logged_in()) {
				?>
			<li class="protected"><a>Login</a></li>
                <?php
				} else {?>
			<li class="protected"><a>Protected Site</a></li>
                <?php } ?>
			<li class="newsroom"><a>Newsroom</a></li>
		</ul>
		<div class="news">
			<div class="wrapper clearfix">
				<h2>Newsroom</h2>
                
				<marquee behavior="scroll" direction="left" scrollamount="1" width="880">
				<?php
					$args = array(
					'numberposts'     => 4,
					'offset'          => 0,
					'category_name'   => 'ticker-posts',
					'orderby'         => 'post_date',
					'order'           => 'ASC',
					'post_type'       => 'post',
					'post_status'     => 'publish',
					'suppress_filters' => true 
					);
					
					$my_posts = get_posts($args);	
					
					foreach( $my_posts as $post ) :	setup_postdata($post);
					
				?>
				
				<span><a href="<?php echo add_query_arg( 'cat', '23', esc_url( home_url( '/' ) ) );?>"><?php the_title(); ?></a></span>
  				
				<?php endforeach; ?>
                
                </marquee>
				<a class="close">close</a>
			</div>
		</div>
		<div class="login">
			<div class="wrapper clearfix">
            	<?php

				//wp_login_form();
				if(!is_user_logged_in()) {
				?>
				<form method="post" id="loginform">
	        		
					<div class="form-row">
						<label>Login Credentials</label>
						<input type="text" disabled="disabled" name="emaildisplay" id="emaildisplay" value="Visitor" class="input"/>
						<input style="display: none;" type="text" name="email" id="email" value="Visitor" class="input"/>
						<input type="password" name="password" id="password" value="password" class="input"/>
						<input type="submit" value="submit" class="btn"/>
					</div>
                    
					<div class="form-row">
						<span>Request Login Credentials <a>here</a></span>
						<input type="checkbox" id="i_agree" class="checkbox"/><label class="terms">I Agree to the 												    			
						<a href="<?php echo add_query_arg( 'p', '248', esc_url( home_url( '/' ) ) );?>" target="_blank">Terms &amp; Conditions</a></label>
					</div>
				</form>
                <?php
				}else {?>
					
					<div class="logged-in">
						<?php 
						
						$protected_category= get_category_by_slug( "protected" );

						$location = get_category_link($protected_category->term_id);

						?>								
						<a class="btn" href="<? echo $location; ?>">Go to Protected Site</a>
						<a href="<?php echo wp_logout_url( home_url() ); ?>" title="Logout">Logout</a>
					</div>
					
				<?php }?>	
				<a class="close">close</a>
			</div>
		</div>
	</header>
    
    


