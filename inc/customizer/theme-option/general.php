<?php 

/**
 * Theme Options.
 *
 * @package superultra
 */

$default = superultra_get_default_theme_options();
//For General Option
$wp_customize->add_section('section_general', array(    
'title'       => __('General Setting', 'superultra'),
'panel'       => 'theme_option_panel'    
));


//Layout Options for Home Blog page
$wp_customize->add_setting('theme_options[layout_options_homeblog]', 
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'superultra_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[layout_options_homeblog]', 
	array(		
	'label' 	=> __('Layout Option For Homepage Blog', 'superultra'),
	'section' 	=> 'section_general',
	'settings'  => 'theme_options[layout_options_homeblog]',
	'type' 		=> 'radio',
	'choices' 	=> array(														
			'default' 	=> __('Default View', 'superultra'),
			'list-view' =>  __('List View', 'superultra'),
		),	
	),
);

$wp_customize->add_setting( 'theme_options[disable_homepage_content_section]',
	array(
		'default'           => $default['disable_homepage_content_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'superultra_sanitize_switch_control',
	)
);
$wp_customize->add_control( new superultra_Switch_Control( $wp_customize, 'theme_options[disable_homepage_content_section]',
    array(
		'label' 			=> __('Enable/Disable Static Homepage Content Section', 'superultra'),
		'description' => __('This option is only work on Static HomePage ', 'superultra'),
		'section'    		=> 'section_general',
		 'settings'  		=> 'theme_options[disable_homepage_content_section]',
		'on_off_label' 		=> superultra_switch_options(),
    )
) );

// Setting excerpt_length.
$wp_customize->add_setting( 'theme_options[excerpt_length]', array(
	'default'           => $default['excerpt_length'],
	'sanitize_callback' => 'superultra_sanitize_positive_integer',
) );
$wp_customize->add_control( 'theme_options[excerpt_length]', array(
	'label'       => esc_html__( 'Excerpt Length', 'superultra' ),
	'description' => esc_html__( 'in words', 'superultra' ),
	'section'     => 'section_general',
	'type'        => 'number',
	'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 55px;' ),
) );

 ?>