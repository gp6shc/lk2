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
jQuery(window).scroll(function () {
	var masthead = jQuery("#masthead");
	var top_area = jQuery(".top-area");
	var logo = jQuery("img.logo");
	var menu = jQuery(".menu-toggle");

	    //when we scroll past 70 && on a screen size > 800px...
        if (jQuery(this).scrollTop() > 70 && jQuery(window).width() > 800) { 
			masthead.addClass('stickyhead');
			logo.attr('src', '<?php bloginfo('stylesheet_directory') ?>/img/logo-small.png');
			logo.addClass('small');
			top_area.css({'display':'none'});
		
		//when we scroll back up && on a screen size > 800...
		} else if (jQuery(this).scrollTop() < 70 && jQuery(window).width() > 800) { 
			masthead.removeClass('stickyhead');
			logo.attr('src', '<?php bloginfo('stylesheet_directory') ?>/img/logo-full.png');
			logo.removeClass('small');
			top_area.css({'display':'block'});
			
		//when we scroll to menu-toggle && on a screen size < 800px (1st brk point)...	
		} else if (jQuery(this).scrollTop() > 250 && jQuery(window).width() < 800) { 
			menu.css({"position":"fixed", "top":0});
			
		//when we scroll back up && on a screen size < 800px (1st brk point)...	
		} else if (jQuery(this).scrollTop() < 250 && jQuery(window).width() < 800) { 
			menu.css({"position":"relative", "margin":0});
			
		} else{
			//blah
		}
		
 
});
</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" role="banner">

		<div class="header">
		
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="logo" src="<?php bloginfo('stylesheet_directory') ?>/img/logo-full.png"></img></a>
			
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
