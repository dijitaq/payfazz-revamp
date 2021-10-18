<?php

/** -----------------------------------------------------------------------
 * Add Custom Meta Taxonomy: FAQ Category
 * 
 * {taxonomy_name}_add_form_fields
 * {taxonomy_name}_edit_form_fields
 * edited_{taxonomy_name}
 * create_{taxonomy_name}
 * ----------------------------------------------------------------------- */
add_action( 'masteragen_faq_category_add_form_fields', 'custom_masteragen_faq_category_add_form_fields', 10, 2 );
function custom_masteragen_faq_category_add_form_fields( $taxonomy ){ ?>
  <div class="form-field term-group">
    <label for="upload_image_btn">Icon</label>
    <div class="preview_image_media"></div>
    <input type="button" class="button botton_media" id="upload_image_btn" value="<?php _e( 'Upload Image' ); ?>">
    <input type="hidden" name="txt_upload_image" class="image_media_id" value="">
  </div>
<?php }

add_action( 'create_masteragen_faq_category', 'custom_create_masteragen_faq_category', 10, 2 );
add_action( 'edited_masteragen_faq_category', 'custom_create_masteragen_faq_category', 10, 2 );
function custom_create_masteragen_faq_category( $term_id, $tt_id ) {
  $image_id = $_POST['masteragen_faq_category_image'];
  if( isset( $_POST['masteragen_faq_category_image'] ) ){
    update_term_meta( $term_id, 'masteragen_faq_category_image', $image_id );
  } else {
    update_term_meta( $term_id, 'masteragen_faq_category_image', $image_id );
  }
}

add_action('masteragen_faq_category_edit_form_fields', 'custom_masteragen_faq_category_edit_form_fields', 10, 2);
function custom_masteragen_faq_category_edit_form_fields($term, $taxonomy) { 
  $image_id = get_term_meta( $term->term_id, 'masteragen_faq_category_image', true); ?>
  <tr class="form-field term-group-wrap">
    <th scope="row">
      <label for="upload_image_btn"><?php _e( 'Image', 'safecash' ); ?></label>
    </th>
    <td>
      <p>
        <?php if( $image_id ) : ?>
          <?php echo wp_get_attachment_image( $image_id, 'thumbnail' ); ?>
        <?php else: ?>
          <div class="preview_image_media"></div>
        <?php endif; ?>
        <br>
        <button class="button botton_media"><?php _e( 'Upload Image' ); ?></button>
        <input type="hidden" name="masteragen_faq_category_image" class="image_media_id" value="<?php echo esc_attr( $image_id ) ?>">
      </p>
    </td>
  </tr>
<?php }
