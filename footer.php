<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Super_Ultra
 */



/**
 *
 * @hooked superultra_footer_start
 */
do_action( 'superultra_action_before_footer' );

/**
 * Hooked - superultra_footer_top_section -10
 * Hooked - superultra_footer_section -20
 */
do_action( 'superultra_action_footer' );

/**
 * Hooked - superultra_footer_end. 
 */
do_action( 'superultra_action_after_footer' );


 wp_footer(); ?>

</body>
</html>
