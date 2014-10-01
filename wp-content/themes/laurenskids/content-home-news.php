<?php
/**
 * @package laurenskids
 */
?>

<div class="news">
	<div class="content">
		<h1>Our Latest News</h1>
		
		<div id="featured" class="grid_5">
		<?php $my_query = new WP_Query( 'category_name=featured-news&posts_per_page=2' );
		while ( $my_query->have_posts() ) : $my_query->the_post();
		$do_not_duplicate = $post->ID; ?>
			<?php get_template_part( 'loop', 'news-featured' ); //'loop-news-featured.php' ?>
		<?php endwhile; // end of news-featured loop. ?>
		</div>
		
		<div id="latest" class="grid_7 omega">
		<?php $my_query = new WP_Query( 'category__not_in=3&posts_per_page=5' );
		while ( $my_query->have_posts() ) : $my_query->the_post();
		$do_not_duplicate = $post->ID; ?>
			<?php get_template_part( 'loop', 'news-latest' ); //'loop-news-latest.php' ?>
		<?php endwhile; ?>
		</div>
		
	</div>
</div>

