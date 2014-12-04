<?php
/*
*Template Name: Home
*/
get_header(); ?>

	<!-- Landing Video -->

	<div class="video-wrapper" id="js-video">
		<video autoplay="true" loop="true" muted="muted">
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
		
	<div class="news ">
		<div class="content">
			<h1 class="h-pad-bottom butterfly">Our Latest News</h1>
			
	<!-- Featured News -->			
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
						
						<?php if ( has_post_thumbnail() ): ?>
							<div class="news-thumb"></div>
							<?php the_post_thumbnail( 'news-latest-thumb', array('class' => 'attachment-full') ); ?>
						<?php endif; ?>
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
		<div class="content">
			<h1 class="centered-text butterfly-white">Partners & Supporters</h1>
			<div id="js-left-arrow" class="arrows arrow-left"></div>
			<div id="js-supporters" class="owl-carousel">
				<?php $themeURI = get_stylesheet_directory_uri(); ?>
				<div class="supporter-contain"><div class="supporter" style="background-image: url(<?php echo $themeURI;?>/img/partner-logos/unicef.jpg)"></div></div>
				<div class="supporter-contain"><div class="supporter" style="background-image: url(<?php echo $themeURI;?>/img/partner-logos/loreal.jpg)"></div></div>
				<div class="supporter-contain"><div class="supporter" style="background-image: url(<?php echo $themeURI;?>/img/partner-logos/CMI.jpg)"></div></div>
				<div class="supporter-contain"><div class="supporter" style="background-image: url(<?php echo $themeURI;?>/img/partner-logos/miami-heat.png)"></div></div>
				<div class="supporter-contain"><div class="supporter" style="background-image: url(<?php echo $themeURI;?>/img/partner-logos/autism_speaks.jpg)"></div></div>
				<div class="supporter-contain"><div class="supporter" style="background-image: url(<?php echo $themeURI;?>/img/partner-logos/bloomingdales.jpg)"></div></div>
				<div class="supporter-contain"><div class="supporter" style="background-image: url(<?php echo $themeURI;?>/img/partner-logos/CSI.jpg)"></div></div>
				<div class="supporter-contain"><div class="supporter" style="background-image: url(<?php echo $themeURI;?>/img/partner-logos/KIND.jpg)"></div></div>
				<div class="supporter-contain"><div class="supporter" style="background-image: url(<?php echo $themeURI;?>/img/partner-logos/vitas.jpg)"></div></div>
				<div class="supporter-contain"><div class="supporter" style="background-image: url(<?php echo $themeURI;?>/img/partner-logos/publix.jpg)"></div></div>
				<div class="supporter-contain"><div class="supporter" style="background-image: url(<?php echo $themeURI;?>/img/partner-logos/metrosigns.png)"></div></div>
				<div class="supporter-contain"><div class="supporter" style="background-image: url(<?php echo $themeURI;?>/img/partner-logos/fcasv.png)"></div></div>
				<div class="supporter-contain"><div class="supporter" style="background-image: url(<?php echo $themeURI;?>/img/partner-logos/ashbritt.jpg)"></div></div>
				<div class="supporter-contain"><div class="supporter" style="background-image: url(<?php echo $themeURI;?>/img/partner-logos/acordis.png)"></div></div>
				<div class="supporter-contain"><div class="supporter" style="background-image: url(<?php echo $themeURI;?>/img/partner-logos/tnt.png)"></div></div>
				<div class="supporter-contain"><div class="supporter" style="background-image: url(<?php echo $themeURI;?>/img/partner-logos/autonation.jpg)"></div></div>
				<div class="supporter-contain"><div class="supporter" style="background-image: url(<?php echo $themeURI;?>/img/partner-logos/BACA.jpg)"></div></div>
				<div class="supporter-contain"><div class="supporter" style="background-image: url(<?php echo $themeURI;?>/img/partner-logos/dademedia.png)"></div></div>
				<div class="supporter-contain"><div class="supporter" style="background-image: url(<?php echo $themeURI;?>/img/partner-logos/RAINN.jpg)"></div></div>
				<div class="supporter-contain"><div class="supporter" style="background-image: url(<?php echo $themeURI;?>/img/partner-logos/hilton-hhonors.jpg)"></div></div>
				<div class="supporter-contain"><div class="supporter" style="background-image: url(<?php echo $themeURI;?>/img/partner-logos/FNCAC.jpg)"></div></div>
				<div class="supporter-contain"><div class="supporter" style="background-image: url(<?php echo $themeURI;?>/img/partner-logos/dolphins.png)"></div></div>
				<div class="supporter-contain"><div class="supporter" style="background-image: url(<?php echo $themeURI;?>/img/partner-logos/carnival-foundation.png)"></div></div>
			</div>
			<div id="js-right-arrow" class="arrows arrow-right"></div>
		</div>
	</div>
	
<?php get_footer(); ?>
