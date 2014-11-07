<?php
/**
 * @package laurenskids
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
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
	
	<footer class="post-footer clear">
			<div class="post-tags">
				<?php the_tags(); ?>
			</div>
			<div class="post-share">
				<?php echo do_shortcode('[linkbar facebook=1 twitter=1 googleplus=1 email=1 url=1]'); ?>
			</div>
	</footer>
	
	<div class="fb-comments">
	<?php /*
		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || '0' != get_comments_number() ) :
			comments_template();
		endif; */
		echo do_shortcode('[fbcomments url="http://peadig.com/wordpress-plugins/facebook-comments/" count="off" num="8" countmsg="wonderful comments!"]');
	?>
	</div>


</article><!-- #post-## -->