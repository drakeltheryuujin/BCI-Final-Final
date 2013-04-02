<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	<footer>
		<div class="wrapper clearfix">
			<a class="top">top</a>
			<div class="site-map">
				<ul class="list">
                
                <?php
					$args = array(
					'category_name'	  => 'footer-links',
					'offset'          => 0,
					'order'           => 'ASC',
					'post_type'       => 'post',
					'post_status'     => 'publish',
					'suppress_filters' => true );

					$policy_posts = get_posts($args);				

				 	foreach( $policy_posts as $post ) : setup_postdata($post); 
					
						$category_slug_to_redirect_to =  get_post_meta(get_the_ID(), 'category_slug_to_redirect_to', true);
						
						if($category_slug_to_redirect_to) {

							$category_to_redirect_to = get_category_by_slug($category_slug_to_redirect_to);
							$category_link = get_category_link($category_to_redirect_to->term_id);
						}
						else {
							$category_link = get_permalink();
						}
						
				?>
					<li><a href="<?php echo $category_link; ?>"><?php the_title(); ?></a></li>
            	<?php endforeach; ?>

				</ul>
                
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
					<li><a>About</a>
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
					<li><a>Working Groups</a>
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
			</div>
			<div class="logos">
				<a href="http://www.conservation.org" target="_blank" class="conservation">conservation international</a>
				<a href="http://ioc-unesco.org/" target="_blank"  class="united">united nations</a>
				<a href="http://www.iucn.org/" target="_blank"  class="ciucn">ciucn</a>
			</div>
			<div class="credits">
				<!--
				<h2>Photography Credits</h2>
				-->                
<?php
					query_posts('category_name=footer-credits&orderby=date&order=ASC'); while(have_posts()) : the_post();
				?>
				<strong><?php the_title(); ?>: </strong><?php the_content(); ?>
				<?php endwhile; ?>
			</div>
		</div>	
	</footer>
	
	<div class="overlay">
		<div class="newsletter popup">
			<a class="close">close</a>
			<h2>Sign up to receive email updates from the Blue Carbon Initiative.</h2>
			<div id="mc_embed_signup">
				<form action="http://thebluecarboninitiative.us6.list-manage.com/subscribe/post?u=1e6a1ccec878546504f30e226&amp;id=7a81347525" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<div class="form-row">
						<input type="email" value="" name="EMAIL" class="email input" id="mce-EMAIL" placeholder="email address" required>
					</div>
					<div class="form-row">
						<input type="submit" value="Submit" name="subscribe" id="mc-embedded-subscribe" class="btn">
						<a href="<?php echo add_query_arg( 'p', '252', esc_url( home_url( '/' ) ) );?>" target="_blank">Privacy Policy</a>
					</div>
				</form>
			</div>			
		</div>
<?php if ($_POST && $_POST['form'] == "credentials_form") {

	require_once 'EMail.php';
	
	$email = 'thebluecarboninitiative@conservation.org';	
	$subject = 'A Request for BCI Credentials';
	$request_email = $_POST['request-email'];
	$reply_to = $_POST['request-email'];
	$name = $_POST['name'];
		
	$to = $email;
	$subject = $subject;
	$message = "You have a request from " . $name . " for credentials to thebluecarboninitiative.com from " . $request_email;
	$from = $reply_to;
	$headers = "From:" . $reply_to;
	mail($to,$subject,$message,$headers);


} ?>	
		<div class="credentials popup">
			<a class="close">close</a>
			<h2>Request Credentials</h2>
			<form method="post">
				<input type="hidden" name="form" value="credentials_form"/>
				<div class="form-row">
					<input type="text" class="input" id="name" name="name" value="Name"/>
				</div>
				<div class="form-row">
					<input type="text" class="input" id="request-email" name="request-email"  value="Email"/>
				</div>	
				<div class="form-row">
					<input type="submit" class="btn" value="Submit"/>
				</div>	
			</form>
		</div>
		
<?php if ($_POST && $_POST['form'] == "contact_form") {

	require_once 'EMail.php';
	
	$email = $_POST['to-email'];	
	$subject = 'A Message from BCI Contact Form';
	$from_email = $_POST['sender-email'];
	$reply_to = $_POST['sender-email'];
	$body = $_POST['message'];
		
	$to = $email;
	$subject = $subject;
	$message = $body;
	$from = $reply_to;
	$headers = "From:" . $reply_to;
	mail($to,$subject,$message,$headers);


} ?>		
		
		<div class="contact-form popup">
			<a class="close">close</a>
			<h2>Contact Form</h2>
			<form method="post">
				<input type="hidden" name="form" value="contact_form"/>
				<div class="form-row" style="display: none;">
					<input type="text" name="to-email" id="to-email" class="input" value=""/>
				</div>
				<div class="form-row">
					<input type="text" name="sender-email" id="sender-email" class="input" value="Sender Email"/>
				</div>
				<div class="form-row">
					<textarea name="message" id="message" class="input">Message</textarea>
				</div>	
				<div class="form-row">
					<input type="submit" class="btn" value="Submit"/>
				</div>	
			</form>
		</div>
	</div>
  <!-- scripts concatenated and minified via ant build script-->
	<script>
		
		var pathname = "<?php echo esc_url( home_url( '/' ) ); ?>";

	</script>

  <script src="<?php bloginfo( 'template_directory' ); ?>/js/script.js"></script>
  <!-- end concatenated and minified scripts-->
  
  
  <!--[if lt IE 7 ]>
    <script src="js/libs/dd_belatedpng.js"></script>
    <script> DD_belatedPNG.fix('img, .png_bg'); </script>
  <![endif]-->


  <!-- change the UA-XXXXX-X to be your site's ID -->
	
<script type=“text/javascript”>
var _gaq = _gaq || [];
  _gaq.push(
  ['_setAccount', 'UA-12524661-34'], //Conservation
  ['_trackPageview'],
  ['b._setAccount', 'UA-29229844-4'], //Convo
  ['b._trackPageview']
);
(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
</body>
</html>