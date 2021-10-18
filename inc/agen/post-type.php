<?php

/* Registers a post type.
** link@ https://developer.wordpress.org/reference/functions/register_post_type/
**/

/** -----------------------------------------------------------------------
 * Create Custom Post Type: Product
 * ----------------------------------------------------------------------- */
add_action( 'init', 'post_type_agen_product');
function post_type_agen_product() {
  $args = array(
    'label'            => __( 'Agen Products' ),
    'supports'         => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
    'public'           => true,
    'has_archive'      => true,
    'menu_icon'        => 'dashicons-superhero-alt',
    'rewrite'          => array( 'slug' => 'agen-product', 'with_front' => false ),
    'show_in_rest'     => true,
    'menu_position'    => 25
  );
  register_post_type( 'agen_product', $args );

  // Taxonomy
  $labels = array(
    'name'               => _x( 'Categories', 'category', 'payfazz' ),
    'singular_name'      => _x( 'Category', 'category', 'payfazz' ),
  );

  $arg_taxonomy = array(
    'labels'             => $labels,
    'hierarchical'       => true,
    'show_admin_column'  => true,
    'show_in_rest'       => true,
  );
  register_taxonomy( 'agen_product_category', array( 'agen_product' ), $arg_taxonomy );
}

/** -----------------------------------------------------------------------
 * Create Custom Post Type: FAQ
 * ----------------------------------------------------------------------- */
add_action( 'init', 'post_type_agen_faq');
function post_type_agen_faq() {
  $args = array(
    'label'            => __( 'Agen FAQs' ),
    'supports'         => array( 'title', 'editor', ),
    'public'           => true,
    'has_archive'      => true,
    'menu_icon'        => 'dashicons-superhero-alt',
    'rewrite'          => array( 'slug' => 'agen-faq', 'with_front' => false ),
    'show_in_rest'     => true,
    'menu_position'    => 25
  );
  register_post_type( 'agen_faq', $args );

  // Taxonomy
  $labels = array(
    'name'               => _x( 'Categories', 'category', 'payfazz' ),
    'singular_name'      => _x( 'Category', 'category', 'payfazz' ),
  );

  $arg_taxonomy = array(
    'labels'             => $labels,
    'rewrite'            => array( 'slug' => 'agen-faq-category', 'with_front' => false ),
    'hierarchical'       => true,
    'show_admin_column'  => true,
    'show_in_rest'       => true,
  );
  register_taxonomy( 'agen_faq_category', array( 'agen_faq' ), $arg_taxonomy );
}


/** -----------------------------------------------------------------------
 * Create Custom Post Type: Benefit
 * ----------------------------------------------------------------------- */
add_action( 'init', 'post_type_agen_benefit');
function post_type_agen_benefit() {
  $args = array(
    'label'               => __( 'Agen Benefits' ),
    'supports'            => array( 'title', 'thumbnail' ),
    'public'              => true,
    'exclude_from_search' => true,
    'show_in_admin_bar'   => false,
    'show_in_nav_menus'   => false,
    'publicly_queryable'  => false,
    'query_var'           => false,
    'has_archive'         => false,
    'menu_icon'           => 'dashicons-superhero-alt',
    'show_in_rest'        => false,
    'menu_position'       => 25
  );
  register_post_type( 'agen_benefit', $args );
}



/** -----------------------------------------------------------------------
 * Create Custom Post Type: Guide
 * ----------------------------------------------------------------------- */
add_action( 'init', 'post_type_agen_guide');
function post_type_agen_guide() {
  $args = array(
    'label'               => __( 'Agen Guides' ),
    'supports'            => array( 'title', 'thumbnail' ),
    'public'              => true,
    'exclude_from_search' => true,
    'show_in_admin_bar'   => false,
    'show_in_nav_menus'   => false,
    'publicly_queryable'  => false,
    'query_var'           => false,
    'has_archive'         => false,
    'menu_icon'           => 'dashicons-superhero-alt',
    'show_in_rest'        => false,
    'menu_position'       => 25
  );
  register_post_type( 'agen_guide', $args );
}