<?php

/* Including CSS & JavaScript.
** link@ https://developer.wordpress.org/themes/basics/including-css-javascript/
**/
function add_enqueue_scripts( $the_query ) {
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
  wp_register_script( 'scripts', $directory . 'assets/js/main.bundle.js', array( ), $theme_version );

  wp_localize_script( 'scripts', 'ajaxobject', array( 
      'ajaxurl'       => admin_url( 'admin-ajax.php' ),
      'directory'     => $directory,
      'posts'         => json_encode( $the_query->query_vars ),
      'current_page'  => $the_query->query_vars['paged'] ? $the_query->query_vars['paged'] : 1,
      'max_page'      => $the_query->max_num_pages,
    )
  );

  wp_enqueue_script( 'scripts', '', '', '', true  );
}
add_action( 'wp_enqueue_scripts', 'add_enqueue_scripts' );


function ajax_load_more() {
    $args = json_decode( stripslashes( $_POST["query"] ), true );
    $args['paged'] = $_POST["page"] + 1; // we need next page to be loaded
    $args['posts_per_page'] = 4;
    $args['post_status'] = 'publish';

    query_posts( $args );

    var_dump( $_POST );

    if ( have_posts() ) :
      while( have_posts() ): the_post();
        get_template_part( 'template-parts/content', 'post' );
      endwhile;
    endif;

    wp_die();
}
add_action( 'wp_ajax_ajax_load_more', 'ajax_load_more' );
add_action(' wp_ajax_nopriv_ajax_load_more', 'ajax_load_more' );