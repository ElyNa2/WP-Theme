<?php
/**
 * The template for displaying home page.
 * @package superultra
 */

if ( 'posts' == get_option( 'show_on_front' ) ){ 
    get_header(); ?>
    <?php $enabled_sections = superultra_get_sections();
    if( is_array( $enabled_sections ) ) {
        foreach( $enabled_sections as $section ) {
            // var_dump($section['id']);
            if( ( $section['id'] == 'banner' ) ){

            ?>
                <?php $disable_banner_section = superultra_get_option( 'disable_banner_section' );
                if( true == $disable_banner_section): ?>
                    <div class="site-banner" id="<?php echo esc_attr( $section['id'] ); ?>">

                        <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        
                    </div>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'about' ) { ?>
                <?php $disable_about_section = superultra_get_option( 'disable_about_section' );
                if( true == $disable_about_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="about-section">
                        <div class="container">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                            
                        </div>
                    </section>
            <?php endif; ?>

        <?php } elseif( $section['id'] == 'client' ) { ?>
                <?php $disable_client_section = superultra_get_option( 'disable_client_section' );
                if( true == $disable_client_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="client-section">
                        <div class="container">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                            
                        </div>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'services' ) { ?>
                <?php $disable_services_section = superultra_get_option( 'disable_services_section' );
                if( true ==$disable_services_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="service-section">
                        <div class="container">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
            <?php endif; 
                
            }
        }
    }
    if('posts' == get_option( 'show_on_front' )){
        include( get_home_template() );
    }
    get_footer();
} 
 
else{
    include( get_page_template() );
}