<?php

/** -----------------------------------------------------------------------
 * Add Custom Meta Box: Testimoni
 * ----------------------------------------------------------------------- */
function testimoni_meta_box() {
  add_meta_box(
    '_testimoni_id',
    'Details',
    'testimoni_callback',
    'testimoni',
    'normal'
  );
}
add_action( 'add_meta_boxes', 'testimoni_meta_box' );

function testimoni_callback( $post ) { 
  // Add nonce for security and authentication.
  wp_nonce_field( 'testimoni_desc_nonce_action', 'testimoni_desc_nonce' );

  $desc = get_post_meta( $post->ID, 'testimoni_desc', true );
  $owner = get_post_meta( $post->ID, 'testimoni_owner', true ); ?>

  <label for="testimoni_desc">Message</label>
  <textarea class="large-text" rows="3"  name="testimoni_desc" id="testimoni_desc"><?php echo $desc; ?></textarea>
  <br/>
  <label for="testimoni_owner">Owner</label>
  <input type="text" name="testimoni_owner" class="large-text" id="testimoni_owner" value="<?php echo $owner; ?>"/>
<?php }

function testimoni_save( $post_id ) {
  // Add nonce for security and authentication.
  $nonce_name   = isset( $_POST['testimoni_desc_nonce'] ) ? $_POST['testimoni_desc_nonce'] : '';
  $nonce_action = 'testimoni_desc_nonce_action';

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

  if ( 
    array_key_exists( 'testimoni_owner', $_POST ) &&
    array_key_exists( 'testimoni_desc', $_POST ) 
  ) {
    $owner = $_POST['testimoni_owner'];
    $desc = $_POST['testimoni_desc'];
    update_post_meta( $post_id, 'testimoni_owner', $owner );
    update_post_meta( $post_id, 'testimoni_desc', $desc );
  }
}
add_action( 'save_post', 'testimoni_save' );


/** -----------------------------------------------------------------------
 * Add Custom Meta Box: Testimoni Product
 * ----------------------------------------------------------------------- */
function testimoni_product_meta_box() {
  add_meta_box(
    '_testimoni_product_id',
    'Produk',
    'testimoni_product_callback',
    'testimoni',
    'side'
  );
}
add_action( 'add_meta_boxes', 'testimoni_product_meta_box' );

function testimoni_product_callback( $post ) {
  // Add nonce for security and authentication.
  wp_nonce_field( 'testimoni_product_nonce_action', 'testimoni_product_nonce' );

  $product = get_post_meta( $post->ID, 'testimoni_product', true ); ?>
  <select name="testimoni_product" style="width: 100%;" id="testimoni_product">
    <option value="payfazz" <?php selected( $product, 'payfazz' ); ?>>Payfazz</option>
    <option value="payfazz-agen" <?php selected( $product, 'payfazz-agen' ); ?>>Payfazz Agen</option>
    <option value="payfazz-buku" <?php selected( $product, 'payfazz-buku' ); ?>>Payfazz Buku</option>
    <option value="payfazz-masteragen" <?php selected( $product, 'payfazz-masteragen' ); ?>>Payfazz Masteragen</option>
  </select>
<?php }

function testimoni_product_save( $post_id ) {
  // Add nonce for security and authentication.
  $nonce_name   = isset( $_POST['testimoni_product_nonce'] ) ? $_POST['testimoni_product_nonce'] : '';
  $nonce_action = 'testimoni_product_nonce_action';

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

  if ( array_key_exists( 'testimoni_product', $_POST ) ) {
    $owner = $_POST['testimoni_product'];
    update_post_meta( $post_id, 'testimoni_product', $owner );
  }
}
add_action( 'save_post', 'testimoni_product_save' );