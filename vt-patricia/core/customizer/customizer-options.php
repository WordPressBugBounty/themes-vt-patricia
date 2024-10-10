<?php
/**
 * Defines customizer options
 *
 * @package vt-patricia 
 */

function customizer_library_vt_patricia_options() {

	// Theme defaults
	$primary_color = '#ceac92';
	$header_color = '#535353';
	$header_search_bg_color = '#3c4852';
	$widget_title_boder_color = '#eb5424';
	$pagination_bg_color = '#eb5424 ';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	/**-----------------
	 * Theme Settings
	 -----------------*/
	$panel = 'vt-panel-layout';
	
    $panels[] = array(
        'id' => $panel,
        'title' => __( 'Theme Settings', 'vt-patricia' ),
        'priority' => '30'
    );
	

	/**-----------------
	 * Header Settings
	 -----------------*/
	$section = 'header_image';
    
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Header', 'vt-patricia' ),
		'priority' => '20',
		'panel' => $panel
	);
	
	$options['vt_patricia_header_social'] = array(
		'id' => 'vt_patricia_header_social',
		'label'   => __( 'Display Header Social Icons', 'vt-patricia' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 1
	);
	$options['vt_patricia_header_overlay'] = array(
		'id' => 'vt_patricia_header_overlay',
		'label'   => __( 'Enable Image Overlay', 'vt-patricia' ),
		'section' => $section,
		'type'    => 'ios',
		'priority' => '30',
		'default' => 1
	);
	
	// Social Media Settings
    $section = 'vt-site-layout-section-socmed';
	
    $sections[] = array(
        'id' => $section,
        'title' => __( 'Social Media Profile', 'vt-patricia' ),
		'description'  => __('Enter social media profile links', 'vt-patricia'),
        'priority' => '30',
		'panel' => $panel
    );
	
    $options['vt_patricia_facebook'] = array(
        'id' => 'vt_patricia_facebook',
        'label'   => __( 'Facebook', 'vt-patricia' ),
        'section' => $section,
        'type'    => 'url',
        'default' => ''
    );
	$options['vt_patricia_twitter'] = array(
        'id' => 'vt_patricia_twitter',
        'label'   => __( 'Twitter', 'vt-patricia' ),
        'section' => $section,
        'type'    => 'url',
        'default' => ''
    );
	$options['vt_patricia_linkedin'] = array(
        'id' => 'vt_patricia_linkedin',
        'label'   => __( 'Linkedin', 'vt-patricia' ),
        'section' => $section,
        'type'    => 'url',
        'default' => ''
    );
	$options['vt_patricia_pinterest'] = array(
        'id' => 'vt_patricia_pinterest',
        'label'   => __( 'Pinterest', 'vt-patricia' ),
        'section' => $section,
        'type'    => 'url',
        'default' => ''
    );
	$options['vt_patricia_instagram'] = array(
        'id' => 'vt_patricia_instagram',
        'label'   => __( 'Instagram', 'vt-patricia' ),
        'section' => $section,
        'type'    => 'url',
        'default' => ''
    );
	$options['vt_patricia_youtube'] = array(
        'id' => 'vt_patricia_youtube',
        'label'   => __( 'Youtube', 'vt-patricia' ),
        'section' => $section,
        'type'    => 'url',
        'default' => ''
    );
	
	// Featured slider
    $section = 'vt-section-slider';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Featured Slider', 'vt-patricia' ),
		'priority' => '40',
		'panel' => $panel
	);
	
	$options['vt_patricia_featured_slider'] = array(
		'id' => 'vt_patricia_featured_slider',
		'label'   => __( 'Enable Featured Slider', 'vt-patricia' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 0,
		'priority' => '5'
	);	
	
    $options['patricia_category_slider'] = array(
        'id' => 'patricia_category_slider',
        'label'   => __( 'Display Post Category', 'vt-patricia' ),
        'section' => $section,
        'type'    => 'ios',
        'default' => 1,
    );
	
	$options['vt_patricia_featured_slider_slides'] = array(
        'id' => 'vt_patricia_featured_slider_slides',
        'label'   => __( 'Amount of Slides', 'vt-patricia' ),
        'section' => $section,
        'type'    => 'number',
        'default' => 5,
		'priority' => '7'
    );
	
	/**-----------------
	 * Blog Settings
	 -----------------*/
	$section = 'theme-settings';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Blog Settings', 'vt-patricia' ),
		'priority' => '50',
		'panel' => $panel
	);

    $choices = array(
		'layout-grid' => __('Grid Layout', 'vt-patricia'),
		'layout-standard' => __('Standard Layout', 'vt-patricia'),
			
    );
    $options['blog-page-layout'] = array(
        'id' => 'blog-page-layout',
        'label'   => __( 'Homepage Layout', 'vt-patricia' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'layout-grid'
    );
	
	$choices = array(
		'layout-grid' => __('Grid Layout', 'vt-patricia'),
		'layout-standard' => __('Standard Layout', 'vt-patricia'),
			
    );
    $options['archive-page-layout'] = array(
        'id' => 'archive-page-layout',
        'label'   => __( 'Archive Layout', 'vt-patricia' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'layout-grid'
    );
	
	$options['vt_patricia_entry_excerpt'] = array(
		'id' => 'vt_patricia_entry_excerpt',
		'label'   => __( 'Number of words to show on excerpt', 'vt-patricia' ),
		'section' => $section,
        'type'    => 'number',
        'default' => 38,
        'description' => __( 'Default: 38', 'vt-patricia' )		
	);
	
	$options['vt_patricia_sticky_sidebar'] = array(
		'id' => 'vt_patricia_sticky_sidebar',
		'label'   => __( 'Enable Sticky Sidebar', 'vt-patricia' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 1,
	);
	$options['button_up'] = array(
		'id' => 'button_up',
		'label'   => __( 'Enable "BackToTop" button', 'vt-patricia' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 1,
	);
	
	/**-----------------
	 * Single Posts 
	 -----------------*/
	$section = 'vt_patricia_single_post_section';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Single Post', 'vt-patricia' ),
		'priority' => '60',
		'panel' => $panel
	);
	
	$options['single-tags-on'] = array(
		'id' => 'single-tags-on',
		'label'   => __( 'Display Post Tags', 'vt-patricia' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 1,
	);
	$options['single-post-nav'] = array(
		'id' => 'single-post-nav',
		'label'   => __( 'Display Post Nav', 'vt-patricia' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 1,
	);
	$options['related-posts-on'] = array(
		'id' => 'related-posts-on',
		'label'   => __( 'Display Related posts', 'vt-patricia' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 1,
	);
	
	// Footer Settings
    $section = 'vt-site-layout-section-footer';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Footer', 'vt-patricia' ),
        'priority' => '110',
		'panel' => $panel
    );
	$options['patricia_footer_logo'] = array(
		'id' => 'patricia_footer_logo',
		'label'   => __( 'Footer Logo', 'vt-patricia' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => ''
	);
	
	/**-----------------
	 * Color Settings
	 -----------------*/
    $panel = 'vt-colors-settings';

    $panels[] = array(
        'id' => $panel,
        'title' => __( 'Color Settings', 'vt-patricia' ),
        'priority' => '80'
    );
    
    $section = 'colors';
	
	$options['vt_patricia_color_scheme'] = array(
        'id' => 'vt_patricia_color_scheme',
        'label'   => __( 'Color Scheme', 'vt-patricia' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $primary_color,
    );
	
	$options['vt_patricia_topbar_bg_color'] = array(
        'id' => 'vt_patricia_topbar_bg_color',
        'label'   => __( 'Topbar Background', 'vt-patricia' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#f7f2ee'
    );
	
	$options['menu_link_color'] = array(
        'id' => 'menu_link_color',
        'label'   => __( 'Menu Link Color', 'vt-patricia' ),
        'section' => $section,
        'type'    => 'color',
		'default' => '#535353'
    );
	
	$options['menu_link_hover_color'] = array(
        'id' => 'menu_link_hover_color',
        'label'   => __( 'Menu Link Hover Color', 'vt-patricia' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $primary_color,
    );
	
    $options['vt_patricia_header_bg_color'] = array(
        'id' => 'vt_patricia_header_bg_color',
        'label'   => __( 'Header Background', 'vt-patricia' ),
        'section' => $section,
        'type'    => 'color',
		'default' => '#ffffff'
    );
	$options['vt_patricia_site_title_color'] = array(
        'id' => 'vt_patricia_site_title_color',
        'label'   => __( 'Site Title Color', 'vt-patricia' ),
        'section' => $section,
        'type'    => 'color',
		'default' => $header_color,
    );
	$options['vt_patricia_site_desc_color'] = array(
        'id' => 'vt_patricia_site_desc_color',
        'label'   => __( 'Site Tagline Color', 'vt-patricia' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#757575'
    );
    $options['vt_patricia_footer_bg_color'] = array(
        'id' => 'vt_patricia_footer_bg_color',
        'label'   => __( 'Footer Background', 'vt-patricia' ),
        'section' => $section,
        'type'    => 'color',
		'default' => '#f7f2ee'
    );
	$options['footer_text_color'] = array(
        'id' => 'footer_text_color',
        'label'   => __( 'Footer Text Color', 'vt-patricia' ),
        'section' => $section,
        'type'    => 'color',
		'default' => '#595959'
    );
	$options['footer_link_color'] = array(
        'id' => 'footer_link_color',
        'label'   => __( 'Footer Link Color', 'vt-patricia' ),
        'section' => $section,
        'type'    => 'color',
		'default' => '#222222'
    );
	
	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'customizer_library_vt_patricia_options' );

function vt_patricia_register_theme_customizer( $wp_customize ){
	
    // Featured Cat
	$wp_customize->add_setting( 'vt_patricia_featured_cat', array(
		'capability'        => 'edit_theme_options',
		'transport' 		=> 'refresh',
		'default'			=> '',
		'sanitize_callback' => 'absint'
	) );
	
	$wp_customize->add_control(
		new WP_Customize_Category_Control(
			$wp_customize,
			'vt_patricia_featured_cat',
			array(
				'label'			=> __('Select Featured Category', 'vt-patricia'),
				'description'	=> __('Choose category to show the slider.', 'vt-patricia'),
				'settings' 	 	=> 'vt_patricia_featured_cat',
				'section'		=> 'vt-section-slider',
				'type'      	=> 'category_dropdown',
				'priority' 		=> '6'
			)
		)
	);
	
}
add_action( 'customize_register', 'vt_patricia_register_theme_customizer' );