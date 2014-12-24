<?php
/**
 * The sidebar on the single posts
 *
 * @package laurenskids
 */

?>

<aside class="single-sidebar clear" role="complementary">

	<h4>Search</h4>
	<div class="sidebar-search">
		<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
			<span>
				<input type="search" class="search-field" placeholder="Search for..." value="<?php echo get_search_query() ?>" name="s" title="Search" />
				<input type="hidden" name="post_type" value="survivor-stories"/>
				<input type="submit" class="search-submit" value="Search" />
			</span>
		</form>
	</div>
	
	<hr>
	
	<h4>Recent Stories</h4>
	
	<div class="recent-posts">
		<ul>
			<?php
				$args = array( 'numberposts' => '5', 'post_type' => 'survivor-stories' );
				$recent_posts = wp_get_recent_posts( $args );
				foreach( $recent_posts as $recent ){
					echo '<li><a href="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"] . '</a></li> ';
				}
			?>
		</ul>
	</div>
	
	<?php 
		if (is_active_widget()) {
			echo "<hr>";
			dynamic_sidebar('testimonial');
		}
	?>


</aside><!-- .single-sidebar -->
