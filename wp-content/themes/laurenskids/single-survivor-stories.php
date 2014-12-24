<?php
/**
 * The template for displaying all survivor posts.
 *
 * @package laurenskids
 */

get_header(); ?>
<div class="subnav">
	<div class="container">
		<?php
			$menu = get_term(get_nav_menu_locations()['awareness'], 'nav_menu');				
			wp_nav_menu( array( 'theme_location' => 'awareness', 'menu_class' => 'size-'.$menu->count, ) );
		?>
	</div>
</div>

<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'survivor-story-single' ); ?>
			
			<?php get_sidebar('survivor'); ?>
			
		<?php endwhile; // end of the loop. ?>
		
		</main><!-- #main -->
	</div><!-- #primary -->
	

</div><!-- .container -->

<?php get_footer(); ?>