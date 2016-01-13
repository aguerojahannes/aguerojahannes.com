<?php
/**
 * The template used for displaying services section
 *
 * @package Wall Street
 */
?>
<?php
global $theme_options;
if ( isset ( $theme_options['blog_cat'] ) && ! empty ( $theme_options['blog_cat'] ) ) {
	$cat = get_category_by_slug( $theme_options['blog_cat'] );
	$category_id = $cat->term_id;
}

if ( isset ( $category_id ) ) : ?>
	<?php
	$args = array(
		'posts_per_page' => 1,
		'category' => $category_id
		);
	$section_posts = get_posts( $args );
	
	?>
	<section id="blog-section" class="homepage-section">
		<h2 class="section-title">
			<span class="section-title-top">
				<?php
				// Show an optional term description.
				$term_description = term_description( $category_id, 'category' );
				if ( ! empty( $term_description ) ) {
					echo $term_description;
				} else { ?>
					<p class="section-count"><?php _e('N 005', 'wall street'); ?></p>
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

					<?php	if ( has_post_thumbnail() ) : ?>
						<div class="entry-image">
							<?php the_post_thumbnail( wallstreet_image_orientation() ); ?>
							<a href="<?php the_permalink(); ?>" rel="bookmark">
								<span class="hover-overlay"></span>
							</a>
						</div>
					<?php endif; ?>
					<div class="entry-content">
						<h3 class="entry-title">
							<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'wall street' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
								<?php the_title(); ?>
							</a>
						</h3>
						<div class="entry-meta">
							<?php wallstreet_posted_on(); ?>
						</div><!-- .entry-meta -->
						<?php the_excerpt(); ?>
					</div>
					
					<footer class="entry-meta">
						<?php
							/* translators: used between list items, there is a space after the comma */
							$category_list = get_the_category_list( __( ', ', 'wall street' ) );

							/* translators: used between list items, there is a space after the comma */
							$tag_list = get_the_tag_list( '', __( ', ', 'wall street' ) );

							if ( ! wallstreet_categorized_blog() ) {
								// This blog only has 1 category so we just need to worry about tags in the meta text
								if ( '' != $tag_list ) {
									$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'wall street' );
								} else {
									$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'wall street' );
								}

							} else {
								// But this blog has loads of categories so we should probably display them here
								if ( '' != $tag_list ) {
									$meta_text = __( 'Categories: %1$s Tags: %2$s', 'wall street' );
								} else {
									$meta_text = __( 'Categories: %1$s', 'wall street' );
								}

							} // end check for categories on this blog

							printf(
								$meta_text,
								$category_list,
								$tag_list
							);
						?>
					</footer><!-- .entry-meta -->

				</article><!-- #post-## -->
			<?php endforeach; ?>
		</div>
	</section>
<?php endif; ?>