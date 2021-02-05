<?php
/**
 * About options.
 *
 * @package superultra
 */

$superultra_default = superultra_get_default_theme_options();

// About Section
$wp_customize->add_section( 'section_home_about',
	array(
		'title'      => __( 'About Section', 'superultra' ),
		'priority'   => 15,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_about_section]',
	array(
		'default'           => $superultra_default['disable_about_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'superultra_sanitize_switch_control',
	)
);
$wp_customize->add_control( new superultra_Switch_Control( $wp_customize, 'theme_options[disable_about_section]',
    array(
		'label' 			=> __('Enable/Disable About Section', 'superultra'),
		'section'    		=> 'section_home_about',
		 'settings'  		=> 'theme_options[disable_about_section]',
		'on_off_label' 		=> superultra_switch_options(),
    )
) );

// About section title setting and control
$wp_customize->add_setting( 'theme_options[about_section_title]', array(
	'default'           => $superultra_default['about_section_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'theme_options[about_section_title]', array(
	'label'           	=>  __( 'Section Title ', 'superultra' ), 
	'section'        	=> 'section_home_about',	
	'active_callback' 	=> 'superultra_about_active',
	'type'				=> 'text',
) );

// Additional Information First Page
$wp_customize->add_setting('theme_options[about_page]', 
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'superultra_dropdown_pages'
	)
);

$wp_customize->add_control('theme_options[about_page]', 
	array(
	'label'       => __('Select Page superultra', 'superultra'),
	'section'     => 'section_home_about',   
	'settings'    => 'theme_options[about_page]',		
	'type'        => 'dropdown-pages',
	'active_callback' => 'superultra_about_active',
	)
);

$wp_customize->add_setting('theme_options[about_btn_text]', 
	array(
	'default'           => $superultra_default['about_btn_text'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[about_btn_text]', 
	array(
	'label'       => __('Button Label', 'superultra'),
	'section'     => 'section_home_about',   
	'settings'    => 'theme_options[about_btn_text]',	
	'active_callback' => 'superultra_about_active',	
	'type'        => 'text'
	)
);