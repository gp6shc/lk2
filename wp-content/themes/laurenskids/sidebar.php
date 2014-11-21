<?php
/**
 * The sidebar on the single posts
 *
 * @package laurenskids
 */

?>

<aside class="single-sidebar clear" role="complementary">
	<h3>What's New?</h3>
	<a href="<?php echo home_url(); ?>/whats-new/?uformid=119&taxo%5B0%5D%5Bname%5D=category&taxo%5B0%5D%5Bopt%5D=1&taxo%5B0%5D%5Bterm%5D=news&skeyword=" class="sidebar-nav"><h5>News</h5></a>
	<a href="<?php echo home_url(); ?>/whats-new/?uformid=119&taxo%5B0%5D%5Bname%5D=category&taxo%5B0%5D%5Bopt%5D=1&taxo%5B0%5D%5Bterm%5D=blog&skeyword=" class="sidebar-nav"><h5>Blog</h5></a>
	<div class="archive-contain">
		<a id="js-archive-btn" class="sidebar-nav"><h5>Archive</h5></a>
		<div id="js-archive-list" class="archive-list">
			<?php if (is_archive()) {
				wp_get_archives(array( 'type' => "monthly", 'limit' => 24 ));
			}else{
				wp_get_archives(array( 'type' => "yearly", ));
				
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
	
	<hr>

	<?php dynamic_sidebar('testimonial'); ?>

</aside><!-- .single-sidebar -->
