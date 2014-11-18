<?php
/**
 * Template Name: Blog
 *
 * @package laurenskids
 */

get_header(); ?>

<div class="container">
	<div id="primary" class="content-area clear">
		<main id="main" class="site-main" role="main">
		<h1 class="centered-text butterfly">What's New?</h1>
		
		<?php //call in the content of the page What's New? 
			$post_id = 16;
			global $post;
			$post = &get_post($post_id);
			setup_postdata( $post );
			the_content();
			wp_reset_postdata( $post );
		?>
		
		<?php echo do_shortcode('[ULWPQSF id=119 button=0 formtitle="0"]'); ?>
		<div class="blog-container">
			<div class="loader"></div>
			
			<div id="lk-blog">
			
			</div>
		</div>
		<?php laurenskids_paging_nav(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php get_footer(); ?>
