<?php 
/**
 * Theme Options.
 *
 * @package superultra
 */


// Footer Setting Section starts
$wp_customize->add_section('section_social', 
	array(    
	'title'       => __('Social Media Option', 'superultra'),
	'panel'       => 'theme_option_panel'    
	)
);

// Setting facebook.
$wp_customize->add_setting( 'theme_options[facebook]',
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw'
	
	)
);
$wp_customize->add_control( 'theme_options[facebook]',
	array(
	'label'    	=> __( 'Facebook', 'superultra' ),
	'section'  	=> 'section_social',
	'settings'  => 'theme_options[facebook]',
	'type'     	=> 'url'
	)
);

// Setting Twitter.
$wp_customize->add_setting( 'theme_options[twitter]',
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw'
	
	)
);
$wp_customize->add_control( 'theme_options[twitter]',
	array(
	'label'    	=> __( 'Twitter', 'superultra' ),
	'section'  	=> 'section_social',
	'settings'  => 'theme_options[twitter]',
	'type'     	=> 'url'
	)
);

// Setting google.
$wp_customize->add_setting( 'theme_options[google]',
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw'
	
	)
);
$wp_customize->add_control( 'theme_options[google]',
	array(
	'label'    	=> __( 'Google Plus', 'superultra' ),
	'section'  	=> 'section_social',
	'settings'  => 'theme_options[google]',
	'type'     	=> 'url'
	)
);

// Setting linkedin.
$wp_customize->add_setting( 'theme_options[linkedin]',
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw'
	
	)
);
$wp_customize->add_control( 'theme_options[linkedin]',
	array(
	'label'    	=> __( 'Linkedin', 'superultra' ),
	'section'  	=> 'section_social',
	'settings'  => 'theme_options[linkedin]',
	'type'     	=> 'url'
	)
);
// Setting pinterest.
$wp_customize->add_setting( 'theme_options[pinterest]',
	array(
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'esc_url_raw'
	
	)
);
$wp_customize->add_control( 'theme_options[pinterest]',
	array(
	'label'    	=> __( 'Pinterest', 'superultra' ),
	'section'  	=> 'section_social',
	'settings'  => 'theme_options[pinterest]',
	'type'     	=> 'url'
	)
);

 ?>