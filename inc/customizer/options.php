<?php 
/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function superultra_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'superultra' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

if ( ! function_exists( 'superultra_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function superultra_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'On', 'superultra' ),
            'off'       => esc_html__( 'Off', 'superultra' )
        );
        return apply_filters( 'superultra_switch_options', $arr );
    }
endif;


 /**
 * Get an array of google fonts.
 * 
 */
function superultra_font_choices() {
    $font_family_arr = array();
    $font_family_arr[''] = esc_html__( '--Default--', 'superultra' );

    // Make the request
    $request = wp_remote_get( get_theme_file_uri( 'assets/fonts/webfonts.json' ) );

    if( is_wp_error( $request ) ) {
        return false; // Bail early
    }
    // Retrieve the data
    $body = wp_remote_retrieve_body( $request );
    $data = json_decode( $body );
    if ( ! empty( $data ) ) {
        foreach ( $data->items as $items => $fonts ) {
            $family_str_arr = explode( ' ', $fonts->family );
            $family_value = implode( '-', array_map( 'strtolower', $family_str_arr ) );
            $font_family_arr[ $family_value ] = $fonts->family;
        }
    }

    return apply_filters( 'superultra_font_choices', $font_family_arr );
}

if ( ! function_exists( 'superultra_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function superultra_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'superultra' ),
            'header-font-1'   => esc_html__( 'Raleway', 'superultra' ),
            'header-font-2'   => esc_html__( 'Poppins', 'superultra' ),
            'header-font-3'   => esc_html__( 'Montserrat', 'superultra' ),
            'header-font-4'   => esc_html__( 'Open Sans', 'superultra' ),
            'header-font-5'   => esc_html__( 'Lato', 'superultra' ),
            'header-font-6'   => esc_html__( 'Shadows Into Light', 'superultra' ),
            'header-font-7'   => esc_html__( 'Playfair Display', 'superultra' ),
            'header-font-8'   => esc_html__( 'Lora', 'superultra' ),
            'header-font-9'   => esc_html__( 'Titillium Web', 'superultra' ),
            'header-font-10'   => esc_html__( 'Muli', 'superultra' ),
            'header-font-11'   => esc_html__( 'Oxygen', 'superultra' ),
            'header-font-12'   => esc_html__( 'Nunito Sans', 'superultra' ),
            'header-font-13'   => esc_html__( 'Maven Pro', 'superultra' ),
            'header-font-14'   => esc_html__( 'Cairo', 'superultra' ),
            'header-font-15'   => esc_html__( 'Philosopher', 'superultra' ),
        );

        $output = apply_filters( 'superultra_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;


if ( ! function_exists( 'superultra_body_typography_options' ) ) :
    /**
     * Returns list of typography
     * @return array font styles
     */
    function superultra_body_typography_options(){
        $choices = array(
            'default'         => esc_html__( 'Default', 'superultra' ),
            'body-font-1'     => esc_html__( 'Raleway', 'superultra' ),
            'body-font-2'     => esc_html__( 'Poppins', 'superultra' ),
            'body-font-3'     => esc_html__( 'Roboto', 'superultra' ),
            'body-font-4'     => esc_html__( 'Open Sans', 'superultra' ),
            'body-font-5'     => esc_html__( 'Lato', 'superultra' ),
            'body-font-6'   => esc_html__( 'Shadows Into Light', 'superultra' ),
            'body-font-7'   => esc_html__( 'Playfair Display', 'superultra' ),
            'body-font-8'   => esc_html__( 'Lora', 'superultra' ),
            'body-font-9'   => esc_html__( 'Titillium Web', 'superultra' ),
            'body-font-10'   => esc_html__( 'Muli', 'superultra' ),
            'body-font-11'   => esc_html__( 'Oxygen', 'superultra' ),
            'body-font-12'   => esc_html__( 'Nunito Sans', 'superultra' ),
            'body-font-13'   => esc_html__( 'Maven Pro', 'superultra' ),
            'body-font-14'   => esc_html__( 'Cairo', 'superultra' ),
            'body-font-15'   => esc_html__( 'Philosopher', 'superultra' ),
        );

        $output = apply_filters( 'superultra_body_typography_options', $choices );
        if ( ! empty( $output ) ) {
            ksort( $output );
        }

        return $output;
    }
endif;

 ?>