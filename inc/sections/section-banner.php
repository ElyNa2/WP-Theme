<?php 
/**
 * Template part for displaying Banner Section
 *
 *@package superultra
 */
    $banner_title   = superultra_get_option( 'banner_title' );
   
    $banner_id = superultra_get_option( 'banner_page' );
            $args = array (
            'post_type'     => 'page',
            'posts_per_page' => 1,
            'p' => $banner_id,
            
        ); 
 
        $the_query = new WP_Query( $args );

        // The Loop
        while ( $the_query->have_posts() ) : $the_query->the_post();
        ?>
        <div class="banner-item">
            <img src="<?php the_post_thumbnail_url('superultra-banner'); ?>" alt="banner">
            <div class="banner-caption center">
                <div class="container">
                    <h1 class="title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h1>
                    <div class="item-desc">
                        <?php $excerpt = superultra_the_excerpt( 20 );
                            echo wp_kses_post( wpautop( $excerpt ) ); ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <?php endwhile;?>
         <?php wp_reset_postdata(); ?>

   
       