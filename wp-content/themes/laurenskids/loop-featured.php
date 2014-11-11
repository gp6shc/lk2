<?php
/**
 * @package laurenskids
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php the_post_thumbnail( 'news-featured-thumb', array('class' => 'attachment-full') ); ?>
		<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>

	<div class="excerpt">
		<?php the_excerpt( sprintf( '<p class="inline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></p>' ); ?>
	</div><!-- .entry-content -->
	
</article><!-- #post-## -->
