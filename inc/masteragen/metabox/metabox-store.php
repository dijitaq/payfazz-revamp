<?php

/** -----------------------------------------------------------------------
 * Add Custom Meta Box: Address
 * ----------------------------------------------------------------------- */
function store_address_metabox() {
  add_meta_box(
    '_masteragen_store_attr_id',
    'Details',
    'masteragen_store_address_callback',
    'store',
  );
}
add_action( 'add_meta_boxes', 'store_address_metabox' );

function masteragen_store_address_callback( $post ) { ?>
  <?php $distance = get_post_meta( $post->ID, 'masteragen_store_distance', true ); ?>
  <?php $type = get_post_meta( $post->ID, 'masteragen_store_type', true ); ?>
  <?php $address = get_post_meta( $post->ID, 'masteragen_store_address', true ); ?>
  <table width="100%">
    <tr>
      <td>
        <label for="masteragen_store_distance"><?php _e( 'Distance', 'payfazz' ); ?></label>
        <input type="text" class="large-text" name="masteragen_store_distance" id="masteragen_store_distance" value="<?php echo $distance; ?>">
      </td>
      <td>
        <label for="masteragen_store_type"><?php _e( 'Type', 'payfazz' ); ?></label>
        <input type="text" class="large-text" name="masteragen_store_type" id="masteragen_store_type" value="<?php echo $type; ?>">
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <label for="masteragen_store_address"><?php _e( 'Address', 'payfazz' ); ?></label>
        <textarea class="large-text" rows="2"  name="masteragen_store_address" id="masteragen_store_address"><?php echo $address; ?></textarea>
      </td>
    </tr>
  </table>
<?php }

function masteragen_store_address_save( $post_id ) {
  if ( 
    array_key_exists( 'masteragen_store_distance', $_POST ) &&
    array_key_exists( 'masteragen_store_type', $_POST ) &&
    array_key_exists( 'masteragen_store_address', $_POST )
  ) {
    $distance = $_POST['masteragen_store_distance'];
    $type = $_POST['masteragen_store_type'];
    $sidebar = $_POST['masteragen_store_address'];
    
    update_post_meta( $post_id, 'masteragen_store_distance', $distance );
    update_post_meta( $post_id, 'masteragen_store_type', $type );
    update_post_meta( $post_id, 'masteragen_store_address', $sidebar );
  }
}
add_action( 'save_post', 'masteragen_store_address_save' );