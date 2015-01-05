<?php
/*
*Template Name: Home
*/
get_header(); ?>
	<div class="video-wrapper" id="js-video">
		<video autoplay loop muted poster="<?php echo get_stylesheet_directory_uri(); ?>/img/poster.jpg">
			<source src="<?php echo get_stylesheet_directory_uri(); ?>/img/lk-video.webm" type="video/webm">
			<source src="<?php echo get_stylesheet_directory_uri(); ?>/img/lk-video.mp4" type="video/mp4">
		</video>
	</div>
	
	<div class="welcome">
		<div class="content">
			<?php //call in the content of the Home page 
				$post_id = get_the_ID();
				global $post;
				$post = &get_post($post_id);
				setup_postdata( $post );
				the_content();
				wp_reset_postdata( $post );
			?>
		</div>
	</div>
		
	<div class="news">
		<div class="content">
			<h1 class="h-pad-bottom butterfly-delay">Our Latest News</h1>
			<div class="grid_4 featured">
				<?php $lk_featured_query = new WP_Query( 'category_name=featured&posts_per_page=2' );
					while ( $lk_featured_query->have_posts() ) : $lk_featured_query->the_post();
						$do_not_duplicate = $post->ID; ?>

						<article id="post-<?php the_ID(); ?>" class="latest-preview">
						<a href="<?php the_permalink(); ?>" class="clear">

							<div class="featured-thumb"></div>
							<?php the_post_thumbnail( 'news-featured-thumb', array('class' => 'attachment-full') ); ?>
						
							<div class="excerpt">
								<h4><?php the_title();?></h4>
								<p><?php laurenskids_excerpt(87, true); ?></p>
							</div>

						</a>
						</article>
				<?php endwhile;?>
			</div>
			<div class="grid_8 omega latest">
				<?php $lk_latest_query = new WP_Query( 'category__not_in=3&posts_per_page=5' );
					while ( $lk_latest_query->have_posts() ) : $lk_latest_query->the_post();
						$do_not_duplicate = $post->ID; ?>
						
						<article id="post-<?php the_ID(); ?>" class="latest-preview">
						<a href="<?php the_permalink(); ?>" class="clear">
						
						<?php if ( has_post_thumbnail() ): ?>
							<div class="news-thumb"></div>
							<?php the_post_thumbnail( 'news-latest-thumb', array('class' => 'attachment-full') ); ?>
						<?php endif; ?>
							<div class="entry-meta grid_8 omega">
								<h4><?php the_title();?></h4>
								<h5><?php the_time('F j, Y'); ?></h5>
								
								<div class="excerpt">
									<p><?php laurenskids_excerpt(150, true); ?></p>
								</div>
							</div>

						</a>
						</article>
					<?php endwhile; ?>
			</div>
		</div>
	</div>
	
	<div class="partners">
		<div class="content">
			<h1 class="centered-text butterfly-white">Partners & Supporters</h1>
			<div id="js-left-arrow" class="arrows arrow-left"></div>
			<div id="js-supporters" class="owl-carousel">
				<?php 
					$args = array( 'post_type' => 'partners-supporters', 'posts_per_page' => -1, 'order' => 'ASC' );
					$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post(); 
							$logo = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
						?>
						<a href="<?php the_permalink()?>"><div class="supporter-contain">
							<div class="supporter" title="<?php the_title()?>" style="background-image: url(<?php echo $logo[0];?>)"></div>
						</div></a>
				<?php	endwhile; ?>
			</div>
			<div id="js-right-arrow" class="arrows arrow-right"></div>
		</div>
	</div>
	
<?php get_footer(); ?>
