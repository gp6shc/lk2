<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package laurenskids
 */
?>
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="content">
	
		<?php
			/*
			 * Footer widgets area is triggered, only if the widgets are active
			 *
			 * If they are not active, then let's bail.
			 */
			if (   ! is_active_sidebar( 'footer-1'  )
				&& ! is_active_sidebar( 'footer-2' )
				&& ! is_active_sidebar( 'footer-3'  )
			)
				return;
			// If we get this far, we have widgets. Lets do this.
		?>
		<div id="footer-widgets" class="<?php lk_footer_widget_count(); ?>">
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
			<div id="footer-widget-1" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div><!-- #first .widget-area -->
			<?php endif; ?>
		
			<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
			<div id="footer-widget-2" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'footer-2' ); ?>
			</div><!-- #second .widget-area -->
			<?php endif; ?>
		
			<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
			<div id="footer-widget-3" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'footer-3' ); ?>
			</div><!-- #third .widget-area -->
			<?php endif; ?>
		</div><!-- #supplementary -->
		

	</div><!-- /.content -->
</footer><!-- /#colophon -->
</div><!-- /#page -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script async type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/js/min/events.min.js"></script>
<?php if (is_front_page() || is_page(150) ): ?>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/js/min/owl.carousel.min.js"></script>
	<script>
		jQuery(document).ready(function($) {
			var owl = $('#js-supporters');
			
			owl.owlCarousel({
				items: 4,
				itemsDesktop: [1040,4],
				itemsDesktopSmall: [1000, 3],
				itemsTablet: [768,2],
				itemsMobile: [480,1],
				slideSpeed: 300,
				autoPlay: 6000,
				scrollPerPage: true,
				responsiveRefreshRate: 4000,
				mouseDrag: false
			});
		
			$('#js-left-arrow').click(function() {
				owl.trigger("owl.prev");
			});
			
			$('#js-right-arrow').click(function() {
				owl.trigger("owl.next");
			});
		});
	</script>
<?php elseif (is_page( array(16, 152) )): // if on the Whats New or Survivor stories pages: ?> 
	<script async type="text/javascript" src="<?php echo plugins_url('ultimate-wp-query-search-filter/classes/scripts/uwpqsfscript.min.js')?>"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/js/min/masonry.pkgd.min.js"></script>
<?php elseif (is_page( array(18, 451) )): // if on the Contact or License Form pages: ?> 
	<script async type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/js/min/parsley.min.js"></script>
<?php endif; ?>
<?php wp_footer(); ?>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/js/min/fastclick.min.js"></script>
<?php if (!is_page(16)): ?>	
	<script> window.addEventListener('load', function() {
				FastClick.attach(document.body);
			}, false);
	</script>
<?php endif;
	wp_footer(); ?>

</body>
</html>
