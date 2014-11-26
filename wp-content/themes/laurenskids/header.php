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
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site<?php if ( is_single() || is_page(array(16,152)) || is_archive() || is_search() ) {echo " off-white";}?>">

	<header class="masthead <?php if (is_front_page()) echo "home-page"; ?>" role="banner">

		<div class="header">

			<a href="<?php echo home_url() ?>" rel="home">
				<div class="logo">
					<div class="logo-heart"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/LK-heart-logo.svg"/></div>
					<div class="logo-letters"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/LK-letters-logo.svg"/></div>
				</div>
			</a>
			
			<div class="top-area">
				<div id="js-social" class="social">
					<a href="https://twitter.com/laurenskids" target="_blank" title="View our Twitter feed"><i class="fa fa-twitter"></i></a>
					<a href="https://www.facebook.com/laurenskids" target="_blank" title="View our Facebook community"><i class="fa fa-facebook"></i></a>
					<a href="http://www.laurenskidsphotos.org/" target="_blank" title="View our SmugMug photos "><i class="fa"><svg width="17px" height="17px" viewBox="0 0 270 310" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
												<g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd" sketch:type="MSPage">
													<path d="M67.33,61.304 C95.79,60.87 109.43,44.146 107.61,28.943 C106.09,16.235 93.77,4.585 70.28,4.394 C50.93,4.24 38.3,18.568 36.4,32.883 C34.49,47.279 43.44,61.665 67.33,61.304" id="Fill-10"></path>
													<path d="M209.83,57.755 C237.14,56.205 249.08,42.556 249.25,28.92 C249.44,13.545 234.68,-1.816 210.13,0.175 C190.45,1.774 178.93,15.355 177.18,28.935 C175.24,44.035 185.39,59.138 209.83,57.755" id="Fill-12"></path>
													<path d="M104.52,277.695 C6.16,277.695 19.6,160.745 36.15,160.077 C150.47,155.472 179.73,150.745 220.5,150.745 C261.96,150.745 183.03,277.695 104.52,277.695 L104.52,277.695 Z M227.25,118.498 C159.11,125.359 155.78,126.034 30.44,128.925 C-22.42,129.15 -11.16,310 101.7,310 C209.19,310 338.87,107.26 227.25,118.498 L227.25,118.498 Z" id="Fill-13"></path>
												</g>
											</svg></i></a>
					<a href="http://www.youtube.com/user/LaurensKids" title="View our YouTube Page"><i class="fa fa-youtube-play"></i></a>
				</div>
				<div id="js-quick-links" class="quick-links">
					<a href="<?php echo home_url('/resources') ?>"><button class="help white">Need Help?</button></a>
					<a href="<?php echo home_url('/join-donate') ?>"><button class="join white">Join the Movement &amp; Donate</button></a>
				</div>
				<div class="search-nav">
					<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
					    <i id="js-search-btn" class="fa fa-search"></i>
					    <span id="js-search-contain" class="search-elements display-none">
					    	<input type="search" class="search-field" placeholder="Search for..." value="<?php echo get_search_query() ?>" name="s" title="Search" />
					    	<input type="submit" class="search-submit" value="Search" />
					    </span>
					</form>
				</div>
			</div>

			<nav id="site-navigation" class="main-navigation push-nav" role="navigation">
				<span class="fa-stack menu-toggle" id="js-icon-toggle">
					<i class="fa fa-bars fa-stack-2x"></i>
					<i class="fa fa-times fa-stack-2x"></i>
				</span>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- /#site-navigation -->
		</div><!--/.header -->

	</header><!--/#masthead -->