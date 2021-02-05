<?php
/**
 * Home Page Options.
 *
 * @package superultra
 */

$default = superultra_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'home_page_panel',
	array(
	'title'      => __( 'Front Page Sections', 'superultra' ),
	'priority'   => 30,
	'capability' => 'edit_theme_options',
	)
);
// Add Panel.
	$wp_customize->add_panel( 'theme_option_panel',
		array(
		'title'      => __( 'Theme Options', 'superultra' ),
		'priority'   => 30,
		'capability' => 'edit_theme_options',
		)
	);

/**
* Section Customizer Options.
*/
require get_template_directory() . '/inc/customizer/sections/banner.php';
require get_template_directory() . '/inc/customizer/sections/about.php';
require get_template_directory() . '/inc/customizer/sections/client.php';
require get_template_directory() . '/inc/customizer/sections/services.php';
require get_template_directory() . '/inc/customizer/sections/blog.php';
