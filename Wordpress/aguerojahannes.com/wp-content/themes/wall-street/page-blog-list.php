<?php
/*
Template Name: Blog list
*/
get_header(); ?>

<?php
global $theme_options, $paged, $more;
$cat = get_category_by_slug( $theme_options['blog_cat'] );
$category_id = $cat->term_id;

$more = 0;
if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
	$paged = get_query_var('page');
} else {
	$paged = 1;
}
	$args = array(
	'paged' => $paged,
	'cat' => $category_id
	);

$temp = $wp_query;
$wp_query = null;

$wp_query = new WP_Query();
$wp_query->query( $args );

?>
<section id="primary" class="content-area blog-page blog-page-list">
	<main id="main" class="site-main grid-3" role="main">
		<header class="page-header">
			<h1 class="page-title">
				<?php
				// Show an optional term description.
				if ( ! empty( $cat->description ) ) :
					printf( '<span class="section-title-top"><p>%s</p></span>', $cat->description );
				endif;
				?>
				<span class="section-title-name">
					<?php the_title(); ?>
				</span>
			</h1>
		</header><!-- .page-header -->
		<?php if ( have_posts() ) : ?>

			<?php while ( $wp_query -> have_posts() ) : $wp_query -> the_post(); ?>

                <?php $do_not_duplicate = $post -> ID; ?>
				<?php $post_format = get_post_format( $post->ID ); ?>
				<?php if ( empty ( $post_format ) ) $post_format = 'standard'; ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="entry-image">
							<span class="genericon genericon-<?php echo $post_format; ?> post-format-icon"></span>
							<?php the_post_thumbnail( wallstreet_image_orientation() ); ?>
							<a href="<?php the_permalink(); ?>" rel="bookmark">
								<span class="hover-overlay"></span>
							</a>
						</div>
					<?php endif; ?>



						<div class="entry-content">
							<header class="entry-header">
								<h1 class="entry-title">
									<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
								</h1>
								<div class="entry-meta">
									<?php wallstreet_posted_on(); ?>
								</div><!-- .entry-meta -->
							</header><!-- .entry-header -->
							<?php the_excerpt(); ?>
						<footer class="entry-meta">
								<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
									<?php
										/* translators: used between list items, there is a space after the comma */
										$categories_list = get_the_category_list( __( ', ', 'wall street' ) );
										if ( $categories_list && wallstreet_categorized_blog() ) :
									?>
									<span class="cat-links">
										<?php printf( __( 'Posted in %1$s', 'wall street' ), $categories_list ); ?>
									</span>
									<?php endif; // End if categories ?>

									<?php
										/* translators: used between list items, there is a space after the comma */
										$tags_list = get_the_tag_list( '', __( ', ', 'wall street' ) );
										if ( $tags_list ) :
									?>
									<span class="tags-links">
										<?php printf( __( 'Tagged %1$s', 'wall street' ), $tags_list ); ?>
									</span>
									<?php endif; // End if $tags_list ?>
								<?php endif; // End if 'post' == get_post_type() ?>

								<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
								<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'wall street' ), __( '1 Comment', 'wall street' ), __( '% Comments', 'wall street' ) ); ?></span>
								<?php endif; ?>

								<?php edit_post_link( __( 'Edit', 'wall street' ), '<span class="edit-link">', '</span>' ); ?>
						</footer><!-- .entry-meta -->
					</div>
					
				</article><!-- #post-## -->

			<?php endwhile; wallstreet_paging_nav(); wp_reset_query(); $wp_query = $temp; ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</main><!-- #main -->
</section><!-- #primary -->

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<?php get_sidebar(); ?>
<?php endif; ?>
<?php get_footer(); ?>
