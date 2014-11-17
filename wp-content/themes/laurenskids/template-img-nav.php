<?php
/**
 * Template Name: Full Image + Nav
 *
 * @package laurenskids
 */

get_header(); ?>


<div class="background-image" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>);">
	<div class="subnav">
		<div class="container">
			<?php
			if( is_page(8) ) { 
				wp_nav_menu( array( 'theme_location' => 'about' ) );
				
			}elseif ( is_page(10) ) { 
				wp_nav_menu( array( 'theme_location' => 'awareness' ) );
				
			}elseif ( is_page(12) ) {
				wp_nav_menu( array( 'theme_location' => 'education' ) );
				
			}elseif ( is_page(14) ) {
				wp_nav_menu( array( 'theme_location' => 'advocacy' ) );
				
			}?>
		</div>
	</div>
	
	<div class="container translucent">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
	
				<?php while ( have_posts() ) : the_post(); ?>
	
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					    <header class="entry-header">
					    	<h2 class="centered-text butterfly"><?php the_title() ?></h2>
					    </header><!-- .entry-header -->
					
					    <div class="entry-content centered-text">
					    	<?php the_content(); ?>
					    </div><!-- .entry-content -->
					    
					
					    <footer class="entry-footer">
					    	<?php edit_post_link( __( 'Edit', 'laurenskids' ), '<span class="edit-link">', '</span>' ); ?>
					    </footer><!-- .entry-footer -->
					</article><!-- #post-## -->
	
				<?php endwhile; // end of the loop. ?>
	
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .container -->
</div><!-- .background-image -->	
	
<?php get_footer(); ?>
