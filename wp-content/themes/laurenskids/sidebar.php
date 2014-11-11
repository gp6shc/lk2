<?php
/**
 * The sidebar on the single posts
 *
 * @package laurenskids
 */

?>

<aside class="single-sidebar clear" role="complementary">
	<h3>What's New?</h3>
	<a href="/news" class="sidebar-nav"><h5>News</h5></a>
	<a href="/blog" class="sidebar-nav"><h5>Blog</h5></a>
	<a href="/archive" class="sidebar-nav"><h5>Archive</h5></a>
	
	<hr>
	
	<h4>Search</h4>
	<div class="sidebar-search">
		<?php get_search_form(true); ?>
	</div>
	
	<hr>
	
	<h4>Recent Posts</h4>
	
	<div class="recent-posts">
		<ul>
			<?php
				$args = array( 'numberposts' => '4' );
				$recent_posts = wp_get_recent_posts( $args );
				foreach( $recent_posts as $recent ){
					echo '<li><a href="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"] . '</a></li> ';
				}
			?>
		</ul>
	</div>
	
	<hr>

	<?php dynamic_sidebar('testimonial'); ?>

</aside><!-- .single-sidebar -->
