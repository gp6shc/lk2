<?php
/**
 * Header.php
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package laurenskids
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<script src="//use.typekit.net/hne5xvx.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<script>
    jQuery(document).ready(function() {
		var masthead = jQuery("#masthead");
		var top_area = jQuery(".top-area");
		var logo = jQuery("img.logo");
		var menu = jQuery(".menu-toggle");
		jQuery(function () {
		   jQuery(window).scroll(function () {
		   
			 //when we scroll past 70 (top area buttons) && on a screen size > 800px...
		     if (jQuery(this).scrollTop() > 70 && jQuery(window).width() > 800) { 
		        masthead.css({"position":"fixed", "max-width":"100%", "border-bottom":"1px solid #CCC", "height":"80px", "top":0});
		        top_area.css({"display":"none"});
				logo.attr('src', '<?php bloginfo('stylesheet_directory') ?>/img/logo-sticky-nav.png');
				logo.css({"max-width":"190px", "margin-top":"-12px"});
		     }
		     
		     //when we scroll TO menu bar && on screen < 800px, keep menu fixed...
		     else if (jQuery(this).scrollTop() > 300 && jQuery(window).width() < 800) { 
		     	menu.css({"position":"fixed", "top":0});
		     }
		     
		     //when we scroll BACK UP on screen < 800px, put menu back to original pos.
		     else if (jQuery(this).scrollTop() <= 150 && jQuery(window).width() < 800) { 
		     	menu.css({"position":"relative", "margin":0});
		     }
				 
			 //when we scroll back up...
		     else {
		        masthead.css({"position":"relative", "height": "auto"}); 
		        top_area.css({"display":"block", "float":"right", "margin":"0 0 35px 0;"}); 
		        logo.attr('src', '<?php bloginfo('stylesheet_directory') ?>/img/logo-full-nav.png');
		        logo.css({"max-width":"137px", "margin":"0 auto"});
		     }
 
		  });
	   });
	});
</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" role="banner">

		<div class="header">
		
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="logo" src="<?php bloginfo('stylesheet_directory') ?>/img/logo-full-nav.png"></img></a>
			
			<div class="top-area">
				<ul class="social">
					<a href="#"><li><i class="fa fa-twitter"></i></li></a>
					<a href="#"><li><i class="fa fa-facebook"></i></li></a>
					<a href="#"><li><i class="fa fa-rss"></i></li></a>
					<a href="#"><li><i class="fa fa-youtube"></i></li></a>
				</ul>
				<div class="quick-links">
					<a href="#"><button class="help">Need Help?</button></a>
					<a href="#"><button class="join">Join the Movement &amp; Donate</button></a>
				</div>
			</div>

			<nav id="site-navigation" class="main-navigation push-nav" role="navigation">
				<button class="menu-toggle"><?php _e( 'Menu', 'laurenskids' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- /#site-navigation -->
		</div><!--/.header -->

	</header><!--/#masthead -->

	<div class="container">
