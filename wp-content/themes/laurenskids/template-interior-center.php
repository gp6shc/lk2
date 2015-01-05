<?php
/**
 * Template Name: Interior: Center
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
</div><!-- .background-image -->
	
	<div class="container interior">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
	
				<?php while ( have_posts() ) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					    <header class="entry-header">
					    	<?php if (!is_page(182)) {?><h2 class="butterfly"><?php the_title() ?></h2><?php }//hide on Campaigns & Clips page?> 
					    </header><!-- .entry-header -->
					
					    <div class="entry-content">
					    	<?php the_content(); ?>
					    </div><!-- .entry-content -->
					
					    <footer class="entry-footer">
					    	<?php edit_post_link( __( 'Edit', 'laurenskids' ), '<span class="edit-link">', '</span>' ); ?>
					    </footer><!-- .entry-footer -->
					</article><!-- #post-## -->
	
				<?php endwhile; // end of the loop. ?>
	
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .container -->
	
<?php get_footer(); ?>
