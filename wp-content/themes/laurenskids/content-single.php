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
	
	<footer class="post-footer clear">
			<div class="post-tags">
				<?php the_tags(); ?>
			</div>
			<div class="post-share">
				<?php echo do_shortcode('[linkbar facebook=1 twitter=1 googleplus=1 email=1 url=1]'); ?>
			</div>
	</footer>
	
		<div id="fb-root"></div>
		<script>
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1539132222993479&version=v2.0";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		<div class="fb-comments" data-href="<?php the_permalink()?>" data-numposts="5" data-width="100%" data-colorscheme="light"></div>
		
	</div>


</article><!-- #post-## -->