<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Wall Street
 */
?>

	</div><!-- #content -->
</div><!-- #page -->
<?php if ( is_active_sidebar( 'homepage' ) ) : ?>
	<section id="homewidgets" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'homepage' ); ?>
	</section><!-- #homewidgets .widget-area -->
<?php endif; ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php if ( is_active_sidebar( 'footer-widget-1' ) || is_active_sidebar( 'footer-widget-2' ) || is_active_sidebar( 'footer-widget-3' ) ) : ?>

			<div id="footer-widgets" <?php wallstreet_footer_widget_class(); ?>>

			<?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
				<div id="widget-1" class="widget">
					<?php dynamic_sidebar( 'footer-widget-1' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
				<div id="widget-2" class="widget">
					<?php dynamic_sidebar( 'footer-widget-2' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
				<div id="widget-3" class="widget">
					<?php dynamic_sidebar( 'footer-widget-3' ); ?>
				</div>
			<?php endif; ?>

			</div><!-- end #footer-widgets -->

		<?php endif; // end check if any footer widgets are active ?>
		<div class="site-info">
			<?php do_action( 'wallstreet_credits' ); ?>
			<?php _e( 'Proudly powered by', 'wall street' ); ?> <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'wall street' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'wall street' ); ?>" ><?php printf( __( '%s', 'wall street' ), 'WordPress' ); ?></a>.
			<?php printf( __( '%1$s by %2$s.', 'wall street' ), '<a href="http://graphpaperpress.com/themes/wallstreet/">Wall Street Business Theme</a>', '<a href="http://graphpaperpress.com">Graph Paper Press</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>