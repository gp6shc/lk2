<?php
/**
 * Template Name: Interior: Image + Nav
 *
 * @package laurenskids
 */

get_header(); ?>


<div class="background-image banner" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>);">
	<div class="subnav">
		<div class="container">
			<?php
			if ( is_page( array(75,77,79,81) ) ) { 																	// About page children
				$menu = get_term(get_nav_menu_locations()['about'], 'nav_menu');				
				wp_nav_menu( array( 'theme_location' => 'about', 'menu_class' => 'size-'.$menu->count, ) );
				
			}elseif ( is_page( array(161,163,203) ) ) { 															// Education page children
				$menu = get_term(get_nav_menu_locations()['education'], 'nav_menu');				
				wp_nav_menu( array( 'theme_location' => 'education', 'menu_class' => 'size-'.$menu->count, ) );
			
			}elseif ( is_tree(10) || is_tree(150) ) { 																// Awareness page and offspring; Walk page and its offspring
				$menu = get_term(get_nav_menu_locations()['awareness'], 'nav_menu');				
				wp_nav_menu( array( 'theme_location' => 'awareness', 'menu_class' => 'size-'.$menu->count, ) );
				
			}?>
		</div>
	</div>
</div><!-- .background-image -->
	
	<div class="container interior">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
	
				<?php while ( have_posts() ) : the_post(); ?>
					
					<aside class="page-testimonial">
						<?php dynamic_sidebar('testimonial'); ?>
					</aside>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('interior-page-content'); ?>>
					    <header class="entry-header">
					    	<?php if (!is_page(182)) {?><h2 class="butterfly"><?php the_title() ?></h2><?php }//hide on Campaigns & Clips page?> 
					    </header><!-- .entry-header -->
					
					    <div class="entry-content">
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
	
<?php get_footer(); ?>
