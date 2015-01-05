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
<meta name="viewport" content="width=device-width, initial-scale=1, <?php if (is_page(18)){echo 'maximum-scale=1.0';}else{echo 'maximum-scale=2.0';}?>">
<?php if (is_singular()): ?><meta property="fb:app_id" content="{1539132222993479}"/><?php endif;?>
<?php if (is_page(152) || is_singular("survivor-stories")):?><META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"><?php endif;?>
<?php if (is_front_page()): ?>
<style>body {opacity: 0;transition: opacity 0.5s;}</style>
<?php endif; ?>
<title><?php wp_title( '', true, 'right' ); ?></title>
<script src="//use.typekit.net/hne5xvx.js"></script>
<script>try{Typekit.load();}catch(e){}</script>
<link rel="shortcut icon" href="<?php echo home_url("favicon.ico")?>"/>
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,700' rel='stylesheet' type='text/css'>
<?php if (is_page( array(152,10) )): ?><link href='http://fonts.googleapis.com/css?family=Sacramento' rel='stylesheet' type='text/css'> <?php endif; ?>
<?php wp_head(); ?>
<!--[if IE]><link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/ie.css"><![endif]-->
<!--[if IE]><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/classlist/2014.01.31/classList.min.js"></script><![endif]-->
</head>

<body <?php body_class() ?>>
<div id="page" class="hfeed site<?php if ( is_single() || is_page(array(16,152)) || is_archive() || is_search() || is_404() ) {echo " off-white";}?>">

	<header class="masthead <?php if (is_front_page()) echo "home-page"; ?>" role="banner">

		<div class="header">

			<a href="<?php echo home_url() ?>" rel="home">
				<div class="logo">
					<div class="logo-heart"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/LK-heart-logo.svg"/></div>
					<div class="logo-letters"><img src="<?php echo get_stylesheet_directory_uri() ?>/img/LK-letters-logo.svg" title="Lauren's Kids" alt="Lauren's Kids"/></div>
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
					    <span id="js-search-contain" class="search-elements opacity-0">
					    	<input type="search" class="search-field needsclick" placeholder="Search for..." value="<?php echo get_search_query() ?>" name="s" title="Search" />
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