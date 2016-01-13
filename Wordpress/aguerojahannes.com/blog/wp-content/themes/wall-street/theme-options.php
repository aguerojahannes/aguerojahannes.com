<?php
/**
 * Define the Tabs appearing on the Theme Options page
 * Tabs contains sections
 * Options are assigned to both Tabs and Sections
 * See README.md for a full list of option types
 */

$general_settings_tab = array(
    "name" => "general_tab",
    "title" => __( "General", "gpp" ),
    "sections" => array(
        "general_section_1" => array(
            "name" => "general_section_1",
            "title" => __( "General", "gpp" ),
            "description" => ""
        )
    )
);

gpp_register_theme_option_tab( $general_settings_tab );

$colors_tab = array(
    "name" => "colors_tab",
    "title" => __( "Colors", "gpp" ),
    "sections" => array(
        "colors_section_1" => array(
            "name" => "colors_section_1",
            "title" => __( "Colors", "gpp" ),
            "description" => ""
        )
    )
);

gpp_register_theme_option_tab( $colors_tab );


$slideshow_tab = array(
    "name" => "slideshow_tab",
    "title" => __( "Slideshow", "gpp" ),
    "sections" => array(
        "slideshow_section_1" => array(
            "name" => "slideshow_section_1",
            "title" => __( "Slideshow", "gpp" ),
            "description" => ""
        )
    )
);

gpp_register_theme_option_tab( $slideshow_tab );

// Default order of the sections in the particular tab
$block_order = explode( ",", '1,2,3,4,5');
$block_array = array(

    1 => array(
        "order" => "1",
        "title" => "Work",
        "icon" => "grid"
        ),
    2 => array(
        "order" => "2",
        "title" => "Services",
        "icon" => "grid"
        ),
    3 => array(
        "order" => "3",
        "title" => "Clients",
        "icon" => "gridh"
        ),
    4 => array(
        "order" => "4",
        "title" => "Testimonials",
        "icon" => "staggered"
        ),
    5 => array(
        "order" => "5",
        "title" => "News",
        "icon" => "text"
        )
);

// Get the order from the database
$theme_options = get_option( gpp_get_current_theme_id() . "_options" );
if ( ! empty( $theme_options['section_order'] ) ) {
    $block_order =  explode( ",", $theme_options['section_order'] );
}

/**
 * Home page tab
 */
$section_array = array(
	"homepage_section_0" => array(
		"name" => "homepage_section_0",
		"title" => __( "Sortable Sections", "gpp" ),
		"description" => ""
		)
		);

// Arrange the sections according to saved order
foreach ( $block_order as $value ) {

    $section_array[ "homepage_section_" . ( $value ) ] = array(
        "name" => "homepage_section_" . ( $block_array[$value]['order'] ),
        "title" => $block_array[$value]['title'],
        "description" => "",
        "icon" => $block_array[$value]['icon']
    );
}

$homepage_tab = array(
    "name" => "homepage_tab",
    "title" => __( "Homepage", "gpp" ),
    "sections" => $section_array
);

gpp_register_theme_option_tab( $homepage_tab );

 /**
 * The following example shows you how to register theme options and assign them to tabs and sections:
*/
$options = array(
    'wallstreet_logo' => array(
        "tab" => "general_tab",
        "name" => "wallstreet_logo",
        "title" => "Logo",
        "description" => __( "Use a transparent png or jpg image", "gpp" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "image",
        "default" => ""
    ),

    'wallstreet_custom_favicon' => array(
        "tab" => "general_tab",
        "name" => "wallstreet_custom_favicon",
        "title" => "Favicon",
        "description" => __( "Use a transparent png or ico image", "gpp" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "image",
        "default" => ""
    ),

    'font' => array(
        "tab" => "general_tab",
        "name" => "font",
        "title" => "Headline Font",
        "description" => __( '<a href="' . get_option('siteurl') . '/wp-admin/admin-ajax.php?action=fonts&font=header&height=600&width=640" class="thickbox">Preview and choose a font</a>', "gpp" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "select",
        "default" => "Abel:400",
        "valid_options" => gpp_font_array()
    ),

    'font_alt' => array(
        "tab" => "general_tab",
        "name" => "font_alt",
        "title" => "Body Font",
        "description" => __( '<a href="' . get_option('siteurl') . '/wp-admin/admin-ajax.php?action=fonts&font=body&height=600&width=640" class="thickbox">Preview and choose a font</a>', "gpp" ),
        "section" => "general_section_1",
        "since" => "1.0",
        "id" => "general_section_1",
        "type" => "select",
        "default" => "Lora:400,700,400italic",
        "valid_options" => gpp_font_array()
    ),
    'color' => array(
        "tab" => "colors_tab",
        "name" => "color",
        "title" => "Color",
        "description" => __( "Select a color palette", "gpp" ),
        "section" => "colors_section_1",
        "since" => "1.0",
        "id" => "colors_section_1",
        "type" => "select",
        "default" => "default",
        "valid_options" => array(
            "default" => array(
                "name" => "default",
                "title" => __( "Blue", "gpp" )
            ),
            "dark" => array(
                "name" => "dark",
                "title" => __( "Dark", "gpp" )
            ),
	        "spring" => array(
	            "name" => "green",
	            "title" => __( "Green", "gpp" )
	        ),
		    "orange" => array(
	            "name" => "orange",
	            "title" => __( "Orange", "gpp" )
	        )
        )
    ),

    "css" => array(
        "tab" => "colors_tab",
        "name" => "css",
        "title" => "Custom CSS",
        "description" => __( "Add some custom CSS to your theme.", "gpp" ),
        "section" => "colors_section_1",
        "since" => "1.0",
        "id" => "colors_section_1",
        "type" => "textarea",
        "sanitize" => "html",
        "default" => ""
    ),

	"portfolio_cat" => array(
	    "tab" => "homepage_tab",
	    "name" => "portfolio_cat",
	    "title" => __( "Portfolio", "gpp" ),
	    "description" => __( "Select portfolio category", "gpp" ),
	    "section" => "homepage_section_1",
	    "since" => "1.0",
	    "id" => "homepage_section_1",
	    "type" => "select",
	    "default" => "",
	    "valid_options" => gpp_get_taxonomy_list( 'category', true )
	),

	'section_order' => array(
		"tab" => "homepage_tab",
		"name" => "section_order",
		"title" => __( "section order setting", "gpp" ),
		"description" => __( 'Stores the order of the sections', "gpp" ),
		"section" => "homepage_section_0",
		"since" => "1.0",
		"id" => "homepage_section_0",
		"type" => "hidden",
		"default" => "1,2,3,4,5",
 		"sanitize" => "html"
	),

	"services_cat" => array(
	    "tab" => "homepage_tab",
	    "name" => "services_cat",
	    "title" => __( "Services", "gpp" ),
	    "description" => __( "Select services category", "gpp" ),
	    "section" => "homepage_section_2",
	    "since" => "1.0",
	    "id" => "homepage_section_2",
	    "type" => "select",
	    "default" => "",
	    "valid_options" => gpp_get_taxonomy_list( 'category', true )
	),
	
	"clients_cat" => array(
	    "tab" => "homepage_tab",
	    "name" => "clients_cat",
	    "title" => __( "Clients", "gpp" ),
	    "description" => __( "Select clients category", "gpp" ),
	    "section" => "homepage_section_3",
	    "since" => "1.0",
	    "id" => "homepage_section_3",
	    "type" => "select",
	    "default" => "",
	    "valid_options" => gpp_get_taxonomy_list( 'category', true )
	),
	
	"testimonials_cat" => array(
	    "tab" => "homepage_tab",
	    "name" => "testimonials_cat",
	    "title" => __( "Testimonials", "gpp" ),
	    "description" => __( "Select testimonials category", "gpp" ),
	    "section" => "homepage_section_4",
	    "since" => "1.0",
	    "id" => "homepage_section_4",
	    "type" => "select",
	    "default" => "",
	    "valid_options" => gpp_get_taxonomy_list( 'category', true )
	),
	
	"blog_cat" => array(
	    "tab" => "homepage_tab",
	    "name" => "blog_cat",
	    "title" => __( "Blog", "gpp" ),
	    "description" => __( "Select blog category", "gpp" ),
	    "section" => "homepage_section_5",
	    "since" => "1.0",
	    "id" => "homepage_section_5",
	    "type" => "select",
	    "default" => "",
	    "valid_options" => gpp_get_taxonomy_list( 'category', true )
	),
	
	"team_cat" => array(
	    "tab" => "general_tab",
	    "name" => "team_cat",
	    "title" => __( "Team", "gpp" ),
	    "description" => __( "Select team category", "gpp" ),
	    "section" => "general_section_1",
	    "since" => "1.0",
	    "id" => "general_section_1",
	    "type" => "select",
	    "default" => "",
	    "valid_options" => gpp_get_taxonomy_list( 'category', true )
	),

	"wallstreet_orientation" => array(
	    "tab" => "general_tab",
	    "name" => "wallstreet_orientation",
	    "title" => "Thumbnail Orientation",
	    "description" => __( "Select an image orientation layout.", "gpp" ),
	    "section" => "general_section_1",
	    "since" => "1.0",
	    "id" => "general_section_1",
	    "type" => "select",
	    "default" => "1",
		"valid_options" => array(
	        "horizontal" => array(
	            "name" => "horizontal",
	            "title" => __( "Horizontal", "gpp" )
	        ),
	        "thumbnail" => array(
	            "name" => "square",
	            "title" => __( "Square", "gpp" )
	        ),
			"vertical" => array(
	            "name" => "vertical",
	            "title" => __( "Vertical", "gpp" )
	        )
	   )
	),

	"slideshow_enabled" => array(
	    "tab" => "slideshow_tab",
	    "name" => "slideshow_enabled",
	    "title" => "Enable Slideshow",
	    "description" => __( "Enable homepage slideshow.", "gpp" ),
	    "section" => "slideshow_section_1",
	    "since" => "1.0",
	    "id" => "slideshow_section_1",
	    "type" => "select",
	    "default" => "",
		"valid_options" => array(
		        "yes" => array(
		            "name" => "yes",
		            "title" => __( "Yes", "gpp" )
		        ),
		        "no" => array(
		            "name" => "no",
		            "title" => __( "No", "gpp" )
		        )
	    )
	),

	"slide_show" => array(
	    "tab" => "slideshow_tab",
	    "name" => "slide_show",
	    "title" => "Slideshow Images",
	    "description" => __( "Select or create a gallery of images to use in the homepage slideshow.", "gpp" ),
	    "section" => "slideshow_section_1",
	    "since" => "1.0",
	    "id" => "slideshow_section_1",
	    "type" => "gallery",
	    "default" => ""
	)

);

gpp_register_theme_options( $options );
