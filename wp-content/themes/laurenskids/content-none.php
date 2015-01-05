<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package laurenskids
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title">Nothing Found</h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php if ( is_search() ) : ?>
			<div class="page-content">
			<p>Sorry, but nothing matched your search terms. Please try again with some different keywords:</p>
				<div class="search-404">
					<?php get_search_form(); ?>
				</div>
			</div>

		<?php else : ?>
			<div class="page-content centered-text">
			<p>'It seems we can't find what you're looking for. Perhaps searching can help:</p>
				<div class="search-404">
					<?php get_search_form(); ?>
				</div>
			</div>

		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
