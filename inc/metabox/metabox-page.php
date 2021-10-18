<?php

/** -----------------------------------------------------------------------
 * Add Custom Meta Box: Sidebar
 * ----------------------------------------------------------------------- */
function page_sidebar_meta_box() {
  add_meta_box(
    '_page_sidebar_id',
    'Sidebar',
    'page_sidebar_callback',
    'page',
    'normal', 
    'high'
  );
}
add_action( 'add_meta_boxes', 'page_sidebar_meta_box' );

function page_sidebar_callback( $post ) { 
  // Add nonce for security and authentication.
  wp_nonce_field( 'page_sidebar_nonce_action', 'page_sidebar_nonce' );
  
  $sidebar = get_post_meta( $post->ID, 'page_sidebar', true );
  $args = array ( 
    'textarea_rows' => 5,
    'media_buttons' => false,
    'tinymce'       => true,
   );
  wp_editor( $sidebar, 'page_sidebar', $args );
}

function page_sidebar_save( $post_id ) {
  // Add nonce for security and authentication.
  $nonce_name   = isset( $_POST['page_sidebar_nonce'] ) ? $_POST['page_sidebar_nonce'] : '';
  $nonce_action = 'page_sidebar_nonce_action';

  // Check if nonce is valid.
  if ( ! wp_verify_nonce( $nonce_name, $nonce_action ) ) {
    return;
  }

  // Check if user has permissions to save data.
  if ( ! current_user_can( 'edit_post', $post_id ) ) {
    return;
  }

  // Check if not an autosave.
  if ( wp_is_post_autosave( $post_id ) ) {
    return;
  }

  // Check if not a revision.
  if ( wp_is_post_revision( $post_id ) ) {
    return;
  }

  if ( array_key_exists( 'page_sidebar', $_POST ) ) {
    $sidebar = $_POST['page_sidebar'];
    update_post_meta( $post_id, 'page_sidebar', $sidebar );
  }
}
add_action( 'save_post', 'page_sidebar_save' );