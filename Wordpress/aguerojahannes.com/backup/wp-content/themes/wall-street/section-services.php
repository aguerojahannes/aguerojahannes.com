<?php
/**
 * The template used for displaying services section
 *
 * @package Wall Street
 */
?>
<?php
global $theme_options;
if ( isset ( $theme_options['services_cat'] ) && ! empty ( $theme_options['services_cat'] ) ) {
	$cat = get_category_by_slug( $theme_options['services_cat'] );
	$category_id = $cat->term_id;
}

if ( isset ( $category_id ) ) : ?>
	<?php
	$args = array(
		'posts_per_page' => 6,
		'category' => $category_id
		);
	$section_posts = get_posts( $args );
	
	?>
	<section id="services-section" class="homepage-section">
		<h2 class="section-title">
			<span class="section-title-top">
				<?php
				// Show an optional term description.
				$term_description = term_description( $category_id, 'category' );
				if ( ! empty( $term_description ) ) {
					echo $term_description;
				} else { ?>
					<p class="section-count"><?php _e('N 002', 'wall street'); ?></p>
				<?php }
			?>
			</span>
			<span class="section-title-name">
				<a href="<?php echo get_category_link( $category_id ); ?>">
					<?php echo $cat->name; ?>
				</a>
			</span>
		</h2>
		<div class="wrapper grid-3">
			<?php foreach ( $section_posts as $post ) : setup_postdata( $post ); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php  if ( has_post_thumbnail() ) : ?>
						<div class="entry-image">
							<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'wall street' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
								<?php the_post_thumbnail( wallstreet_image_orientation() ); ?>
							</a>
						</div>
					<?php endif; ?>
					<div class="post-meta">
						<h3 class="entry-title">
							<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'wall street' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
								<?php the_title(); ?>
							</a>
						</h3>
						<?php the_excerpt(); ?>
					</div>
				</article><!-- #post-## -->
			<?php endforeach; ?>
		</div>
	</section>
<?php endif; ?>