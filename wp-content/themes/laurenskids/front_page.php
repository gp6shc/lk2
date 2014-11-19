<?php
/*
*Template Name: Home
*/
get_header(); ?>

	<!-- Landing Video -->

	<div class="video-wrapper" id="js-video">
		<video autoplay="autoplay" loop="loop" muted="muted">
			<source src="<?php echo get_stylesheet_directory_uri(); ?>/img/LK-banner-video.mp4" type="video/mp4">
			<!-- <source src="http://www.w3schools.com/html/mov_bbb.ogg" type="video/ogg"> -->
		</video>	
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/vid-bg.jpg"/>
	</div>
	
	<!-- Welcome Message -->		
	<div class="welcome">
		<div class="content">
			<?php //call in the content of the page What's New? 
				$post_id = get_the_ID();
				global $post;
				$post = &get_post($post_id);
				setup_postdata( $post );
				the_content();
				wp_reset_postdata( $post );
			?>

			<a href="<?php echo home_url(); ?>/about"><button class="white">Learn More</button></a>
		</div>
	</div>
		
	<div class="news">
		<div class="content">
			<h1 class="h-pad-bottom butterfly">Our Latest News</h1>
			
	<!-- Featured News -->			
			<div class="grid_4 featured">
				<?php $lk_featured_query = new WP_Query( 'category_name=featured&posts_per_page=2' );
					while ( $lk_featured_query->have_posts() ) : $lk_featured_query->the_post();
						$do_not_duplicate = $post->ID; ?>

						<article id="post-<?php the_ID(); ?>" class="latest-preview">
						<a href="<?php the_permalink(); ?>" class="clear">

							<div class="featured-thumb"><?php the_post_thumbnail( 'news-featured-thumb', array('class' => 'attachment-full') ); ?></div>
						
							<div class="excerpt">
								<h4><?php the_title();?></h4>
								<p><?php laurenskids_excerpt(15); ?></p>
							</div><!-- .entry-content -->

						</a>
						</article><!-- #post-## -->
				<?php endwhile;?>
			</div>
		<!-- Latest News -->
			<div class="grid_8 omega latest">
				<?php $lk_latest_query = new WP_Query( 'category__not_in=3&posts_per_page=5' );
					while ( $lk_latest_query->have_posts() ) : $lk_latest_query->the_post();
						$do_not_duplicate = $post->ID; ?>
						
						<article id="post-<?php the_ID(); ?>" class="latest-preview">
						<a href="<?php the_permalink(); ?>" class="clear">

							<div class="news-thumb">
								<?php the_post_thumbnail( 'news-latest-thumb', array('class' => 'attachment-full') ); ?>
							</div>
						
							<div class="entry-meta grid_8 omega">
								<h4><?php the_title();?></h4>
								<h5><?php the_time('F j, Y'); ?></h5>
								
								<div class="excerpt">
									<p><?php laurenskids_excerpt(25); ?></p>
								</div><!-- .entry-content -->
							</div><!-- .entry-meta -->

						</a>
						</article><!-- #post-## -->
					<?php endwhile; ?>
			</div>
			
		</div>
	</div>
	
	
	<!-- Partners Section -->			
	<div class="partners">
		<div class="content centered-text">
			<h1>Partners & Supporters</h1>
		</div>
	</div>
		
		
<?php get_footer(); ?>
