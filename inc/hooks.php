<?php
function defer_parsing_of_js($url) {
  if (is_admin()) return $url; //don't break WP Admin
  if (false === strpos($url, '.js')) return $url;
  if (strpos($url, 'jquery.js')) return $url;
  return str_replace(' src', ' defer src', $url);
}
// add_filter('script_loader_tag', 'defer_parsing_of_js', 10);


/** -----------------------------------------------------------------------
 * Add description to menu
 * ----------------------------------------------------------------------- */
class Menu_With_Description extends WP_Bootstrap_Navwalker {
  function start_el( &$output, $item, $depth = 0, $args = NULL, $id = 0 ) {
      global $wp_query;
      $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
       
      $class_names = $value = '';

      $classes = empty( $item->classes ) ? array() : ( array ) $item->classes;

      $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
      $class_names = ' class="' . esc_attr( $class_names ) . '"';

      $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

      $attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
      $attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
      $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
      $attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

      $item_output = $args->before;
      $item_output .= '<a'. $attributes .'>';
      $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
      
      if ($item->description != "") {
        $item_output .= '<br /><span class="sub">' . $item->description . '</span>';
      }

      $item_output .= '</a>';
      $item_output .= $args->after;

      $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
}

/** -----------------------------------------------------------------------
 * Add button plus in sub menu
 * ----------------------------------------------------------------------- */
function add_button_sub_menu( $output, $item, $depth, $args ){
  //Only add class to 'top level' items on the 'primary' menu.
  if( 'header-payfazz' == $args->theme_location || 'masteragen-header' == $args->theme_location || 'agen-header' == $args->theme_location ){
    if (in_array("menu-item-has-children", $item->classes)) {
      $output .='<button [data-bs-toggle="popover"]><i class="icon-menu-arrow-down-white"></i></button>';
    }
  }
  return $output;
}
//add_filter( 'walker_nav_menu_start_el', 'add_button_sub_menu', 10, 4);


/** -----------------------------------------------------------------------
 * Excerpt Length
 * ----------------------------------------------------------------------- */
function custom_excerpt_length( $length ) {
  return 10;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
  return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


/** -----------------------------------------------------------------------
 * Set post views count using post meta
 * ----------------------------------------------------------------------- */
function custom_count_post_view( $postID ) {
  $countKey = '_meta_view_count';
  $count = get_post_meta( $postID, $countKey, true );
  if( $count == ''){
    $count = 0;
    delete_post_meta( $postID, $countKey );
    add_post_meta( $postID, $countKey, '0' );
  }else{
    $count++;
    update_post_meta( $postID, $countKey, $count );
  }
}

function custom_track_post_views ( $post_id ) {
  if ( !is_single() ) return;
  if ( empty ( $post_id ) ) {
    global $post;
    $post_id = $post->ID;    
  }
  custom_count_post_view( $post_id) ;
}
add_action( 'wp_head', 'custom_track_post_views');



/** -----------------------------------------------------------------------
 * Disable Guttenberg Editor in post type FAQ
 * ----------------------------------------------------------------------- */
function disable_gutenberg( $current_status, $post_type ) {
  if ( $post_type === 'page' ) return false;
  return $current_status;
}
add_filter( 'use_block_editor_for_post_type', 'disable_gutenberg', 10, 2 );



/** -----------------------------------------------------------------------
 * Add GA Script
 * ----------------------------------------------------------------------- */
function wpb_add_googleanalytics() { ?>
  <meta name="facebook-domain-verification" content="yr8q85qfnn8kqifmci2hn4tk09wmy0" />
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": "Payfazz",
      "url": "https://www.payfazz.com",
      "sameAs": [
        "https://www.facebook.com/payfazz",
        "https://www.instagram.com/payfazz",
        "https://www.linkedin.com/company/payfazz.com",
        "https://plus.google.com/114090640965833412466?hl=id"
      ]
    }
  </script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-74588494-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-74588494-1');
  </script>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-M55JM99');</script>
  <!-- End Google Tag Manager -->
<?php }
//add_action('wp_head', 'wpb_add_googleanalytics');