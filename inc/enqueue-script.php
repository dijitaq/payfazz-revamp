<?php

/* Including CSS & JavaScript.
** link@ https://developer.wordpress.org/themes/basics/including-css-javascript/
**/
function add_enqueue_scripts() {
  $theme_version = wp_get_theme()->get( 'Version' );

  // slick 
  //wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/slick/slick.min.css' );
  //wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/slick/slick.min.js', array ( 'jquery' ), 1.1, true );
  //wp_enqueue_script( 'action-slick', get_template_directory_uri() . '/assets/js/scripts-slider.js', array ( 'jquery' ), 1.1, true );
  // gsap and ScrollTrigger
  // wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.4/gsap.min.js', array(), 3.3, true );
  // wp_enqueue_script( 'scroll-trigger', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollTrigger/1.0.4/ScrollTrigger.min.js', array(), 1.0, true );
  // general
  $directory = trailingslashit( get_template_directory_uri() );

  //
  wp_enqueue_style( 'main', $directory . 'assets/css/main.css', array(), $theme_version, 'all' );

  //
  wp_enqueue_script( 'add-ajaxobject' );
  wp_enqueue_script( 'scripts', $directory . 'assets/js/main.bundle.js', array(), $theme_version, true  );

  //
  $url = $directory . 'assets/json/payfazz-suites-15fps-2880.json';

  $request = wp_remote_get( $url, array( 'sslverify' => FALSE ) );

  if ( is_wp_error( $request ) ) {
      return false; // Bail early
  }

  //
  $body = wp_remote_retrieve_body( $request );
  $json = utf8_encode( $body );
  $data = json_decode( $json );

  wp_localize_script( 'scripts', 'ajaxobject', array( 
      'ajaxurl' => admin_url( 'admin-ajax.php' ),
      'data' => $data
    )
  );
}
add_action( 'wp_enqueue_scripts', 'add_enqueue_scripts' );