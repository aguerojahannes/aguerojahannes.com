<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Wall Street
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php foreach ( explode( ",", $theme_options['section_order'] ) as $order ) { ?>
				<?php
				if( 1 == $order ) {
					// Work Section
					get_template_part('section','work');
				}
				?>

				<?php
				if( 2 == $order ) {
					// Services Section
					get_template_part('section','services');
				}
				?>

				<?php
				if( 3 == $order ) {
					// Clients Section
					get_template_part('section','clients');
				}
				?>

				<?php
				if( 4 == $order ) {
					// Testimonials Section
					get_template_part('section','testimonials');
				}
				?>
				
				<?php
				if( 5 == $order ) {
					// Blog Section
					get_template_part('section','blog');
				}
				?>

			<?php } ?> <!-- End of foreach -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>