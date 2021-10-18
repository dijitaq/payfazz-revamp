<?php

/** -----------------------------------------------------------------------
 * Add Custom Meta Box: Fazztips
 * ----------------------------------------------------------------------- */
function fazztips_embed_metabox() {
  add_meta_box(
    '_fazztips_embed_id',
    'Link Embed',
    'fazztips_embed_callback',
    'fazztips',
    'side', 
    'high'
  );
}
add_action( 'add_meta_boxes', 'fazztips_embed_metabox' );

function fazztips_embed_callback( $post ) { 
  // Add nonce for security and authentication.
  wp_nonce_field( 'fazztips_embed_nonce_action', 'fazztips_embed_nonce' );
  
  $embed = get_post_meta( $post->ID, 'fazztips_url_attachment_key', true );
  echo '<input type="text" class="large-text" name="fazztips_embed" id="fazztips_embed" value="' . $embed . '">';
}

function fazztips_embed_save( $post_id ) {
  // Add nonce for security and authentication.
  $nonce_name   = isset( $_POST['fazztips_embed_nonce'] ) ? $_POST['fazztips_embed_nonce'] : '';
  $nonce_action = 'fazztips_embed_nonce_action';

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

  if ( array_key_exists( 'fazztips_embed', $_POST ) ) {
    $sidebar = $_POST['fazztips_embed'];
    update_post_meta( $post_id, 'fazztips_url_attachment_key', $sidebar );
  }
}
add_action( 'save_post', 'fazztips_embed_save' );