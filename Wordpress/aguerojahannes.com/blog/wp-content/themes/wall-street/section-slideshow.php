<?php
/**
 * The template used for displaying slideshow
 *
 * @package Wall Street
 */
?>
<?php
// Get Slides
global $gpp, $post;
$slides = $gpp['slide_show'];
$images = explode( ',', $slides );
?>
<?php
//	Homepage Slideshow
if ( '' <> $gpp['slide_show'] && isset($gpp['slideshow_enabled']) && $gpp['slideshow_enabled'] == 'yes' || '' <> $gpp['slide_show'] && isset( $gpp['slideshow_enabled'])  && $gpp['slideshow_enabled'] == 'yes' ) { ?>

<div id="home-slider-wrap">
	<div id="home-slider">
		<div class="flexslider home-slider">
	        <ul class="slides">

				<?php
				foreach( $images as $id ) {

					$attachment_caption = get_post_field('post_excerpt', $id);
					$attachment_title = get_post_field('post_title', $id);
					$attachment_button = get_post_meta( $id, '_gpp_slider_button_title', true );
					$attachment_url = get_post_meta( $id, '_gpp_custom_url', true );
					?>
					<li>
						<div class="slide <?php if ( empty( $attachment_title ) ) echo "slide-no-title" ?>">
							<?php echo wp_get_attachment_image( $id, "slide", 0 ); ?>

							<?php if ( ! empty ( $attachment_title ) || ! empty ( $attachment_caption ) ) { ?>
								<div class="flex-caption">
									<?php if ( ! empty ( $attachment_title ) ) { ?>
										<h2 class="home-slide-title">
											<?php echo $attachment_title; ?>
										</h2>
									<?php } ?>

									<?php if ( ! empty ( $attachment_caption ) ) {
										echo '<p class="slider-caption">' . $attachment_caption . '</p>'; } ?>

									<?php if ( ! empty ( $attachment_button ) ) { ?>
										<h3 class="slide-button"><a href="<?php echo $attachment_url; ?>"><?php echo $attachment_button; ?></a></h3>
									<?php } ?>
								</div>
								<?php } ?>
						</div>
					</li>
				<?php } ?>
			</ul> <!-- .slides -->
		</div> <!-- .flexslider -->
	</div> <!-- #home-slider -->
</div>
<?php } ?>