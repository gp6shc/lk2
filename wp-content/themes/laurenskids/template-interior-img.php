<?php
/**
 * Template Name: Interior: Image
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
@media screen and (max-width: 375px) {
	.background-image {
		background-image: url(<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "medium" )[0] ?>);
	}
}
</style>

<div class="background-image banner">
</div><!-- .background-image -->
	
	<div class="container interior">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
	
				<?php while ( have_posts() ) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('interior-page-content'); ?>>
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
					
					<aside class="page-testimonial">
						<?php 
							$children = get_pages('child_of='.$post->ID);
							if( count( $children ) != 0 ) {									// checks if the current page has any children
								echo '<div class="grandchildren-links">';
								wp_list_pages("title_li=&child_of=".$post->ID);				// if so, list them out in the sidebar
								echo '</div>';
							}elseif (count(get_post_ancestors($post->ID)) >= 2 ) {			// if not, check if the page is a grandchild
								echo '<div class="grandchildren-links">';
								wp_list_pages("title_li=&child_of=".$post->post_parent);	// and if so, list out the sibilings to current page 
								echo '</div>';
							}
							
						dynamic_sidebar('testimonial'); ?>
					</aside> 
	
				<?php endwhile; // end of the loop. ?>
	
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .container -->
	
<?php get_footer(); ?>
