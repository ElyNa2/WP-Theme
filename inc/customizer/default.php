<?php
/**
 * Default theme options.
 *
 * @package superultra
 */

if ( ! function_exists( 'superultra_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function superultra_get_default_theme_options() {

	$theme_data = wp_get_theme();
	$defaults = array();

	$defaults['disable_homepage_content_section']	= true;

	// Banner Section
	$defaults['disable_banner_section']		= false;
	$defaults['banner_title']	   	 		= esc_html__( 'Get Started', 'superultra' );
	
	// About Section
	$defaults['disable_about_section']		= false;
	$defaults['about_title']	   	 		= esc_html__( 'About Us', 'superultra' );


	// Our Service Section
	$defaults['disable_services_section']	= false;
	$defaults['service_title']	   	 		= esc_html__( 'Services', 'superultra' );
	$defaults['number_of_service_items']	= 6;

	// Client Section
	$defaults['disable_client_section']		= false;
	$defaults['client_section_title']	   	= esc_html__( 'Client', 'superultra' );
	$defaults['number_of_client_items']	= 6;



	
	//  Latest Blog Section

	$defaults['latest_posts_title']	   	 			= esc_html__( 'Read our blog to sharpen your business and SEO skills.', 'superultra' ); 
	$defaults['latest_posts_subtitle']	   	 			= esc_html__( 'Get evidence-based collection of articles on a topic sent directly to you in one email.', 'superultra' ); 
	$defaults['latest_readmore_text']	   	 			= esc_html__( 'Read more', 'superultra' ); 

	//General Section
	$defaults['blog_readmore_text']				= esc_html__('Read More','superultra');
	$defaults['excerpt_length']					= 40;
	$defaults['layout_options_blog']			= 'rightsidebar';
	$defaults['layout_options_archive']			= 'rightsidebar';
	$defaults['layout_options_page']			= 'rightsidebar';	
	$defaults['layout_options_single']			= 'rightsidebar';	


	//Footer section 		
	$defaults['copyright_text']				= esc_html__( 'Copyright &copy; All rights reserved.', 'superultra' );

	// Pass through filter.
	$defaults = apply_filters( 'superultra_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'superultra_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function superultra_get_option( $key ) {

		$default_options = superultra_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;