<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package laurenskids
 */
?>

	</div><!-- .container -->

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
			// If we get this far, we have widgets. Let do this.
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

<?php wp_footer(); ?>

</body>
</html>
