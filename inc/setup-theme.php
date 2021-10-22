<?php

/* Add theme support.
 * link@ https://developer.wordpress.org/reference/functions/add_theme_support/
**/
if ( ! function_exists( 'add_setup_theme' ) ) {
  function add_setup_theme() {
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'post-thumbnails' );

    //
    add_image_size( 'testimoni-thumbnail', 80, 80 );

    // sementara diremove, karen menimpulkan error dihalaman dashboard widget
    remove_theme_support( 'widgets-block-editor' );

    // https://developer.wordpress.org/reference/functions/add_post_type_support/
    add_post_type_support( 'page', 'excerpt' );

    load_theme_textdomain( 'payfazz', get_template_directory() . '/languages' );

    //https://developer.wordpress.org/themes/functionality/navigation-menus/
    register_nav_menus( array ( 
      'header-payfazz'            => __( 'Header Payfazz', 'payfazz' ),
      'footer-payfazz-primary'    => __( 'Footer Payfazz primary', 'payfazz' ),
      'footer-payfazz-secondary'  => __( 'Footer Payfazz secondary', 'payfazz' ),
      'garuda'                    => __( 'Header Garuda', 'payfazz' ),
      'masteragen-header'         => __( 'Header Masteragen', 'payfazz' ),
      'masteragen-footer'         => __( 'Footer Masteragen', 'payfazz' ),
      'agen-header'               => __( 'Header Agen', 'payfazz' ),
      'buku-header'               => __( 'Header Buku', 'payfazz' ),
      'buku-footer'               => __( 'Footer Buku', 'payfazz' ),
    ) );
  }
}
add_action( 'after_setup_theme', 'add_setup_theme' );