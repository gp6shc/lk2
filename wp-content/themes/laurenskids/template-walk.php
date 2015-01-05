<?php
/**
 * Template Name: Walk
 *
 * @package laurenskids
 */

get_header(); ?>
<style>
.background-image {
	background-image: url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full" )[0] ?>);
}
	
@media screen and (max-width: 612px) {
	.background-image {
		background-image: url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "large" )[0] ?>);
	}
}
</style>

<div class="background-image banner">
	<div class="subnav">
		<div class="container">
			<?php
				$menu = get_term(get_nav_menu_locations()['awareness'], 'nav_menu');				
				wp_nav_menu( array( 'theme_location' => 'awareness', 'menu_class' => 'size-'.$menu->count, ) );
			?>
		</div>
	</div>
</div><!-- .background-image -->
	
<div class="container interior">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				
				<article id="post-<?php the_ID(); ?>" <?php post_class('interior-page-content'); ?>>
				    <header class="entry-header">
						<h2 class="butterfly"><?php the_title() ?></h2>
				    </header><!-- .entry-header -->
				
				    <div class="entry-content">
				    	<?php the_content(); ?>
				    </div><!-- .entry-content -->
				
				    <footer class="entry-footer">
				    	<?php edit_post_link( __( 'Edit', 'laurenskids' ), '<span class="edit-link">', '</span>' ); ?>
				    </footer><!-- .entry-footer -->
				</article><!-- #post-## -->
				
				<aside class="page-testimonial">
					<?php dynamic_sidebar('testimonial'); ?>
				</aside>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .container -->


<!-- Partners Section -->			
<div class="partners">
	<div class="content">
		<h1 class="centered-text butterfly-white">Supporters of the Walk</h1>
		<div id="js-left-arrow" class="arrows arrow-left"></div>
		<div id="js-supporters" class="owl-carousel">
			<?php 
				$args = array( 'post_type' => 'walk-supporters', 'posts_per_page' => -1, 'order' => 'ASC' );
				$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); 
						$logo = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
					?>
					<a href="<?php the_permalink()?>"><div class="supporter-contain">
						<div class="supporter" title="<?php the_title()?>" style="background-image: url(<?php echo $logo[0];?>)"></div>
					</div></a>
			<?php	endwhile; 
				/* Restore original Post Data */
				wp_reset_postdata();
			?>
		</div>
		<div id="js-right-arrow" class="arrows arrow-right"></div>
	</div>
</div>
	
<?php get_footer(); ?>
