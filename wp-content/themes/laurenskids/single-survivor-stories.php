<?php
/**
 * The template for displaying all single posts.
 *
 * @package laurenskids
 */

get_header(); ?>
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'survivor-story-single' ); ?>
			
			<?php get_sidebar('sidebar-1'); ?>
			
		<?php endwhile; // end of the loop. ?>
		
		</main><!-- #main -->
	</div><!-- #primary -->
	

</div><!-- .container -->

<?php get_footer(); ?>