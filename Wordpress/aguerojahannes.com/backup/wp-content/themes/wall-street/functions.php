<?php
/**
 * wallstreet functions and definitions
 *
 * @package Wall Street
 */

/* Theme Options */
if ( file_exists( get_template_directory() . '/options/options.php' ) )
	require( get_template_directory() . '/options/options.php' );
if ( file_exists( get_template_directory() . '/theme-options.php' ) )
	require( get_template_directory() . '/theme-options.php' );

// Get Theme Options
$gpp = get_option( gpp_get_current_theme_id() . '_options' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1280; /* pixels */
}

if ( ! function_exists( 'wallstreet_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wallstreet_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wallstreet, use a find and replace
	 * to change 'wall street' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wall street', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	
	// updating thumbnail and image sizes
	update_option( 'thumbnail_size_w', 110, true );
	update_option( 'thumbnail_size_h', 110, true );
	update_option( 'medium_size_w', 600, true );
	update_option( 'medium_size_h', '', true );
	update_option( 'large_size_w', 1280, true );
	update_option( 'large_size_h', '', true );

	add_image_size( 'horizontal', 420, 280, true ); // horizontal images
	add_image_size( 'vertical', 420, 540, true ); // horizontal images
	add_image_size( 'square', 420, 420, true ); // square images

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'wall street' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'image', 'gallery', 'video', 'quote' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wallstreet_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // wallstreet_setup
add_action( 'after_setup_theme', 'wallstreet_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function wallstreet_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'wall street' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Above Footer', 'wall street' ),
		'id'            => 'homepage',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	$widgets = array( '1', '2', '3' );
	foreach ( $widgets as $i ) {
		register_sidebar(array(
			'name' => 'Footer Widget '.$i,
			'id' => 'footer-widget-'.$i,
			'before_widget' => '<aside class="widget">',
			'after_widget' => '</aside>',
			'before_title' => '<span class="widget-title-container"><h3 class="widget-title">',
			'after_title' => '</h3></span>'
		) );
	} // end foreach
}
add_action( 'widgets_init', 'wallstreet_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wallstreet_scripts() {
	
	global $gpp;

    wp_enqueue_style( 'style', get_stylesheet_uri(), '', wallstreet_get_theme_version() );
	
	wp_enqueue_style( 'genericons-css', get_template_directory_uri() . '/css/genericons.css', array( 'style' ), wallstreet_get_theme_version() );

	wp_enqueue_style( 'flexslider-style', get_template_directory_uri() . '/js/flexslider/flexslider.css', array( 'style' ), wallstreet_get_theme_version() );

	wp_enqueue_style( 'mscrollbar-style', get_template_directory_uri() . '/js/mCustomScrollbar/jquery.mCustomScrollbar.css', array( 'style' ), wallstreet_get_theme_version() );

	wp_enqueue_script( 'wallstreet-navigation', get_template_directory_uri() . '/js/navigation.js', array(), wallstreet_get_theme_version(), true );

	wp_enqueue_script( 'wallstreet-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), wallstreet_get_theme_version(), true );
	
		wp_enqueue_script( 'fullscreen-api', get_template_directory_uri() . '/js/fullscreenapi.js', array(), wallstreet_get_theme_version(), true );

	wp_enqueue_script( 'wallstreet-flexslider', get_template_directory_uri() . '/js/flexslider/jquery.flexslider-min.js', array( 'jquery' ), wallstreet_get_theme_version() );

	wp_enqueue_script( 'wallstreet-mscrollbar', get_template_directory_uri() . '/js/mCustomScrollbar/jquery.mCustomScrollbar.min.js', array( 'jquery' ), wallstreet_get_theme_version() );
	
	wp_enqueue_script( 'wallstreet-waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array( 'jquery' ), wallstreet_get_theme_version() );
	
	wp_enqueue_script( 'wallstreet-waypoints-sticky', get_template_directory_uri() . '/js/waypoints-sticky.min.js', array( 'jquery' ), wallstreet_get_theme_version() );
	
	wp_enqueue_script( 'wallstreet-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), wallstreet_get_theme_version() );
	
	if ( ! is_home() ) {
		wp_enqueue_script( 'wallstreet-flexslider-custom', get_template_directory_uri() . '/js/flexslider-custom.js', array( 'jquery' ), wallstreet_get_theme_version() );
	}

	if ( '' <> $gpp['slide_show'] && isset( $gpp['slideshow_enabled'] ) && $gpp['slideshow_enabled'] == 'yes' ) {
		wp_enqueue_script( 'home-slideshow', get_template_directory_uri() . '/js/home-slideshow.js', array( 'jquery' ), wallstreet_get_theme_version() );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wallstreet_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Helper functions
 */
require get_template_directory() . '/inc/helper-functions.php';

/**
 * Register Widgets
 */
require get_template_directory() . '/inc/widgets/widget-action.php'; // call to action widget