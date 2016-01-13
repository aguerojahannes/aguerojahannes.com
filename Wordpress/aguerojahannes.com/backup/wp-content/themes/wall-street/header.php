<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Wall Street
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php 
global $theme_options;
$theme_options = get_option( gpp_get_current_theme_id() . '_options' );
$header_image = get_header_image();
?>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php if ( isset( $theme_options['wallstreet_custom_favicon'] ) && '' != $theme_options['wallstreet_custom_favicon'] ) : ?>
	<link rel="shortcut icon" href="<?php echo esc_url( $theme_options['wallstreet_custom_favicon'] ); ?>" />
<?php endif; ?>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="preloader">
		<div id="spinner"></div>
	</div>
	<?php if ( ! empty( $header_image ) ) { ?>
		<div id="custom-header-image">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" id="site-header">
				<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
			</a>
		</div>
	<?php } ?>
	<div id="masthead-wrap" >
		<?php
		// Slideshow
		if ( is_home() || is_front_page() ) {
			get_template_part('section','slideshow');
		}
		?>
	</div><!-- #masthead-wrap -->
	<div id="menu-wrap">
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php if ( ! empty( $theme_options['wallstreet_logo'] ) ) : ?>
							<img class="sitetitle" src="<?php echo esc_url( $theme_options['wallstreet_logo'] ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
						<?php else : ?>
							<?php bloginfo( 'name' ); ?>
						<?php endif; ?>
					</a>
				</h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<h1 class="menu-toggle"><?php _e( 'Menu', 'wall street' ); ?></h1>
				<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'wall street' ); ?></a>

				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->
	</div><!-- #menu-wrap -->
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<div id="content" class="site-content">