<?php
/**
 * Template Name: Image Background
 *
 * @package laurenskids
 */

get_header(); ?>


<div class="background-image" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>);padding-top: 72px;">	
	<div class="container translucent">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
	
				<?php while ( have_posts() ) : the_post(); ?>
	
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					    <div class="entry-content centered-text">
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
</div><!-- .background-image -->	
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>