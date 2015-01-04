<?php
/**
 * The sidebar on the single posts
 *
 * @package laurenskids
 */

?>

<aside class="single-sidebar clear" role="complementary">
	<h3>What's New?</h3>
	<a href="<?php echo home_url(); ?>/whats-new/?taxo[0][term]=news" class="sidebar-nav"><h5>News</h5></a>
	<a href="<?php echo home_url(); ?>/whats-new/?taxo[0][term]=blog" class="sidebar-nav"><h5>Blog</h5></a>
	<div class="archive-list-contain">
		<a id="js-archive-btn" class="sidebar-nav"><h5>Archive</h5></a>
		<div id="js-archive-list" class="archive-list<?php if (is_archive()) echo ' open'?>">
			<?php if (is_archive()) {
				wp_get_archives(array( 'type' => "monthly" ));
			}else{
				wp_get_archives(array( 'type' => "yearly" ));
				
			}?>
		</div>
	</div>
	
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
	
	<?php 
		if (is_active_widget()) {
			echo "<hr>";
			dynamic_sidebar('testimonial');
		}
	?>

</aside><!-- .single-sidebar -->
