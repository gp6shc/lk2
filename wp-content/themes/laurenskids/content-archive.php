<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package laurenskids
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<a href="<?php the_permalink(); ?>">
	<header class="entry-header">
		<h3 class="entry-title"><?php the_title(); ?></h3>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<h6><span><?php the_time('F j, Y'); ?></span></h6>
		<p style="margin-top: 15px"><?php laurenskids_excerpt(225, true); ?></p>
		<hr class="short-hr">
		<h6><span>Category:</span> <?php 
			$category = get_the_category();
			$length = count($category);
			$i = 0;
			foreach($category as $aCat) {
				if ($i < $length - 1) {
					echo $aCat->cat_name . ", ";
				}else{
					echo $aCat->cat_name;
				}
			$i++;
			}?>
		</h6>
		<h6>
			<?php
				$posttags = get_the_tags();
				if ($posttags) {
					echo "<span>Tags: </span>";
					$i = 1;
					foreach($posttags as $tag) {
						if ($i < count($posttags) ) {
							echo $tag->name . ', '; 
						}else{
							echo $tag->name; 
						}
					$i++;
					}
				}
			?>
		</h6>
	</div><!-- .entry-content -->

</a>
</article><!-- #post-## -->
