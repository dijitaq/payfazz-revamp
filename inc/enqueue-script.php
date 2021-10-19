<?php

/* Including CSS & JavaScript.
** link@ https://developer.wordpress.org/themes/basics/including-css-javascript/
**/
function add_enqueue_scripts() {
  // slick 
  //wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/slick/slick.min.css' );
  //wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/slick/slick.min.js', array ( 'jquery' ), 1.1, true );
  //wp_enqueue_script( 'action-slick', get_template_directory_uri() . '/assets/js/scripts-slider.js', array ( 'jquery' ), 1.1, true );
  // gsap and ScrollTrigger
  // wp_enqueue_script( 'gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.3.4/gsap.min.js', array(), 3.3, true );
  // wp_enqueue_script( 'scroll-trigger', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollTrigger/1.0.4/ScrollTrigger.min.js', array(), 1.0, true );
  // general
  wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css', array(),  wp_rand() );


  wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/main.bundle.js', array (), 1.1, true );
  wp_localize_script( 'scripts', 'ajaxobject', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'add_enqueue_scripts' );