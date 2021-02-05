<?php 
/**
 * Template part for displaying client Section
 *
 *@package superultra
 */

        $superultra_client_section_title     = superultra_get_option( 'client_section_title');
        $number_of_client_items  = superultra_get_option( 'number_of_client_items' );
        for( $i=1; $i<=$number_of_client_items; $i++ ) :
            $clients_page_posts[] = absint(superultra_get_option( 'clients_page_'.$i ) );
           
        endfor;
        
    ?>  
    <section class="widget widget_raratheme_client_logo_widget">            
        <div class="raratheme-client-logo-holder">
            <div class="raratheme-client-logo-inner-holder">
                <?php if ( ! empty ( $superultra_client_section_title ) ) : ?>
                    <h2 class="widget-title" itemprop="name"><?php echo esc_html( $superultra_client_section_title ); ?></h2>
                <?php endif; ?>                              
                <div class="image-holder-wrap">
                 <!-- yo wrap plugin ko filter bata rakhnu parxa -->
                  <?php  
                    
                    $args = array (
                        'post_type'     => 'page',
                        'post_per_page' => count( $clients_page_posts ),
                        'post__in'      => $clients_page_posts,
                        'orderby'       =>'post__in',
                        
                    ); 
                    $loop = new WP_Query($args);                        
                    if ( $loop->have_posts() ) :
                        $i=0;  
                        while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                        
                        <div class="image-holder black-white">
                            <?php if(has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" target="_blank">
                                    <img src="<?php the_post_thumbnail_url( 'post-thumbnails' ); ?>" alt="">
                                </a> 
                            <?php endif; ?>
                        </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                <?php wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </section>
    
