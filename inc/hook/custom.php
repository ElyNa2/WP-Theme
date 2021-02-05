<?php
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package superultra
 */

if( ! function_exists( 'superultra_site_branding' ) ) :
	/**
  	 * Site Branding
  	 *
  	 * @since 1.0.0
  	 */
function superultra_site_branding() { ?>
    <div class="container">
      <div class="menu-toggle"> 
        <span class="toggle-bar"></span>
        <span class="toggle-bar"></span>
        <span class="toggle-bar"></span>
      </div>
      <div class="site-branding logo-text">
        <div class="site-logo">
          <?php if(has_custom_logo()):?>
              <?php the_custom_logo();?>
          <?php endif;?>
        </div>
        <div class="site-text-wrap">
          <h1 class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">  <?php bloginfo( 'name' ); ?></a>
          </h1>
          <?php 
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) : ?>
              <p class="site-description"><?php echo esc_html($description);?></p>
          <?php endif; ?>
        </div>
      </div> <!-- .site-branding -->
      <div class="menu-wrap">
        <nav class="main-navigation">
          <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'menu_class'     => 'nav-menu',
                'fallback_cb'    => 'superultra_primary_navigation_fallback',
            ) );
          ?>
        </nav>
        <div class="header-search">
          <span class="search-toggle">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><defs><style>.a{fill:none;}</style></defs><g transform="translate(83 -7842)"><rect class="a" width="18" height="18" transform="translate(-83 7842)"/><path d="M18,16.415l-3.736-3.736a7.751,7.751,0,0,0,1.585-4.755A7.876,7.876,0,0,0,7.925,0,7.876,7.876,0,0,0,0,7.925a7.876,7.876,0,0,0,7.925,7.925,7.751,7.751,0,0,0,4.755-1.585L16.415,18ZM2.264,7.925a5.605,5.605,0,0,1,5.66-5.66,5.605,5.605,0,0,1,5.66,5.66,5.605,5.605,0,0,1-5.66,5.66A5.605,5.605,0,0,1,2.264,7.925Z" transform="translate(-83 7842)"/></g></svg>
          </span>
          <div class="header-search-form">
            <div class="container">
              <form role="search" method="get" class="search-form" action="">
                <label>
                  <span class="screen-reader-text"><?php echo esc_url( home_url( '/' ) ); ?></span>
                  <input class="search-field" placeholder="<?php echo esc_attr_x( 'Search anything and hit enter', 'placeholder', 'superultra' ) ?>" value="<?php echo get_search_query() ?>" name="s" type="search">
                </label>
                <input class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'superultra' ) ?>" type="submit">
              </form>
              <span class="close"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php }
endif;
add_action( 'superultra_action_header', 'superultra_site_branding', 10 );

if ( ! function_exists( 'superultra_footer_top_section' ) ) :

  /**
   * Top  Footer 
   *
   * @since 1.0.0
   */
  function superultra_footer_top_section() {
      $footer_sidebar_data = superultra_footer_sidebar_class();
      $footer_sidebar    = $footer_sidebar_data['active_sidebar'];
      $footer_class      = $footer_sidebar_data['class'];
      if ( empty( $footer_sidebar ) ) {
        return;
      }      ?>
      <div class="top-footer <?php echo esc_attr( $footer_class ); ?>">
        <div class="container">
            <?php
              for ( $i = 1; $i <= 4 ; $i++ ) {
                if ( is_active_sidebar( 'footer-' . $i ) ) {
                ?>
                  <div class="col">
                    <?php dynamic_sidebar( 'footer-' . $i ); ?>
                  </div>
                  <?php
                }
              }
            ?> 
        </div>
      </div> <!-- widget area starting from here -->
    <?php
 }
endif;

add_action( 'superultra_action_footer', 'superultra_footer_top_section', 10 );

if ( ! function_exists( 'superultra_footer_section' ) ) :

  /**
   * Footer copyright
   *
   * @since 1.0.0
   */

  function superultra_footer_section() { ?>
        <div class="bottom-footer">
            <?php 
                $copyright_footer = superultra_get_option('copyright_text');
                if ( ! empty( $copyright_footer ) ) {
                  $copyright_footer = wp_kses_data( $copyright_footer );
                }
                
            ?>
            <div class="container">
                <span class="copyright"><?php echo esc_html($copyright_footer);?></span>
            </div> 

            <?php 
              $facebook   = superultra_get_option( 'facebook' );
              $twitter    = superultra_get_option( 'twitter' );
              $google     = superultra_get_option( 'google' );
              $linkedin   = superultra_get_option( 'linkedin' );
              $pinterest  = superultra_get_option( 'pinterest' );
              
              if ( empty( $facebook ) && empty( $twitter ) && empty( $google ) && empty( $linkedin ) && empty( $pinterest ) ) {
                      return;
              }

              echo '<div class="footer-social">';
              echo '<ul class="social-list">';
              if ( ! empty( $facebook ) ) {
                  echo '<li><a data-title="facebook" href="' . esc_url( $facebook ) . '"></a><i class="fab fa-facebook-f"></i></li>';
              }
              if ( ! empty( $twitter ) ) {
                  echo '<li><a data-title="twitter" href="' . esc_url( $twitter ) . '"></a><i class="fab fa-twitter"></i></li>';
              }
              if ( ! empty( $google ) ) {
                  echo '<li><a data-title="google-plus" href="' . esc_url( $google ) . '"></a><i class="fab fa-google-plus-g"></i></li>';
              }
              if ( ! empty( $linkedin ) ) {
                  echo '<li><a data-title="linkedin" href="' . esc_url( $linkedin ) . '"></a><i class="fab fa-linkedin-in"></i></li>';
              }
              if ( ! empty( $pinterest ) ) {
                  echo '<li><a data-title="pinterest" href="' . esc_url( $pinterest) . '"></a><i class="fab fa-pinterest"></i></li>';
              }
              echo '</ul>';
              echo '</div>';
            ?>
        </div> <!-- site generator ends here -->
        
    <?php }

endif;
add_action( 'superultra_action_footer', 'superultra_footer_section', 20 );

if ( ! function_exists( 'superultra_footer_sidebar_class' ) ) :
  /**
   * Count the number of footer sidebars to enable dynamic classes for the footer
   *
   * @since superultra 0.1
   */
  function superultra_footer_sidebar_class() {
    $data = array();
    $active_sidebar = array();
      $count = 0;

      if ( is_active_sidebar( 'footer-1' ) ) {
        $active_sidebar[]   = 'footer-1';
          $count++;
      }

      if ( is_active_sidebar( 'footer-2' ) ){
        $active_sidebar[]   = 'footer-2';
          $count++;
    }

      if ( is_active_sidebar( 'footer-3' ) ){
        $active_sidebar[]   = 'footer-3';
          $count++;
      }

      if ( is_active_sidebar( 'footer-4' ) ){
        $active_sidebar[]   = 'footer-4';
          $count++;
      }

      $class = '';

      switch ( $count ) {
          case '1':
            $class = 'col-1';
            break;
          case '2':
            $class = 'col-2';
            break;
          case '3':
            $class = 'col-3';
            break;
            case '4':
            $class = 'col-4';
            break;
      }

    $data['active_sidebar'] = $active_sidebar;
    $data['class']        = $class;

      return $data;
  }
endif;

if ( ! function_exists( 'superultra_excerpt_length' ) ) :

  /**
   * Implement excerpt length.
   *
   * @since 1.0.0
   *
   * @param int $length The number of words.
   * @return int Excerpt length.
   */
  function superultra_excerpt_length( $length ) {

    if ( is_admin() ) {
      return $length;
    }

    $excerpt_length = superultra_get_option( 'excerpt_length' );

    if ( absint( $excerpt_length ) > 0 ) {
      $length = absint( $excerpt_length );
    }

    return $length;
  }

endif;

add_filter( 'excerpt_length', 'superultra_excerpt_length', 999 );

if( ! function_exists( 'superultra_banner_header
  ' ) ) :
    /**
     * Page Header
    */
    function superultra_banner_header() { 

        if ( is_front_page() && is_home() ){ 
            $header_image = get_header_image();
            $header_image_url = ! empty( $header_image ) ?  $header_image : get_template_directory_uri() . '/assets/images/default-header.jpg';
        }
        elseif( is_front_page() ) {
            return;
        }
        if( is_singular() && !is_page()) {
         ?>
          <header class='page-header' style="background-image: url(<?php the_post_thumbnail_url('full') ?>);"> 
             <?php superultra_banner_title();?>
          </header>
        <?php 
        echo '<div class= "container">';
        } 
        if (is_page()){
          echo '<div class= "container">';
        }
    }
endif;
add_action( 'superultra_banner_header', 'superultra_banner_header', 10 );

if( ! function_exists( 'superultra_banner_title' ) ) :
/**
 * Page Header
*/
function superultra_banner_title(){ 
    if ( ( is_front_page() && is_home() ) || is_home() ){ 
        echo '<h1 class="page-title">';
        esc_html_e( 'Blog','superultra' );
        echo '</h1>';
    }

    if( is_singular() ) {
        the_title( '<h1 class="page-title">', '</h1>' );
    }       

    if( is_archive() ){
        the_archive_description( '<div class="archive-description">', '</div>' );
        the_archive_title( '<h1 class="page-title">', '</h1>' );
    }

    if( is_search() ){ ?>
        <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'superultra' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    <?php }
    
    if( is_404() ) {
        echo '<h1 class="page-title">' . esc_html__( 'Uh-Oh..', 'superultra' ) . '</h1>';
    }
}
endif;

if( ! function_exists( 'superultra_banner_image' ) ) :
/**
 * Banner Header Image
*/
function superultra_banner_image( $image_url ){
    global $post;

    $archive_header = superultra_get_option( 'archive_header_image' );
    $search_header = superultra_get_option( 'search_header_image' );
    $header_404 = superultra_get_option( '404_header_image' );

    // if ( is_home() && ! is_front_page() ){ 
    //     $image_url      = get_the_post_thumbnail_url( get_option( 'page_for_posts' ), 'full' );
    //     $header_image = get_header_image();
    //     $fallback_image = ! empty( $header_image ) ?  $header_image : get_template_directory_uri() . '/assets/images/default-header.jpg';
    //     $image_url      = ( ! empty( $image_url) ) ? $image_url : $fallback_image;
    // }
    if( is_singular() ){
        $image_url      = get_the_post_thumbnail_url( $post->ID, 'full' );
        $header_image = get_header_image();
        $fallback_image = ! empty( $header_image ) ?  $header_image : get_template_directory_uri() . '/assets/images/default-header.jpg';
        $image_url      = ( ! empty( $image_url) ) ? $image_url : $fallback_image;
    }
    // elseif( is_archive() ){
    //     $image_url = ( ! empty( $archive_header) ) ? $archive_header : get_template_directory_uri() . '/assets/images/default-header.jpg';
    // }
    // elseif( is_search() ){ 
    //     $image_url = ( ! empty( $search_header) ) ? $search_header : get_template_directory_uri() . '/assets/images/default-header.jpg';
    // }
    // elseif( is_404() ) {
    //     $image_url = ( ! empty( $header_404) ) ? $header_404 : get_template_directory_uri() . '/assets/images/default-header.jpg';
    // }
    return $image_url;
}
endif;

if ( ! function_exists( 'superultra_posts_tags' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function superultra_posts_tags() {
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() && has_tag() ) { ?>
                <div class="tags-links">

                    <?php /* translators: used between list items, there is a space after the comma */
                    $tags = get_the_tags();
                    if ( $tags ) {

                        foreach ( $tags as $tag ) {
                            echo '<span><a href="' . esc_url( get_tag_link( $tag->term_id ) ) .'">' . esc_html( $tag->name ) . '</a></span>'; // WPCS: XSS OK.
                        }
                    } ?>
                </div><!-- .tags-links -->
        <?php } 
    }
endif;




