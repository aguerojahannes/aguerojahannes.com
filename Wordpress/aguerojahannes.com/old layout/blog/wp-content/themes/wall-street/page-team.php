<?php
/*
Template Name: Team page
*/
get_header(); ?>
<?php
global $theme_options;
$cat = get_category_by_slug( $theme_options['team_cat'] );
$category_id = $cat->term_id;
?>
<section id="primary" class="content-area team-page">
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
		<?php
		if ( $category_id  ) : ?>
			<?php
			$args = array(
				'category' => $category_id,
				'post_status' => 'publish',
				'posts_per_page' => -1
				);
			$posts = get_posts( $args );

			?>
			<?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="entry-image">
							<span class="genericon genericon-image post-format-icon"></span>
							<?php the_post_thumbnail( wallstreet_image_orientation() ); ?>
							<a href="<?php the_permalink(); ?>" rel="bookmark">
								<span class="hover-overlay"></span>
							</a>
						</div>
					<?php endif; ?>
					<header class="entry-header">
						<h1 class="entry-title">
								<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
						</h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_excerpt(); ?>
					</div><!-- .entry-content -->

				</article><!-- #post-## -->

			<?php endforeach; ?>
		<?php endif; ?>

	</main><!-- #main -->
</section><!-- #primary -->

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<?php get_sidebar(); ?>
<?php endif; ?>
<?php get_footer(); ?>
