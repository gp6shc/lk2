<?php
/**
 * Template Name: Interior: Image + Nav
 *
 * @package laurenskids
 */

get_header(); ?>


<div class="background-image banner" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>);">
	
	<?php if (!is_page(167) ): ?>
	<div class="subnav">
		<div class="container">
			<?php
			if ( is_page( array(75,77,79,81) ) ) { 																// About page children
				$menu = get_term(get_nav_menu_locations()['about'], 'nav_menu');				
				wp_nav_menu( array( 'theme_location' => 'about', 'menu_class' => 'size-'.$menu->count, ) );
				
			}elseif ( is_page( array(161,163,203) ) ) { 															// Education page children
				$menu = get_term(get_nav_menu_locations()['education'], 'nav_menu');				
				wp_nav_menu( array( 'theme_location' => 'education', 'menu_class' => 'size-'.$menu->count, ) );
			
			}elseif ( is_page( array(148,150,152,154, 176,178,180,182) ) ) { 									// Awareness page children and grandchildren
				$menu = get_term(get_nav_menu_locations()['awareness'], 'nav_menu');				
				wp_nav_menu( array( 'theme_location' => 'awareness', 'menu_class' => 'size-'.$menu->count, ) );
				
			}?>
		</div>
	</div>
	<?php endif; ?>
</div><!-- .background-image -->
	
	<div class="container interior">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
	
				<?php while ( have_posts() ) : the_post(); ?>
					
					<aside class="page-testimonial">
						<div class="grandchildren-links">
						<?php 
							$children = get_pages('child_of='.$post->ID);
							if( count( $children ) != 0 ) {									// checks if the current page has any children
								wp_list_pages("title_li=&child_of=".$post->ID);				// if so, list them out in the sidebar
							}elseif (count(get_post_ancestors($post->ID)) >= 2 ) {			// if not, check if the page is a grandchild
								wp_list_pages("title_li=&child_of=".$post->post_parent);	// and if so, list out the sibilings to current page 
							}
						?>
						</div>
						<?php dynamic_sidebar('testimonial'); ?>
					</aside> 
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('interior-page-content'); ?>>
					    <header class="entry-header">
					    	<h2 class="butterfly"><?php the_title() ?></h2>
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
