<?php
/**
 * Template Name: Survivor Stories
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
	<div id="primary" class="content-area clear">
		<main id="main" class="site-main" role="main">
		<h1 class="centered-text butterfly"><?php the_title(); ?></h1>
			<?php //call in the content of the page Survivor Stories 
				$post_id = get_the_ID();
				global $post;
				$post = &get_post($post_id);
				setup_postdata( $post );
				the_content();
				wp_reset_postdata( $post );
			?>	
		<hr class="short-hr">
		
		<?php echo do_shortcode('[ULWPQSF id=188 button=0 formtitle="0"]'); ?>
		<div class="blog-container">
			<div class="loader opacity-0"></div>
			
			<div id="lk-ajax" class="clear">
			
			</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php get_footer(); ?>
