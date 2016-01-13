<?php

/**
 * Wall Street helper functions and definitions
 *
 * @package Wall Street
 * @since Wall Street 1.0
 */

/**
 * Filters the body_class and adds the css class
 */
function wallstreet_browser_class( $classes ) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone, $gpp;
	// Browser detection
	if($is_lynx) $classes[] = 'browser-lynx';
	elseif($is_gecko) $classes[] = 'browser-gecko';
	elseif($is_opera) $classes[] = 'browser-opera';
	elseif($is_NS4) $classes[] = 'browser-ns4';
	elseif($is_safari) $classes[] = 'browser-safari';
	elseif($is_chrome) $classes[] = 'browser-chrome';
	elseif($is_IE) $classes[] = 'browser-ie';
	elseif($is_iphone) $classes[] = 'browser-iphone';
	else $classes[] = '';
	// Check for non-multisite installs
	if ( ! is_multi_author() ) $classes[] = 'single-author';
	// Do we have a header image?
	$header_image = get_header_image();
    if ( $header_image ) $classes[] = 'has-header-image';
	if ( is_home() && '' <> $gpp['slide_show'] && isset( $gpp['slideshow_enabled'] ) && $gpp['slideshow_enabled'] == 'yes' ) $classes[] = 'has-home-slideshow';
    // Is the sidebar enabled?
    if ( is_active_sidebar( 'sidebar-1' ) && !is_page_template( 'page-full.php' ) )
    	$classes[] = 'has-sidebar';
    else
    	$classes[] = 'no-sidebar';

	return $classes;
}
// Filter body_class with the function above
add_filter( 'body_class','wallstreet_browser_class' );


/**
 * Count the number of footer widgets to enable dynamic classes for the footer
 */
function wallstreet_footer_widget_class() {
    $count = 0;

    if ( is_active_sidebar( 'footer-widget-1' ) )
        $count++;

    if ( is_active_sidebar( 'footer-widget-2' ) )
        $count++;

    if ( is_active_sidebar( 'footer-widget-3' ) )
        $count++;

    $class = '';

    switch ( $count ) {
        case '1':
            $class = 'one';
            break;
        case '2':
            $class = 'two';
            break;
        case '3':
            $class = 'three';
            break;
    }

    if ( $class )
        echo 'class="' . $class . '"';
}

/**
 * Get theme version number from WP_Theme object (cached)
 *
 * @since Wall Street 1.0
*/
function wallstreet_get_theme_version() {
	$wallstreet_theme_file = get_template_directory() . '/style.css';
	$wallstreet_theme = new WP_Theme( basename( dirname( $wallstreet_theme_file ) ), dirname( dirname( $wallstreet_theme_file ) ) );
	return $wallstreet_theme->get( 'Version' );
}

function wallstreet_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'wallstreet_excerpt_more' );

function wallstreet_the_post_thumbnail_caption() {
	global $post;
	
	$thumbnail_caption = get_post(get_post_thumbnail_id())->post_excerpt;
	
	if ( ! empty ( $thumbnail_caption ) ) {
		echo '<span class="featured-image-caption">'.$thumbnail_caption.'</span>';
	}
}

remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'wallstreet_gallery_shortcode');

//replace default gallery shortcode by image slider if not blog category
function wallstreet_gallery_shortcode($attr) {

    $post = get_post();

    static $instance = 0;
    $instance++;

    if ( ! empty( $attr['ids'] ) ) {
        // 'ids' is explicitly ordered, unless you specify otherwise.
        if ( empty( $attr['orderby'] ) )
            $attr['orderby'] = 'post__in';
        $attr['include'] = $attr['ids'];
    }

    // Allow plugins/themes to override the default gallery template.
    $output = apply_filters('post_gallery', '', $attr);
    if ( $output != '' )
        return $output;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'columns'    => 3,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

	$selector = "gallery-{$instance}";

    $swshortcode = '<div class="flexslider" id="'.$selector.'"><ul class="slides">';
			   $counter = 0;
               foreach ( $attachments as $attachment ) :
                    $_post = get_post( $attachment );
                    $url = wp_get_attachment_url($_post->ID);
                    $post_title = esc_attr($_post->post_title);
                    $large_image = wp_get_attachment_image($_post->ID, 'large');
                    $caption = get_post_field('post_excerpt', $_post->ID);

                $swshortcode .= '<li><span class="flex-full-screen"></span>' . $large_image;
                if ($caption) {
                    $swshortcode .= '<p class="flex-caption">' . $caption . '</p>';
                }
                $swshortcode .= '</li>';
			$counter++;
            endforeach;

    $swshortcode .= '</ul>';
	$swshortcode .= "<ul class='flexslider-grid grid-3'>";
	$counter = 0;
    foreach ( $attachments as $attachment ) {
		$_post = get_post( $attachment );
		$url = wp_get_attachment_url($_post->ID);
		$large_image = wp_get_attachment_image($_post->ID, 'large');
		$swshortcode .= "<li class='portfolio col' id='".$selector."-".$counter."'>" . wp_get_attachment_image( $_post->ID, 'thumbnail' ) . "</li>";
	$counter++;
    } 
	$swshortcode .= "</ul>";
	$swshortcode .= '</div>';

    return $swshortcode;

}


/**
 * Check theme options for thumbnail orientation
 *
 * @since 1.0
 */
function wallstreet_image_orientation() {

    if ( get_option( gpp_get_current_theme_id() . '_options' ) ) {

        $options = get_option( gpp_get_current_theme_id() . '_options' );

        if ( ! empty( $options['wallstreet_orientation'] ) && $options[ 'wallstreet_orientation' ] == 'vertical' )
            return 'vertical';
        elseif ( ! empty( $options['wallstreet_orientation'] ) && $options[ 'wallstreet_orientation' ] == 'horizontal' )
            return 'horizontal';
        else
            return 'square';

    } else {

        return 'vertical';

    }

}

/**
* Add custom button title field to media uploader 
*/

add_filter( "attachment_fields_to_edit", "wallstreet_slide_button_attachment_fields_to_edit", null, 2 ); 
function wallstreet_slide_button_attachment_fields_to_edit( $form_fields, $post ) {	
	$form_fields["gpp_slider_button_title"]["label"] = __( "Button Title", "wallstreet" );
	$form_fields["gpp_slider_button_title"]["input"] = "text";
	$form_fields["gpp_slider_button_title"]["value"] = get_post_meta( $post->ID, "_gpp_slider_button_title", true );
	$form_fields["gpp_slider_button_title"]["helps"] = "Slideshow button title"; 
	return $form_fields;
}
add_filter("attachment_fields_to_save", "wallstreet_slide_button_image_attachment_fields_to_save", null, 2);
function wallstreet_slide_button_image_attachment_fields_to_save( $post, $attachment ) {	
	if( isset( $attachment['gpp_slider_button_title'] ) ) {		
		update_post_meta( $post['ID'], '_gpp_slider_button_title', $attachment['gpp_slider_button_title'] );
	}
	return $post;
}


function wallstreet_get_category_type() {

global $theme_options;

//Get current category id
$current_cat_id = get_query_var('cat');
$portfolio_cat = get_category_by_slug( $theme_options['portfolio_cat'] );
$portfolio_cat_id = $portfolio_cat->term_id;

$category_type = '';

// Check if current category is blog or portfolio
if ( isset ( $portfolio_cat_id ) && $current_cat_id == $portfolio_cat_id )
	$category_type = 'portfolio-category';

$blog_cat = get_category_by_slug( $theme_options['blog_cat'] );
$blog_cat_id = $blog_cat->term_id;

if ( isset ( $blog_cat_id ) && $current_cat_id == $blog_cat_id )
	$category_type = 'blog-category';
	
return $category_type;
}
?>