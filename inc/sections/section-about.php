<?php 
/**
 * Template part for displaying About Section
 *
 *@package superultra
 */

    $superultra_disable_about_section       = superultra_get_option( 'disable_about_section' );
    if ($superultra_disable_about_section ==true) {
        $superultra_about_section_title     = superultra_get_option( 'about_section_title');
        $superultra_btn_text                = superultra_get_option( 'about_btn_text');
    ?>  
    <section class="widget widget_raratheme_featured_page_widget">                
        <div class="widget-featured-holder right">
            <p class="section-subtitle"> 
                <?php if ( ! empty ( $superultra_about_section_title ) ) : ?>
                    <span><?php echo esc_html( $superultra_about_section_title ); ?></span>
                <?php endif; ?>                       
               
            </p>  
            <?php  
            $about_id = superultra_get_option( 'about_page' );
                $args = array (
                'post_type'     => 'page',
                'posts_per_page' => 1,
                'p' => $about_id,
                
            ); 
            $the_query = new WP_Query( $args );

            // The Loop
            while ( $the_query->have_posts() ) : $the_query->the_post();
            ?>                  
            <div class="text-holder">

                <h2 class="widget-title"><?php the_title(); ?></h2>
                <div class="featured_page_content">
                    <?php  
                        $excerpt = superultra_the_excerpt( 150 );
                        echo wp_kses_post( wpautop( $excerpt ) );
                    ?>
                    <?php if ( ! empty( $superultra_btn_text ) ) : ?>
                        <a href="<?php the_permalink(); ?>" target="_blank" class="btn-readmore"><?php echo esc_html( $superultra_btn_text ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <?php if(has_post_thumbnail()) : ?>
                <div class="img-holder">
                    <a target="_blank" href="#">
                        <img src="<?php the_post_thumbnail_url( 'post-thumbnails' ); ?>" alt="">                        
                    </a>
                </div>
            <?php endif; ?>
            <?php endwhile; ?>
        </div>        
    </section> 
<?php } ?> 