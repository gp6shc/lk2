<?php
/*
Template Name: Home
*
* separating out 
*/
get_header(); ?>


	<?php get_template_part( 'content', 'home-video' ); //'content-home-video.php' ?>
			
	<?php get_template_part( 'content', 'home-welcome' ); //'content-home-welcome.php' ?>
				
	<?php get_template_part( 'content', 'home-news' ); //'content-home-news.php' ?>
				
	<?php get_template_part( 'content', 'home-partners' ); //'content-home-partners.php' ?>
		
		
<?php get_footer(); ?>
