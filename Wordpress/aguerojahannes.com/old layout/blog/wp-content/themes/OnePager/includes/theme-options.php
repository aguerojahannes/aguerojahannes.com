<?php 



/**
 * Initialize the options before anything else. 
 */
add_action( 'admin_init', 'custom_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array(
    'contextual_help' => array(
      'content'       => array( 
        array(
          'id'        => 'general_help',
          'title'     => 'General1',
          'content'   => '<p>Help content goes here!</p>'
        )
      ),
      'sidebar'       => '<p>Sidebar content goes here!</p>',
    ),
    'sections'        => array(
	array(
        'id'          => 'general',
        'title'       => 'General Settings'
      ),
      array(
        'id'          => 'slider',
        'title'       => 'Slider'
      ),
	  array(
        'id'          => 'aboutus',
        'title'       => 'About Us'
      ),
	  
	  array(
        'id'          => 'portfolio',
        'title'       => 'Portfolio'
      ),
	  array(
        'id'          => 'skills',
        'title'       => 'Skills'
      ),
	  array(
        'id'          => 'industries',
        'title'       => 'Industries'
      ),
	  array(
        'id'          => 'clients',
        'title'       => 'Clients'
      ),
array(
        'id'          => 'social',
        'title'       => 'Social Network'
      )
    ),
    'settings'        => array(
	
	array(
            'id'      => 'logo_image',
            'label'   => 'Site Logo',
            'desc'    => '',
            'std'     => '',
			'section'  =>'general',
            'type'    => 'upload',
            'class'   => '',
            'choices' => array()
          ),
	
	
	  array(
        'id'          => 'skills_settings',
        'label'       => 'Skills',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'skills',
        'class'       => '',
        'choices'     => array(),
        'settings'    => array(
          array(
            'id'      => 'skill_value',
            'label'   => 'Skill Level',
            'desc'    => '',
            'std'     => '',
            'type'    => 'text',
            'class'   => '',
            'choices' => array()
          )
		 
          
        )
      ),
	  
	  array(
            'id'      => 'industry_desc',
            'label'   => 'Description',
            'desc'    => 'This text will be the description of Industries.',
            'std'     => '',
			'section' => 'industries',
            'type'    => 'textarea',
            'class'   => '',
            'choices' => array()
          ),

array(
            'id'      => 'social_facebook',
            'label'   => 'Facebook URL',
            'desc'    => '',
            'std'     => '',
			'section' => 'social',
            'type'    => 'text',
            'class'   => '',
            'choices' => array()
          ),
array(
            'id'      => 'social_twitter',
            'label'   => 'Twitter URL',
            'desc'    => '',
            'std'     => '',
			'section' => 'social',
            'type'    => 'text',
            'class'   => '',
            'choices' => array()
          ),

array(
            'id'      => 'social_linkedin',
            'label'   => 'Linkedin URL',
            'desc'    => '',
            'std'     => '',
			'section' => 'social',
            'type'    => 'text',
            'class'   => '',
            'choices' => array()
          ),
		  
		  array(
            'id'      => 'clients_desc',
            'label'   => 'Description',
            'desc'    => 'This text will be the description of Clients.',
            'std'     => '',
			'section' => 'clients',
            'type'    => 'textarea',
            'class'   => '',
            'choices' => array()
          ),
		  
		  	  array(
        'id'          => 'client_settings',
        'label'       => 'Clients',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'clients',
        'class'       => '',
        'choices'     => array(),
        'settings'    => array(
		
		array(
            'id'      => 'client_image',
            'label'   => 'Image',
            'desc'    => '',
            'std'     => '',
            'type'    => 'upload',
            'class'   => '',
            'choices' => array()
          ),
          array(
            'id'      => 'client_url',
            'label'   => 'Client URL',
            'desc'    => '',
            'std'     => '',
            'type'    => 'text',
            'class'   => '',
            'choices' => array()
          )
		 
          
        )
      ),
		  
		  array(
            'id'      => 'portfolio_desc',
            'label'   => 'Description',
            'desc'    => 'This text will be the description of Portfolio.You can add portfolios from the Portfolio Post Section',
            'std'     => '',
			'section' => 'portfolio',
            'type'    => 'textarea',
            'class'   => '',
            'choices' => array()
          ),
	  
	   array(
        'id'          => 'industry_settings',
        'label'       => 'Industries',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'industries',
        'class'       => '',
        'choices'     => array(),
        'settings'    => array(
          array(
            'id'      => 'industry_url',
            'label'   => 'Industry URL',
            'desc'    => '',
            'std'     => '',
            'type'    => 'text',
            'class'   => '',
            'choices' => array()
          )
		 
          
        )
      ),
	  
	   
	
	 array(
            'id'      => 'aboutus_desc',
            'label'   => 'Description',
            'desc'    => 'This text will be placed in the About us Section.',
            'std'     => '',
			'section' => 'aboutus',
            'type'    => 'textarea',
            'class'   => '',
            'choices' => array()
          ),
      array(
        'id'          => 'my_checkbox',
        'label'       => 'Enable Slider',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'slider',
        'class'       => '',
        'choices'     => array(
          array( 
            'value' => 'yes',
            'label' => '' 
          )
        )
      ),
  
      array(
        'id'          => 'my_slider',
        'label'       => 'Images',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'slider',
        'class'       => '',
        'choices'     => array(),
        'settings'    => array(
          array(
            'id'      => 'slider_image',
            'label'   => 'Image',
            'desc'    => '',
            'std'     => '',
            'type'    => 'upload',
            'class'   => '',
            'choices' => array()
          ),
		 
          array(
            'id'      => 'slider_caption',
            'label'   => 'Caption',
            'desc'    => 'This text is used to add fancy captions in the slider.',
            'std'     => '',
            'type'    => 'text',
            'class'   => '',
            'choices' => array()
          )
        )
      )
    )
  );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}

?>