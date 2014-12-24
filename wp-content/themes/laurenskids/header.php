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
<?php if (is_singular()): ?><meta property="fb:app_id" content="{1539132222993479}"/><?php endif;?>
<?php if (is_page(152) || is_singular("survivor-stories")):?><META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"><?php endif;?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="shortcut icon" href="<?php echo home_url("favicon.ico")?>"/>
<style> /* hides font while typekit loads */

body {transition: opacity 0.3s}
.wf-loading body {opacity:0;}
.wf-active body {opacity:1}
.wf-inactive body {opacity:1}
/*
h1,h2,h3,h4,h5,.menu-item a,.tax-radio-0 span{opacity: 1;transition: opacity 0.5s !important;}
.wf-loading h1,.wf-loading h2,.wf-loading h3,.wf-loading h4,.wf-loading h5,.wf-loading .menu-item a, .wf-loading .tax-radio-0 span{opacity:0;}
.wf-active h1,.wf-active h2,.wf-active h3,.wf-active h4,.wf-active h5,.wf-active .menu-item a, .wf-active .tax-radio-0 span{opacity:1;}
.wf-inactive h1,.wf-inactive h2,.wf-inactive h3,.wf-inactive h4,.wf-inactive h5,.wf-inactive .menu-item a, .wf-inactive .tax-radio-0 span{opacity:1;}
*/

</style>
<script>
  (function(d) {
  var tkTimeout=3000;
  if(window.sessionStorage){if(sessionStorage.getItem('useTypekit')==='false'){tkTimeout=0;}}
  var config = {
    kitId: 'hne5xvx',
    scriptTimeout: tkTimeout
  },
  h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+"wf-inactive";if(window.sessionStorage){sessionStorage.setItem("useTypekit","false")}},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+="wf-loading";tk.src='//use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
})(document);
</script>
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,700' rel='stylesheet' type='text/css'>
<?php if (is_page(152)): ?><link href='http://fonts.googleapis.com/css?family=Sacramento' rel='stylesheet' type='text/css'> <?php endif; ?>
<?php wp_head(); ?>

</head>

<body <?php body_class() ?>>
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
					<a href="http://www.laurenskidsphotos.org/" target="_blank" title="View our SmugMug photos "><i class="fa fa-camera"></i></a>
					<a href="http://www.youtube.com/user/LaurensKids" target="_blank" title="View our YouTube Page"><i class="fa fa-youtube-play"></i></a>
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