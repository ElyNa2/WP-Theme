<?php 
/**
 * Template part for displaying Services Section
 *
 *@package superultra
 */

    $service_title              = superultra_get_option( 'service_title' );
    $service_content            = superultra_get_option( 'service_content' );
    $number_of_service_items    = superultra_get_option( 'number_of_service_items' );
    for( $i=1; $i<=$number_of_service_items; $i++ ) :
        $services_page_posts[]  = absint(superultra_get_option( 'services_page_'.$i ) );
    endfor;
    ?>

    <?php if( !empty($service_title) ):?>
        <section class="widget widget_text">
            <h2 class="widget-title"><?php echo esc_html($service_title);?></h2>
            <div class="textwidget">
                <p><?php echo esc_html($service_content); ?></p>
            </div>          
        </section> 
    <?php endif; ?>
    
    <div class="section-content col-3 clear">
        <?php $args = array (
            'post_type'     => 'page',
            'post_per_page' => count( $services_page_posts ),
            'post__in'      => $services_page_posts,
            'orderby'       =>'post__in',
            
        ); 
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
                $i=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                    <section class="widget widget_rrtc_icon_text_widget">        
                        <div class="rtc-itw-holder">
                            <div class="rtc-itw-inner-holder">
                                <div class="text-holder">
                                    <h2 class="widget-title" itemprop="name"><?php the_title();?></h2>
                                    <div class="content">
                                        <?php
                                            $excerpt = superultra_the_excerpt( 15 );
                                            echo wp_kses_post( wpautop( $excerpt ) );
                                        ?>
                                    </div>
                                    <a class="btn-readmore" href="<?php the_permalink(); ?>" target="_blank"><?php echo esc_html('Learn More','superultra'); ?></a>                              
                                </div>
                                <?php if(has_post_thumbnail()) : ?>
                                <div class="icon-holder">
                                    
                                    <img src="<?php the_post_thumbnail_url( 'post-thumbnails' ); ?>" >
                                </div>
                            <?php endif; ?>
                            </div>
                        </div>
                    </section>
            
                <?php endwhile;?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
    </div> 