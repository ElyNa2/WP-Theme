<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package superultra
 */

if ( ! function_exists( 'superultra_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
function superultra_doctype() {
	?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
}
endif;

add_action( 'superultra_action_doctype', 'superultra_doctype', 10 );


if ( ! function_exists( 'superultra_head' ) ) :
	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
function superultra_head() {
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php
}
endif;
add_action( 'superultra_action_head', 'superultra_head', 10 );

if ( ! function_exists( 'superultra_page_start' ) ) :
	/**
	 * Add Skip to content.
	 *
	 * @since 1.0.0
	 */
	function superultra_page_start() {
	?><div id="page" class="site"><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'superultra' ); ?></a><?php
	}
endif;

add_action( 'superultra_action_before', 'superultra_page_start', 10 );

if ( ! function_exists( 'superultra_header_start' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function superultra_header_start() { ?>
		<header class="site-header"><?php
	}
endif;
add_action( 'superultra_action_before_header', 'superultra_header_start' );

if ( ! function_exists( 'superultra_header_end' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function superultra_header_end() {

		?>
			
		</header> <!-- header ends here --><?php
	}
endif;
add_action( 'superultra_action_header', 'superultra_header_end', 15 );

if ( ! function_exists( 'superultra_content_start' ) ) :
	/**
	 * Header End.
	 *
	 * @since 1.0.0
	 */
	function superultra_content_start() { 
	if ( !is_front_page() && !is_home() ){ 
	?>
		<div id="content" class="site-content">
	<?php 
		}
	}
endif;

add_action( 'superultra_action_before_content', 'superultra_content_start', 10 );

if ( ! function_exists( 'superultra_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function superultra_footer_start() {
		if( !(is_home() || is_front_page()) ){
			echo '</div>';
		} ?>
		</div>
		<footer class="site-footer"><?php
	}
endif;
add_action( 'superultra_action_before_footer', 'superultra_footer_start' );

if ( ! function_exists( 'superultra_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function superultra_footer_end() {?>
		</footer><?php
	}
endif;
add_action( 'superultra_action_after_footer', 'superultra_footer_end' );
