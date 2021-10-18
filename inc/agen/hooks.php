<?php

/** -----------------------------------------------------------------------
 * Disable Guttenberg Editor in post type [agen] Product
 * ----------------------------------------------------------------------- */
function agen_disable_gutenberg( $current_status, $post_type ) {
  if ( $post_type === 'agen_product' ) return false;
  return $current_status;
}
add_filter( 'use_block_editor_for_post_type', 'agen_disable_gutenberg', 10, 2 );


/** -----------------------------------------------------------------------
 * Add button plus in sub menu
 * ----------------------------------------------------------------------- */
add_filter( 'template_include', 'add_template' );
function add_template( $template ) {

  // Agen 
  if ( is_tax('agen_blog_category' ) || is_tax('agen_blog_tag' ) ) {
    $template = get_template_directory() . '/taxonomy-agen_blog.php';
  }

  if ( is_tax('agen_faq_category') ) {
    $template = get_template_directory() . '/taxonomy-agen_faq_category.php';
  }

  // Masteragen
  if ( is_tax('masteragen_blog_category' ) || is_tax('masteragen_blog_tag' ) ) {
    $template = get_template_directory() . '/taxonomy-masteragen_blog.php';
  }

  if ( is_tax('masteragen_faq_category') ) {
    $template = get_template_directory() . '/taxonomy-masteragen_faq_category.php';
  }

  return $template;
}