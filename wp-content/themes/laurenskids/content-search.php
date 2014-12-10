<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package laurenskids
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<a href="<?php the_permalink(); ?>">
	<?php if ($post->post_type == 'page'):?>
		<div class="page-label"><span>Page</span></div>
	<?php endif;?>

	<header class="entry-header">
		<h3 class="entry-title"><?php the_title(); ?></h3>
	</header>

	<div class="entry-content">
		
		<h6><span><?php the_time('F j, Y'); ?></span></h6>
		<p style="margin-top: 15px"><?php laurenskids_excerpt(55); ?></p>
		<?php 
			$category = get_the_category();
			$length = count($category);
			$i = 0;
			
			if ($length !== 0) { ?>	
				<hr class="short-hr">
				<h6><span>Category:</span>
				
		<?php	foreach($category as $aCat) {
					if ($i < $length - 1) {
						echo $aCat->cat_name . ", ";
					}else{
						echo $aCat->cat_name;
					}
				$i++;
				}
			}?>
		</h6>
		<?php
			$posttags = get_the_tags();
			if ($posttags) {
				echo "<h6><span>Tags: </span>";
				$i = 1;
				foreach($posttags as $tag) {
					if ($i < count($posttags) ) {
						echo $tag->name . ', '; 
					}else{
						echo $tag->name; 
					}
				$i++;
				}
			echo "</h6>";
			}
		?>
	</div><!-- .entry-content -->

</a>
</article><!-- #post-## -->
