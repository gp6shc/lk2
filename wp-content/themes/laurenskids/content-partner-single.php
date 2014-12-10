<?php
/**
 * @package laurenskids
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<?php if (has_post_thumbnail()): ?>
	<div class="post-feature">
		<?php the_post_thumbnail('full'); ?>
	</div>
	<?php endif;?>

</article><!-- #post-## -->