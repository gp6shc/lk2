<?php
/**
 * @package laurenskids
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="latest-thumb grid_4">
	<?php the_post_thumbnail( 'news-latest-thumb', array('class' => 'attachment-full') ); ?>
	</div>

	<div class="entry-meta grid_8 omega">
		<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
		<h6><?php the_time('F j, Y') ?></h6>
		<div class="excerpt">
			<?php the_excerpt() ?>
		</div><!-- .entry-content -->
	</div><!-- .entry-meta -->
	
	<div class="clearfix"></div>

</article><!-- #post-## -->
