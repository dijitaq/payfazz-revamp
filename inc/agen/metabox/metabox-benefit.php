<?php

/** -----------------------------------------------------------------------
 * Add Custom Meta Box: Benefit
 * ----------------------------------------------------------------------- */
function agen_benefit_meta_box() {
  add_meta_box(
    '_agen_benefit_desc_id',
    'Description',
    'agen_benefit_callback',
    'agen_benefit',
    'normal'
  );
}
add_action( 'add_meta_boxes', 'agen_benefit_meta_box' );

function agen_benefit_callback( $post ) { ?>
  <?php $desc = get_post_meta( $post->ID, 'agen_benefit_desc', true ); ?>
  <textarea class="large-text" rows="2"  name="agen_benefit_desc" id="agen_benefit_desc"><?php echo $desc; ?></textarea>
<?php }

function agen_benefit_save( $post_id ) {
  if ( array_key_exists( 'agen_benefit_desc', $_POST ) ) {
    $desc = $_POST['agen_benefit_desc'];
    update_post_meta( $post_id, 'agen_benefit_desc', $desc );
  }
}
add_action( 'save_post', 'agen_benefit_save' );
