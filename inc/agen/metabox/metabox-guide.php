<?php

/** -----------------------------------------------------------------------
 * Add Custom Meta Box: Guide
 * ----------------------------------------------------------------------- */
function guide_meta_box() {
  add_meta_box(
    '_agen_guide_desc_id',
    'Description',
    'agen_guide_callback',
    'agen_guide',
    'normal'
  );
}
add_action( 'add_meta_boxes', 'guide_meta_box' );

function agen_guide_callback( $post ) { ?>
  <?php $desc = get_post_meta( $post->ID, 'agen_guide_desc', true ); ?>
  <textarea class="large-text" rows="2"  name="agen_guide_desc" id="agen_guide_desc"><?php echo $desc; ?></textarea>
<?php }

function agen_guide_save( $post_id ) {
  if ( array_key_exists( 'agen_guide_desc', $_POST ) ) {
    $desc = $_POST['agen_guide_desc'];
    update_post_meta( $post_id, 'agen_guide_desc', $desc );
  }
}
add_action( 'save_post', 'agen_guide_save' );