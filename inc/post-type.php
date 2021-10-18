<?php


/* Registers a post type.
** link@ https://developer.wordpress.org/reference/functions/register_post_type/
**/
// post type press 
function post_type_press() {
  $args = array(
    'label'            => __( 'Press Release' ),
    'supports'         => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    'taxonomies'       => array( 'press_categories', 'press_tag' ),
    'public'           => true,
    'has_archive'      => true,
    'menu_icon'        => 'dashicons-camera',
    'rewrite'          => array( 'slug' => 'press', 'with_front' => false ),
    'show_in_rest'     => true,
    'menu_position'    => 9
  );
  register_post_type( 'press', $args );

  $labels_tax_category = array(
    'name'               => _x( 'Categories', 'payfazz' ),
    'singular_name'      => _x( 'Categories', 'payfazz' ),
    'menu_name'          => __( 'Categories', 'payfazz' ),
  );

  $args_tax_category = array(
    'labels'             => $labels_tax_category,
    'rewrite'            => array( 'slug' => 'press-category', 'with_front' => false ),
    'hierarchical'       => true,
    'has_archive' 			 => true,
    'show_admin_column'  => true,
    'show_in_rest'       => true,
  );
  register_taxonomy( 'press_categories', array( 'press' ), $args_tax_category );

  $labels_tax_taq = array(
    'name'               => _x( 'Tags', 'payfazz' ),
    'singular_name'      => _x( 'Tags', 'payfazz' ),
    'menu_name'          => __( 'Tags', 'payfazz' ),
  );

  $args_tax_taq = array(
    'labels'             => $labels_tax_taq,
    'rewrite'            => array( 'slug' => 'press/tag', 'with_front' => false ),
    'hierarchical'       => false,
    'has_archive' 			 => true,
    'show_admin_column'  => true,
    'show_in_rest'       => true,
  );
  register_taxonomy( 'press_tag', array( 'press' ), $args_tax_taq );
}
add_action( 'init', 'post_type_press');


// post type alat promosi
function alat_promosi_post_type() {
  $args = array(
    'label'            => __( 'Alat Promosi' ),
    'supports'         => array( 'title', 'thumbnail' ),
    'taxonomies'       => array( 'ap_category' ),
    'public'           => true,
    'has_archive'      => true,
    'menu_icon'        => 'dashicons-megaphone',
    'rewrite'          => array( 'slug' => 'alat-promosi', 'with_front' => false ),
    'show_in_rest'     => true,
    'menu_position'    => 6
  );
  register_post_type( 'alat_promosi', $args );

  $labels = array(
		'name'              => _x( 'Categories', 'payfazz' ),
		'singular_name'     => _x( 'Category', 'payfazz' ),
    'menu_name'         => __( 'Categories', 'payfazz' ),
  );

  $args_tax = array(
    'labels'             => $labels,
    'hierarchical'       => true,
    'has_archive' 			 => false,
    'show_admin_column'  => true,
    'show_in_rest'       => true
  );
  register_taxonomy( 'ap_category', array( 'alat_promosi' ), $args_tax );
}
add_action( 'init', 'alat_promosi_post_type');


// post type fazztips 
function fazztips_post_type() {
  $args = array(
    'label'            => __( 'Fazztips' ),
    'supports'         => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'taxonomies'  		 => array( 'fazztips_type' ),
    'public'           => true,
    'has_archive'      => false,
    'menu_icon'        => 'dashicons-pressthis',
    'rewrite'          => array( 'slug' => 'fazztips', 'with_front' => false ),
    'show_in_rest'     => true,
    'menu_position'    => 7
  );
  register_post_type( 'fazztips', $args );

  $labels = array(
		'name'               => _x( 'Fazztips Categories', 'payfazz' ),
		'singular_name'      => _x( 'Categories', 'payfazz' ),
    'menu_name'          => __( 'Categories', 'payfazz' ),
  );

  $args_tax = array(
		'labels' 							=> $labels,
		'hierarchical' 				=> true,
		'has_archive' 				=> false,
		'show_admin_column'   => false,
		'show_in_rest'        => true,
  );
  register_taxonomy( 'fazztips_type', array( 'fazztips' ), $args_tax );
}
add_action( 'init', 'fazztips_post_type');


/** -----------------------------------------------------------------------
 * Create Custom Post Type: Testimoni
 * ----------------------------------------------------------------------- */
add_action( 'init', 'post_type_testimoni');
function post_type_testimoni() {
  $args = array(
    'label'               => __( 'Testimonials' ),
    'supports'            => array( 'title', 'thumbnail' ),
    'public'              => true,
    'exclude_from_search' => true,
    'show_in_admin_bar'   => false,
    'show_in_nav_menus'   => false,
    'publicly_queryable'  => false,
    'query_var'           => false,
    'has_archive'         => false,
    'menu_icon'           => 'dashicons-testimonial',
    'show_in_rest'        => false,
    'menu_position'       => 5
  );
  register_post_type( 'testimoni', $args );
}