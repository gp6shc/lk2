<?php
/**
 * @package laurenskids
 */
?>

<div class="news">
	<div class="content">
		<h1>Our Latest News</h1>
		
		<div id="featured" class="grid_4">
		<?php $lk_featured_query = new WP_Query( 'category_name=featured-news&posts_per_page=2' );
		while ( $lk_featured_query->have_posts() ) : $lk_featured_query->the_post();
		$do_not_duplicate = $post->ID; ?>
			<?php get_template_part( 'loop', 'news-featured' ); //'loop-news-featured.php' ?>
		<?php endwhile; // end of news-featured loop. ?>
		</div>
		
		<div id="latest" class="grid_8 omega">
		<?php $lk_latest_query = new WP_Query( 'category__not_in=3&posts_per_page=5' );
		while ( $lk_latest_query->have_posts() ) : $lk_latest_query->the_post();
		$do_not_duplicate = $post->ID; ?>
			<?php get_template_part( 'loop', 'news-latest' ); //'loop-news-latest.php' ?>
		<?php endwhile; ?>
		</div>
		
	</div>
</div>

