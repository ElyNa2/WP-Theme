<?php 

/**
 * Theme Options.
 *
 * @package superultra
 */

$default = superultra_get_default_theme_options();
//For Sidebar Layout Option
$wp_customize->add_section('section_sidebar_layout', array(    
'title'       => __('Sidebar Layout Setting', 'superultra'),
'panel'       => 'theme_option_panel'    
));

//Layout Options for Blog
$wp_customize->add_setting('theme_options[layout_options_blog]', 
	array(
	'default' 			=> $default['layout_options_blog'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'superultra_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[layout_options_blog]', 
	array(		
	'label' 	=> __('Layout Option For Blog', 'superultra'),
	'section' 	=> 'section_sidebar_layout',
	'settings'  => 'theme_options[layout_options_blog]',
	'type' 		=> 'radio',
	'choices' 	=> array(	
			'rightsidebar' 			=> __('Right Sidebar', 'superultra'),
			'fullwidth-centered' 	=>  __('No Sidebar', 'superultra'),										
		),	
	),
);

//Layout Options for Archive
$wp_customize->add_setting('theme_options[layout_options_archive]', 
	array(
	'default' 			=> $default['layout_options_archive'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'superultra_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[layout_options_archive]', 
	array(		
	'label' 	=> __('Layout Option For Archive', 'superultra'),
	'section' 	=> 'section_sidebar_layout',
	'settings'  => 'theme_options[layout_options_archive]',
	'type' 		=> 'radio',
	'choices' 	=> array(	
			'rightsidebar' 			=> __('Right Sidebar', 'superultra'),
			'fullwidth-centered' 	=>  __('No Sidebar', 'superultra'),										
		),	
	),
);


//Layout Options for Pages
$wp_customize->add_setting('theme_options[layout_options_page]', 
	array(
	'default' 			=> $default['layout_options_page'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'superultra_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[layout_options_page]', 
	array(		
	'label' 	=> __('Layout Option For Pages', 'superultra'),
	'section' 	=> 'section_sidebar_layout',
	'settings'  => 'theme_options[layout_options_page]',
	'type' 		=> 'radio-image',
	'type' 		=> 'radio',
	'choices' 	=> array(	
			'rightsidebar' 			=> __('Right Sidebar', 'superultra'),
			'fullwidth-centered' 	=>  __('No Sidebar', 'superultra'),										
		),		
	),
);

//Layout Options for Single Post
$wp_customize->add_setting('theme_options[layout_options_single]', 
	array(
	'default' 			=> $default['layout_options_single'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'superultra_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[layout_options_single]', 
	array(		
	'label' 	=> __('Layout Option For Single Posts', 'superultra'),
	'section' 	=> 'section_sidebar_layout',
	'settings'  => 'theme_options[layout_options_single]',
	'type' 		=> 'radio',
	'choices' 	=> array(	
			'rightsidebar' 			=> __('Right Sidebar', 'superultra'),
			'fullwidth-centered' 	=>  __('No Sidebar', 'superultra'),										
		),		
	),
);

