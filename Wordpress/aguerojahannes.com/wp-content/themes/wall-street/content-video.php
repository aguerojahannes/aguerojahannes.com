<?php
/**
 * @package Wall Street
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_archive()) {
			if ( has_post_thumbnail() ) : ?>
			<div class="entry-image">
				<span class="genericon genericon-video post-format-icon"></span>
				<?php the_post_thumbnail( wallstreet_image_orientation() ); ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark">
					<span class="hover-overlay"></span>
				</a>
			</div>
		<?php endif;
	} ?>
	<header class="entry-header">
		<h1 class="entry-title">
			<?php if ( is_single()) {
				the_title();
			} else { ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			<?php } ?>
		</h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php wallstreet_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php if ( is_archive()) {
			the_excerpt();
		} else { ?>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wall street' ) ); ?>
		<?php } ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'wall street' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<div class="footer-entry-wrap">
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
		</div>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
