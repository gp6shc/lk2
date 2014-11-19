<?php
/**
 * @package laurenskids
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-metadata">
			<?php laurenskids_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if (has_post_thumbnail()): ?>
	<div class="post-feature">
		<?php the_post_thumbnail('full'); ?>
	</div>
	<?php endif;?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
	
	<!--
<footer class="post-footer clear">
			<div class="post-tags">
				<?php the_tags(); ?>
			</div>
			<div class="post-share">
				<?php echo do_shortcode('[linkbar facebook=1 twitter=1 googleplus=1 email=1 url=1]'); ?>
			</div>
	</footer>
-->

</article><!-- #post-## -->