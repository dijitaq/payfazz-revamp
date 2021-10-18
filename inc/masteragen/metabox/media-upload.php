<?php

/** -----------------------------------------------------------------------
 * Add Custom Meta Box: Script Upload Media
 * ----------------------------------------------------------------------- */
function masteragen_upload_media_script() {
  if ( ! did_action( 'wp_enqueue_media' ) ) {
    wp_enqueue_media();
  }
  wp_enqueue_script( 'admin-scripts-media-upload', get_stylesheet_directory_uri() . '/assets/js/masteragen/admin-scripts-media-upload.js', array( 'jquery' ), null, false );
}
add_action( 'admin_enqueue_scripts', 'masteragen_upload_media_script' );



/** -----------------------------------------------------------------------
 * Add Custom Meta Box: Style Image Resposive Upload Media
 * ----------------------------------------------------------------------- */
function masteragen_admin_style() {
  echo '<style>
    .img-220 {
      max-width: 220px;
      height: auto;
    } 
  </style>';
}
add_action('admin_head', 'masteragen_admin_style');