<?php
/**
 * The template used for displaying services section
 *
 * @package Wall Street
 */
?>
<?php
global $theme_options;
if ( isset ( $theme_options['testimonials_cat'] ) && ! empty ( $theme_options['testimonials_cat'] ) ) {
	$cat = get_category_by_slug( $theme_options['testimonials_cat'] );
	$category_id = $cat->term_id;
}

if ( isset ( $category_id ) ) : ?>
	<?php
	$args = array(
		'posts_per_page' => 2,
		'category' => $category_id
		);
	$section_posts = get_posts( $args );
	
	?>
	<section id="testimonials-section" class="homepage-section">
		<h2 class="section-title">
			<span class="section-title-top">
				<?php
				// Show an optional term description.
				$term_description = term_description( $category_id, 'category' );
				if ( ! empty( $term_description ) ) {
					echo $term_description;
				} else { ?>
					<class="section-count"><?php _e('N 004', 'wall street'); ?></p>
				<?php }
			?>
			</span>
			<span class="section-title-name">
				<a href="<?php echo get_category_link( $category_id ); ?>">
					<?php echo $cat->name; ?>
				</a>
			</span>
		</h2>
		<div class="wrapper">
			<?php foreach ( $section_posts as $post ) : setup_postdata( $post ); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php  if ( has_post_thumbnail() ) : ?>
						<div class="entry-image">
							<?php the_post_thumbnail(); ?>
						</div>
					<?php endif; ?>
					<div class="post-meta">
						<div class="testimonial-text">
						<span class="testimonial-bubble"></span>
						<span class="testimonial-small-bubble"></span>
						<?php the_excerpt(); ?>
							<h3 class="entry-title">&#8211; 
								<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'wall street' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
									<?php the_title(); ?>
								</a>
							</h3>
						</div>
					</div>
				</article><!-- #post-## -->
			<?php endforeach; ?>
		</div>
	</section>
<?php endif; ?>