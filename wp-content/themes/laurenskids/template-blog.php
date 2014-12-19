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
		
			<?php echo do_shortcode('[ULWPQSF id=119 button=0 formtitle="0"]'); ?>

			<div class="blog-container">
				<div class="loader-contain scale-0">
					<div class="loader"></div>
				</div>
				
				<div id="lk-ajax" class="clear">
				
				</div>
			</div>
			
		</main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php get_footer(); ?>
