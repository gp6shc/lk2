<?php
/**
 * @package laurenskids
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php the_post_thumbnail( 'news-featured-thumb', array('class' => 'attachment-full') ); ?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt( sprintf( '<p class="inline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></p>' ); ?>
	</div><!-- .entry-content -->
	
</article><!-- #post-## -->
