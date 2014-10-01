<?php
/**
 * @package laurenskids
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="latest-thumb grid_5">
	<?php the_post_thumbnail( 'news-latest-thumb', array('class' => 'attachment-full') ); ?>
	</div>

	<div class="entry-meta grid_7 omega">
		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
		<?php laurenskids_posted_on(); ?>
		<div class="entry-content">
			<?php the_excerpt() ?>
		</div><!-- .entry-content -->
	</div><!-- .entry-meta -->
	
	<div class="clearfix"></div>

</article><!-- #post-## -->
