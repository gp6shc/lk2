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
<script>
  (function(d) {
    var config = {
      kitId: 'hne5xvx',
      scriptTimeout: 3000
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='//use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<script async type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/js/events.js"></script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" role="banner">

		<div class="header">

			<a href="<?php echo home_url() ?>" rel="home">
				<div class="logo"></div>
			</a>
			
			<div class="top-area">
				<ul id="js-social" class="social">
					<a href="#"><li><i class="fa fa-twitter"></i></li></a>
					<a href="#"><li><i class="fa fa-facebook"></i></li></a>
					<a href="#"><li><i class="fa fa-rss"></i></li></a>
					<a href="#"><li><i class="fa fa-youtube"></i></li></a>
				</ul>
				<div id="js-quick-links" class="quick-links">
					<a href="#"><button class="help">Need Help?</button></a>
					<a href="<?php echo home_url('/join-donate') ?>"><button class="join">Join the Movement &amp; Donate</button></a>
				</div>
				<div class="search">
					<?php get_search_form() ?>
				</div>
			</div>

			<nav id="site-navigation" class="main-navigation push-nav" role="navigation">
				<button class="menu-toggle"><?php _e( '<i class="fa fa-bars fa-2x"></i>', 'laurenskids' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- /#site-navigation -->
		</div><!--/.header -->

	</header><!--/#masthead -->