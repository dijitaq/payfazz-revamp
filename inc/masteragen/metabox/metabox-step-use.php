<?php

/** -----------------------------------------------------------------------
 * Add Custom Meta Box: Step Use
 * ----------------------------------------------------------------------- */
function masteragen_step_use_metabox() {
  add_meta_box(
    '_masteragen_step_use_meta_id',
    'Details',
    'masteragen_step_use_callback',
    'masteragen_step_use',
    'normal'
  );
}
add_action( 'add_meta_boxes', 'masteragen_step_use_metabox' );

function masteragen_step_use_callback( $post ) { ?>
  <?php $num = get_post_meta( $post->ID, 'masteragen_step_use_no', true ); ?>
  <?php $desc = get_post_meta( $post->ID, 'masteragen_step_use_desc', true ); ?>
  <table width="100%">
    <tr>
      <td>
        <label for="masteragen_step_use_no"><?php _e( 'No.', 'payfazz' ); ?></label>
        <input type="text" class="large-text" name="masteragen_step_use_no" id="masteragen_step_use_no" value="<?php echo $num; ?>">
      </td>
    </tr>
    <tr>
      <td>
        <label for="masteragen_step_use_desc"><?php _e( 'Description', 'payfazz' ); ?></label>
        <textarea class="large-text" rows="2"  name="masteragen_step_use_desc" id="masteragen_step_use_desc"><?php echo $desc; ?></textarea>
      </td>
    </tr>
  </table>
<?php }

function masteragen_step_use_save( $post_id ) {
  if ( 
    array_key_exists( 'masteragen_step_use_no', $_POST ) &&
    array_key_exists( 'masteragen_step_use_desc', $_POST )
  ) {
    $distance = $_POST['masteragen_step_use_no'];
    $type = $_POST['masteragen_step_use_desc'];
    update_post_meta( $post_id, 'masteragen_step_use_no', $distance );
    update_post_meta( $post_id, 'masteragen_step_use_desc', $type );
  }
}
add_action( 'save_post', 'masteragen_step_use_save' );