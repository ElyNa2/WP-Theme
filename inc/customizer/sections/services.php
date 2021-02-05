<?php
/**
 * Services options.
 *
 * @package superultra
 */

$default = superultra_get_default_theme_options();

// Services Section
$wp_customize->add_section( 'section_home_service',
	array(
		'title'      => __( 'Services Section', 'superultra' ),
		'priority'   => 35,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_services_section]',
	array(
		'default'           => $default['disable_services_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'superultra_sanitize_switch_control',
	)
);
$wp_customize->add_control( new superultra_Switch_Control( $wp_customize, 'theme_options[disable_services_section]',
    array(
		'label' 			=> __('Enable/Disable Service Section', 'superultra'),
		'section'    		=> 'section_home_service',
		 'settings'  		=> 'theme_options[disable_services_section]',
		'on_off_label' 		=> superultra_switch_options(),
    )
) );

//Services Section title
$wp_customize->add_setting('theme_options[service_title]', 
	array(
	'default'           => $default['service_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[service_title]', 
	array(
	'label'       => __('Section Title', 'superultra'),
	'section'     => 'section_home_service',   
	'settings'    => 'theme_options[service_title]',
	'active_callback' => 'superultra_services_active',		
	'type'        => 'text'
	)
);

//Services Section Content
$wp_customize->add_setting('theme_options[service_content]', 
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[service_content]', 
	array(
	'label'       => __('Section Description', 'superultra'),
	'section'     => 'section_home_service',   
	'settings'    => 'theme_options[service_content]',
	'active_callback' => 'superultra_services_active',		
	'type'        => 'textarea'
	)
);

// Number of items
$wp_customize->add_setting('theme_options[number_of_service_items]', 
	array(
	'default' 			=> $default['number_of_service_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'superultra_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_service_items]', 
	array(
	'label'       => __('Number Of Services', 'superultra'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 6.', 'superultra'),
	'section'     => 'section_home_service',   
	'settings'    => 'theme_options[number_of_service_items]',		
	'type'        => 'number',
	'active_callback' => 'superultra_services_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 6,
			'step'	=> 1,
		),
	)
);

$number_of_service_items = superultra_get_option( 'number_of_service_items' );

for( $i=1; $i<=$number_of_service_items; $i++ ){

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[services_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'superultra_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[services_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'superultra'), $i),
		'section'     => 'section_home_service',   
		'settings'    => 'theme_options[services_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'superultra_services_active',
		)
	);
	// service hr setting and control
	$wp_customize->add_setting( 'theme_options[service_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new superultra_Customize_Horizontal_Line( $wp_customize, 'theme_options[service_hr_'. $i .']',
		array(
			'section'         => 'section_home_service',
			'active_callback' => 'superultra_services_active',
			'type'			  => 'hr',
	) ) );
}
