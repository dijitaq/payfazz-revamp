<?php

/* Registers a post type.
** link@ https://developer.wordpress.org/reference/functions/register_post_type/
**/

/** -----------------------------------------------------------------------
 * Create Custom Post Type: Blog
 * ----------------------------------------------------------------------- */
add_action( 'init', 'buku_blog_post_type');
function buku_blog_post_type() {
  $args = array(
    'label'            => __( 'Buku Blog' ),
    'supports'         => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author' ),
    'taxonomies'       => array( 'buku_blog_category', 'buku_blog_tag' ),
    'public'           => true,
    'has_archive'      => true,
    'menu_icon'        => 'dashicons-book',
    'rewrite'          => array( 'slug' => 'buku-blog', 'with_front' => false ),
    'show_in_rest'     => true,
    'menu_position'    => 40
  );
  register_post_type( 'buku_blog', $args );

  // Taxonomy Category
  $labels = array(
		'name'              => _x( 'Categories', 'payfazz' ),
		'singular_name'     => _x( 'Category', 'payfazz' ),
    'menu_name'         => __( 'Categories', 'payfazz' ),
  );

  $args_tax = array(
    'labels'             => $labels,
    'rewrite'            => array( 'slug' => 'buku-category', 'with_front' => false ),
    'hierarchical'       => true,
    'show_admin_column'  => true,
    'show_in_rest'       => true,
  );
  register_taxonomy( 'buku_blog_category', array( 'buku_blog' ), $args_tax );


  // Taxonomy Tag
  $tag_labels = array(
		'name'              => _x( 'Tags', 'payfazz' ),
		'singular_name'     => _x( 'Tag', 'payfazz' ),
    'menu_name'         => __( 'Tag', 'payfazz' ),
  );

  $tag_args_tax = array(
    'labels'             => $tag_labels,
    'rewrite'            => array( 'slug' => 'buku-tag', 'with_front' => false ),
    'hierarchical'       => false,
    'show_admin_column'  => true,
    'show_in_rest'       => true,
  );
  register_taxonomy( 'buku_blog_tag', array( 'buku_blog' ), $tag_args_tax );
}



/** -----------------------------------------------------------------------
 * Create Custom Post Type: FAQ
 * ----------------------------------------------------------------------- */
add_action( 'init', 'post_type_buku_faq');
function post_type_buku_faq() {
  $args = array(
    'label'            => __( 'Buku FAQ' ),
    'supports'         => array( 'title', 'editor', ),
    'public'           => true,
    'has_archive'      => true,
    'menu_icon'        => 'dashicons-book',
    'rewrite'          => array( 'slug' => 'buku-faq', 'with_front' => false ),
    'show_in_rest'     => true,
    'menu_position'    => 40
  );
  register_post_type( 'buku_faq', $args );

  // Taxonomy
  $labels = array(
    'name'               => _x( 'Categories', 'category', 'payfazz' ),
    'singular_name'      => _x( 'Category', 'category', 'payfazz' ),
    'menu_name'          => __( 'Category', 'payfazz' ),
  );

  $arg_taxonomy = array(
    'labels'             => $labels,
    'rewrite'            => array( 'slug' => 'buku-buku-category', 'with_front' => false ),
    'hierarchical'       => true,
    'show_admin_column'  => true,
    'show_in_rest'       => true,
  );
  register_taxonomy( 'buku_faq_category', array( 'buku_faq' ), $arg_taxonomy );
}