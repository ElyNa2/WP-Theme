<?php
/**
 * client options.
 *
 * @package superultra
 */

$default = superultra_get_default_theme_options();

// client Section
$wp_customize->add_section( 'section_home_client',
	array(
		'title'      => __( 'Client Section', 'superultra' ),
		'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_client_section]',
	array(
		'default'           => $default['disable_client_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'superultra_sanitize_switch_control',
	)
);
$wp_customize->add_control( new superultra_Switch_Control( $wp_customize, 'theme_options[disable_client_section]',
    array(
		'label' 			=> __('Enable/Disable client Section', 'superultra'),
		'section'    		=> 'section_home_client',
		 'settings'  		=> 'theme_options[disable_client_section]',
		'on_off_label' 		=> superultra_switch_options(),
    )
) );

// client section title setting and control
$wp_customize->add_setting( 'theme_options[client_section_title]', array(
	'default'           => $default['client_section_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'theme_options[client_section_title]', array(
	'label'           	=>  __( 'Section Title ', 'superultra' ), 
	'section'        	=> 'section_home_client',	
	'active_callback' 	=> 'superultra_client_active',
	'type'				=> 'text',
) );
// Number of items
$wp_customize->add_setting('theme_options[number_of_client_items]', 
	array(
	'default' 			=> $default['number_of_client_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'superultra_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_client_items]', 
	array(
	'label'       => __('Number Of clients', 'superultra'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 6.', 'superultra'),
	'section'     => 'section_home_client',   
	'settings'    => 'theme_options[number_of_client_items]',		
	'type'        => 'number',
	'active_callback' => 'superultra_client_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 6,
			'step'	=> 1,
		),
	)
);

$number_of_client_items = superultra_get_option( 'number_of_client_items' );

for( $i=1; $i<=$number_of_client_items; $i++ ){

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[clients_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'superultra_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[clients_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'superultra'), $i),
		'section'     => 'section_home_client',   
		'settings'    => 'theme_options[clients_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'superultra_client_active',
		)
	);
	// client hr setting and control
	$wp_customize->add_setting( 'theme_options[client_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new superultra_Customize_Horizontal_Line( $wp_customize, 'theme_options[client_hr_'. $i .']',
		array(
			'section'         => 'section_home_client',
			'active_callback' => 'superultra_client_active',
			'type'			  => 'hr',
	) ) );
}

