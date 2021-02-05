<?php
/**
 * Call to action options.
 *
 * @package superultra
 */

$default = superultra_get_default_theme_options();

// Banner section
$wp_customize->add_section( 'section_banner',
	array(
		'title'      => __( 'Banner Section', 'superultra' ),
		'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);


$wp_customize->add_setting( 'theme_options[disable_banner_section]',
	array(
		'default'           => $default['disable_banner_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'superultra_sanitize_switch_control',
	)
);
$wp_customize->add_control( new superultra_Switch_Control( $wp_customize, 'theme_options[disable_banner_section]',
    array(
		'label' 			=> __('Disable Banner section', 'superultra'),
		'section'    		=> 'section_banner',
		'on_off_label' 		=> superultra_switch_options(),
    )
) );


//Banner title
$wp_customize->add_setting('theme_options[banner_title]', 
	array(
	'default'           => $default['banner_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[banner_title]', 
	array(
	'label'       => __('Section Title', 'superultra'),
	'section'     => 'section_home_banner',   
	'settings'    => 'theme_options[banner_title]',
	'active_callback' => 'superultra_banner_active',		
	'type'        => 'text'
	)
);
// Additional Information First Page
$wp_customize->add_setting('theme_options[banner_page]', 
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'superultra_dropdown_pages'
	)
);

$wp_customize->add_control('theme_options[banner_page]', 
	array(
	'label'       => __('Select Page', 'superultra'),
	'section'     => 'section_banner',   
	'settings'    => 'theme_options[banner_page]',		
	'type'        => 'dropdown-pages',
	'active_callback' => 'superultra_banner_active',
	)
);



