<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package superultra
 */
/**
**
* Hook - superultra_action_doctype.
*
* @hooked superultra_doctype -  10
*/
do_action( 'superultra_action_doctype' );
?>
<head>
<?php
/**
* Hook - superultra_action_head.
*
* @hooked superultra_head -  10
*/
do_action( 'superultra_action_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<?php

/**
* Hook - superultra_action_before.
*
* @hooked superultra_page_start - 10
*/
do_action( 'superultra_action_before' );

/**
*
* @hooked superultra_header_start - 10
*/
do_action( 'superultra_action_before_header' );

/**
*
*@hooked superultra_site_branding - 10
*@hooked superultra_header_end - 15 
*/
do_action('superultra_action_header');

/**
*
* @hooked superultra_content_start - 10
*/
do_action( 'superultra_action_before_content' );

/**
 * Banner start
 * 
 * @hooked superultra_banner_header - 10
*/
do_action( 'superultra_banner_header' );  
