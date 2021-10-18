<?php

/** -----------------------------------------------------------------------
 * Add Custom Meta Taxonomy: FAQ Category
 * ----------------------------------------------------------------------- */
add_action( 'agen_faq_category_add_form_fields', 'agen_faq_add_term_image', 10, 2 );
function agen_faq_add_term_image( $taxonomy ){ ?>
  <div class="form-field term-group">
    <label for="upload_image_btn">Icon</label>
    <div class="preview_image_media"></div>
    <input type="button" class="button botton_media" id="upload_image_btn" value="<?php _e( 'Upload Image' ); ?>">
    <input type="hidden" name="agen_faq_category_image" class="image_media_id" value="">
  </div>
<?php }

add_action( 'created_agen_faq_category', 'agen_faq_save_term_image', 10, 2 );
function agen_faq_save_term_image( $term_id, $tt_id ) {
  if( isset( $_POST['agen_faq_category_image'] ) && '' !== $_POST['agen_faq_category_image'] ){
    update_term_meta( $term_id, 'agen_faq_category_image', absint( $_POST['agen_faq_category_image'] ) );
  } else {
    update_term_meta( $term_id, 'agen_faq_category_image', '' );
  }
}

add_action( 'edited_agen_faq_category', 'agen_faq_update_image_upload', 10, 2 );
function agen_faq_update_image_upload($term_id, $tt_id) {
  if ( isset( $_POST['agen_faq_category_image'] ) ){
    $group = $_POST['agen_faq_category_image'];
    update_term_meta( $term_id, 'agen_faq_category_image', $group );
  }
}

add_action('agen_faq_category_edit_form_fields', 'agen_faq_edit_image_upload', 10, 2);
function agen_faq_edit_image_upload($term, $taxonomy) { 
  $image_id = get_term_meta( $term->term_id, 'agen_faq_category_image', true); ?>
  <tr class="form-field term-group-wrap">
    <th scope="row">
      <label for="upload_image_btn"><?php _e( 'Image', 'payfazzz' ); ?></label>
    </th>
    <td>
      <p>
        <?php if( $image_id ) : ?>
          <?php echo wp_get_attachment_image( $image_id, 'thumbnail' ); ?>
        <?php else: ?>
          <div class="preview_image_media"></div>
        <?php endif; ?>
        <button class="button botton_media"><?php _e( 'Upload Image' ); ?></button>
        <input type="hidden" name="agen_faq_category_image" class="image_media_id" value="<?php echo $image_id ?>">
      </p>
    </td>
  </tr>
<?php }
