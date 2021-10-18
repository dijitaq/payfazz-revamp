<?php

/** -----------------------------------------------------------------------
 * Disable Guttenberg Editor in post type FAQ
 * ----------------------------------------------------------------------- */
add_filter( 'use_block_editor_for_post_type', 'masteragen_disable_gutenberg', 10, 2 );
function masteragen_disable_gutenberg( $current_status, $post_type ) {
  if ( $post_type === 'masteragen_faq' || $post_type === 'masteragen_feature' ) return false;
  return $current_status;
}