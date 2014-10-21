<?php
/**
 * Template Name: About
 *
 * @package laurenskids
 */

get_header(); ?>

<div class="bracelet">
	<div class="subnav">
		<div class="container">
			<ul>
				<li>
					<a href="#">About Lauren</a>
				</li>
				<li>
					<a href="#">Our Team</a>
				</li>
				<li>
					<a href="#">Speaking Engagements</a>
				</li>
				<li>
					<a href="#">Books</a>
				</li>
			</ul>
		</div>
	</div>
	
	<div class="container translucent">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
	
				<?php while ( have_posts() ) : the_post(); ?>
	
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					    <header class="entry-header">
					    	<?php the_title( '<h2 class="centered-text butterfly">', '</h2>' ); ?>
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
</div><!-- .bracelet -->	
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>
