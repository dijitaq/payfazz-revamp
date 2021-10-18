<?php

/* Registers a post type.
** link@ https://developer.wordpress.org/reference/functions/register_post_type/
**/


/** -----------------------------------------------------------------------
 * Create Custom Post Type: Blog
 * ----------------------------------------------------------------------- */
add_action( 'init', 'masteragen_blog_post_type');
function masteragen_blog_post_type() {
  $args = array(
    'label'            => __( 'Master Blog' ),
    'supports'         => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author' ),
    'taxonomies'       => array( 'masteragen_blog_category', 'masteragen_blog_tag' ),
    'public'           => true,
    'has_archive'      => true,
    'menu_icon'        => 'dashicons-superhero',
    'rewrite'          => array( 'slug' => 'masteragen-blog', 'with_front' => false ),
    'show_in_rest'     => true,
    'menu_position'    => 35
  );
  register_post_type( 'masteragen_blog', $args );

  // Taxonomy Category
  $labels = array(
		'name'              => _x( 'Categories', 'payfazz' ),
		'singular_name'     => _x( 'Category', 'payfazz' ),
    'menu_name'         => __( 'Categories', 'payfazz' ),
  );

  $args_tax = array(
    'labels'             => $labels,
    'rewrite'            => array( 'slug' => 'masteragen-blog-category', 'with_front' => false ),
    'hierarchical'       => true,
    'show_admin_column'  => true,
    'show_in_rest'       => true,
  );
  register_taxonomy( 'masteragen_blog_category', array( 'masteragen_blog' ), $args_tax );


  // Taxonomy Tag
  $tag_labels = array(
		'name'              => _x( 'Tags', 'payfazz' ),
		'singular_name'     => _x( 'Tag', 'payfazz' ),
    'menu_name'         => __( 'Tags', 'payfazz' ),
  );

  $tag_args_tax = array(
    'labels'             => $tag_labels,
    'rewrite'            => array( 'slug' => 'masteragen-blog-tag', 'with_front' => false ),
    'hierarchical'       => false,
    'show_admin_column'  => true,
    'show_in_rest'       => true,
  );
  register_taxonomy( 'masteragen_blog_tag', array( 'masteragen_blog' ), $tag_args_tax );
}



/** -----------------------------------------------------------------------
 * Create Custom Post Type: Feature
 * ----------------------------------------------------------------------- */
add_action( 'init', 'masteragen_feature_post_type');
function masteragen_feature_post_type() {
  $args = array(
    'label'            => __( 'Master Features' ),
    'supports'         => array( 'title', 'excerpt', 'thumbnail' ),
    'taxonomies'       => array( 'masteragen_feature_category' ),
    'public'           => true,
    'has_archive'      => true,
    'menu_icon'        => 'dashicons-superhero',
    'rewrite'          => array( 'slug' => 'masteragen-feature', 'with_front' => false ),
    'show_in_rest'     => true,
    'menu_position'    => 35
  );
  register_post_type( 'masteragen_feature', $args );

  // Taxonomy
  $labels = array(
		'name'              => _x( 'Category', 'payfazz' ),
		'singular_name'     => _x( 'Category', 'payfazz' ),
    'menu_name'         => __( 'Categories', 'payfazz' ),
  );

  $args_tax = array(
    'labels'             => $labels,
    'hierarchical'       => true,
    'show_admin_column'  => true,
    'show_in_rest'       => true,
  );
  register_taxonomy( 'masteragen_feature_category', array( 'masteragen_feature' ), $args_tax );
}



/** -----------------------------------------------------------------------
 * Create Custom Post Type: FAQ
 * ----------------------------------------------------------------------- */
add_action( 'init', 'masteragen_post_type_faq');
function masteragen_post_type_faq() {
  $args = array(
    'label'            => __( 'Master FAQ' ),
    'supports'         => array( 'title', 'editor'  ),
    'taxonomies'       => array( 'masteragen_faq_category' ),
    'public'           => true,
    'has_archive'      => true,
    'menu_icon'        => 'dashicons-superhero',
    'rewrite'          => array( 'slug' => 'masteragen-faq', 'with_front' => false ),
    'show_in_rest'     => true,
    'menu_position'    => 35
  );
  register_post_type( 'masteragen_faq', $args );

  // Taxonomy
  $arg_taxonomy = array(
    'labels'             => __( 'Categories' ),
    'rewrite'            => array( 'slug' => 'masteragen-faq-category', 'with_front' => false ),
    'hierarchical'       => true,
    'show_admin_column'  => true,
    'show_in_rest'       => true,
  );
  register_taxonomy( 'masteragen_faq_category', array( 'masteragen_faq' ), $arg_taxonomy );
}



/** -----------------------------------------------------------------------
 * Create Custom Post Type: Bank
 * ----------------------------------------------------------------------- */
add_action( 'init', 'masteragen_post_type_bank');
function masteragen_post_type_bank() {
  $args = array(
    'label'               => __( 'Master Banks' ),
    'supports'            => array( 'title', 'thumbnail' ),
    'public'              => true,
    'publicly_queryable'  => false,
    'has_archive'         => false,
    'menu_icon'           => 'dashicons-superhero',
    'show_in_rest'        => false,
    'menu_position'       => 35
  );
  register_post_type( 'masteragen_bank', $args );
}



/** -----------------------------------------------------------------------
 * Create Custom Post Type: How To Use
 * ----------------------------------------------------------------------- */
add_action( 'init', 'masteragen_post_type_step_use');
function masteragen_post_type_step_use() {
  $args = array(
    'label'               => __( 'Master Step Use' ),
    'supports'            => array( 'title', 'thumbnail' ),
    'public'              => true,
    'has_archive'         => false,
    'menu_icon'           => 'dashicons-superhero',
    'exclude_from_search' => true,
    'show_in_admin_bar'   => false,
    'show_in_nav_menus'   => false,
    'publicly_queryable'  => false,
    'query_var'           => false,
    'show_in_rest'        => false,
    'menu_position'       => 35
  );
  register_post_type( 'masteragen_step_use', $args );
}



/** -----------------------------------------------------------------------
 * Create Custom Post Type: Store
 * ----------------------------------------------------------------------- */
add_action( 'init', 'masteragen_post_type_store');
function masteragen_post_type_store() {
  $args = array(
    'label'               => __( 'Master Stores' ),
    'supports'            => array( 'title' ),
    'taxonomies'          => array( 'masteragen_store_region' ),
    'public'              => true,
    'exclude_from_search' => true,
    'has_archive'         => false,
    'menu_icon'           => 'dashicons-superhero',
    'show_in_rest'        => false,
    'menu_position'       => 35
  );
  register_post_type( 'masteragen_store', $args );

  // Taxonomy
  $labels = array(
    'name'               => _x( 'Regions', 'region', 'payfazz' ),
    'singular_name'      => _x( 'Region', 'region', 'payfazz' ),
  );

  $arg_taxonomy = array(
    'labels'             => $labels,
    'hierarchical'       => false,
    'show_admin_column'  => true,
    'show_in_rest'       => true,
  );
  register_taxonomy( 'masteragen_store_region', array( 'masteragen_store' ), $arg_taxonomy );
}