<?php

/** -----------------------------------------------------------------------
 * Add Custom Meta Box: Section One
 * ----------------------------------------------------------------------- */
function masteragen_feature_section_one_add_custom_box() {
  add_meta_box(
    '_masteragen_feature_section_one_id',
    'Section One',
    'masteragen_feature_section_one_callback',
    'masteragen_feature',
    'normal',
    'low'
  );
}
add_action( 'add_meta_boxes', 'masteragen_feature_section_one_add_custom_box' );

function masteragen_feature_section_one_callback( $post ) { ?>
  <?php $desc = get_post_meta( $post->ID, 'masteragen_feature_section_one_desc', true ); ?>
  <?php $title = get_post_meta( $post->ID, 'masteragen_feature_section_one_title', true ); ?>
  <?php $image_id = get_post_meta( $post->ID, 'masteragen_feature_section_one_img_id', true ); ?>
  <table width="100%">
    <tr>
      <td width="30%" valign="top">
        <p><label for="masteragen_feature_section_one_img_id"><?php _e( 'Upload Image' ); ?></label></p>
        <?php if( $image_id ) : ?>
          <?php echo wp_get_attachment_image( $image_id, 'thumbnail', '', [ 'class' => 'img-220' ] ); ?>
        <?php else: ?>
          <div class="preview_image_media"></div>
        <?php endif; ?>
        <br>
        <button class="button botton_media" id="masteragen_feature_section_one_img_id"><?php _e( 'Upload Image' ); ?></button>
        <input type="hidden"  name="masteragen_feature_section_one_img_id" class="image_media_id" value="<?php echo $image_id; ?>"/>
      </td>
      <td valign="top">
        <p><label for="masteragen_feature_section_one_title"><?php _e( 'Title' ); ?></label></p>
        <input type="text" class="large-text" name="masteragen_feature_section_one_title" id="masteragen_feature_section_one_title" value="<?php echo esc_attr( $title ); ?>">
        <p><label for="masteragen_feature_section_one_desc"><?php _e( 'Description' ); ?></label></p>
        <textarea class="large-text" rows="3"  id="masteragen_feature_section_one_desc" name="masteragen_feature_section_one_desc"><?php echo esc_attr( $desc ); ?></textarea>
      </td>
    </tr>
  </table>
<?php }

function masteragen_feature_section_one_save_postdata( $post_id ) {
  if ( 
    array_key_exists( 'masteragen_feature_section_one_title', $_POST )  &&
    array_key_exists( 'masteragen_feature_section_one_desc', $_POST )  &&
    array_key_exists( 'masteragen_feature_section_one_img_id', $_POST )
  ) {
    $title = $_POST['masteragen_feature_section_one_title'];
    $desc = $_POST['masteragen_feature_section_one_desc'];
    $image_id = $_POST['masteragen_feature_section_one_img_id'];
    update_post_meta( $post_id, 'masteragen_feature_section_one_title', $title );
    update_post_meta( $post_id, 'masteragen_feature_section_one_desc', $desc );
    update_post_meta( $post_id, 'masteragen_feature_section_one_img_id', $image_id );
  }
}
add_action( 'save_post', 'masteragen_feature_section_one_save_postdata' );



/** -----------------------------------------------------------------------
 * Add Custom Meta Box: Section Two
 * ----------------------------------------------------------------------- */
function masteragen_feature_section_two_add_custom_box() {
  add_meta_box(
    'masteragen_feature_section_two_id',
    'Section Two',
    'masteragen_feature_section_two_callback',
    'masteragen_feature',
    'normal',
    'low'
  );
}
add_action( 'add_meta_boxes', 'masteragen_feature_section_two_add_custom_box' );

function masteragen_feature_section_two_callback( $post ) { ?>
  <?php $desc = get_post_meta( $post->ID, 'masteragen_feature_section_two_desc', true ); ?>
  <?php $title = get_post_meta( $post->ID, 'masteragen_feature_section_two_title', true ); ?>
  <?php $image_id = get_post_meta( $post->ID, 'masteragen_feature_section_two_img_id', true ); ?>
  <table width="100%">
    <tr>
      <td width="30%" valign="top">
        <p><label for="masteragen_feature_section_two_img_id"><?php _e( 'Upload Image' ); ?></label></p>
        <?php if( $image_id ) : ?>
          <?php echo wp_get_attachment_image( $image_id, 'thumbnail', '', [ 'class' => 'img-220' ] ); ?>
        <?php else: ?>
          <div class="preview_image_media"></div>
        <?php endif; ?>
        <br>
        <button class="button botton_media" id="masteragen_feature_section_two_img_id"><?php _e( 'Upload Image' ); ?></button>
        <input type="hidden"  name="masteragen_feature_section_two_img_id" class="image_media_id" value="<?php echo esc_attr( $image_id ); ?>"/>
      </td>
      <td valign="top">
        <p><label for="masteragen_feature_section_two_desc"><?php _e( 'Title' ); ?></label></p>
        <input type="text" class="large-text" name="masteragen_feature_section_two_title" id="masteragen_feature_section_two_title" value="<?php echo esc_attr( $title ); ?>">
        <p><label for="feature_section_two_desc"><?php _e( 'Description' ); ?></label></p>
        <textarea class="large-text" rows="3"  id="masteragen_feature_section_two_desc" name="masteragen_feature_section_two_desc"><?php echo esc_attr( $desc ); ?></textarea>
      </td>
    </tr>
  </table>
<?php }

function masteragen_feature_section_two_save_postdata( $post_id ) {
  if ( 
    array_key_exists( 'masteragen_feature_section_two_desc', $_POST )  &&
    array_key_exists( 'masteragen_feature_section_two_title', $_POST )  &&
    array_key_exists( 'masteragen_feature_section_two_img_id', $_POST )
  ) {
    $desc = $_POST['masteragen_feature_section_two_desc'];
    $title = $_POST['masteragen_feature_section_two_title'];
    $img_id = $_POST['masteragen_feature_section_two_img_id'];
    update_post_meta( $post_id, 'masteragen_feature_section_two_desc', $desc );
    update_post_meta( $post_id, 'masteragen_feature_section_two_title', $title );
    update_post_meta( $post_id, 'masteragen_feature_section_two_img_id', $img_id );
  }
}
add_action( 'save_post', 'masteragen_feature_section_two_save_postdata' );



/** -----------------------------------------------------------------------
 * Add Custom Meta Box: Show Banks List
 * ----------------------------------------------------------------------- */
function masteragen_feature_search_bank_metabox() {
  add_meta_box( '_masteragen_feature_search_bank_id', 'Show search Bank', 'masteragen_feature_search_bank_callback', 'masteragen_feature', 'side');
}
add_action( 'add_meta_boxes', 'masteragen_feature_search_bank_metabox' );

function masteragen_feature_search_bank_callback( $post ) { ?>
  <?php $value = get_post_meta( $post->ID, 'masteragen_feature_search_bank', true ); ?>
  <label for="masteragen_feature_search_bank_no">
    <input type="radio" id="masteragen_feature_search_bank_no" name="masteragen_feature_search_bank" value="0" <?php echo $value != '1' ? 'checked' : ''; ?>> No
  </label>
  <label for="feature_search_bank_yes">
    <input type="radio" id="masteragen_feature_search_bank_yes" name="masteragen_feature_search_bank" value="1" <?php echo $value == '1' ? 'checked' : ''; ?>> Yes
  </label>
  <br>
<?php }

function masteragen_feature_search_bank_save( $post_id ) {
  if ( array_key_exists( 'masteragen_feature_search_bank', $_POST ) ) {
    $value = $_POST['masteragen_feature_search_bank'];
    update_post_meta( $post_id, 'masteragen_feature_search_bank', $value );
  }
}
add_action( 'save_post', 'masteragen_feature_search_bank_save' );



/** -----------------------------------------------------------------------
 * Add Custom Meta Box: Show at Home
 * ----------------------------------------------------------------------- */
function masteragen_feature_show_at_home_metabox() {
  add_meta_box( '_masteragen__feature_shoaw_at_home_id', 'Show at home', 'masteragen_feature_show_at_home_callback', 'masteragen_feature', 'side');
}
add_action( 'add_meta_boxes', 'masteragen_feature_show_at_home_metabox' );

function masteragen_feature_show_at_home_callback( $post ) { ?>
  <?php $value = get_post_meta( $post->ID, 'masteragen_feature_show_at_home', true ); ?>
  <label for="masteragen_feature_show_at_home_no">
    <input type="radio" id="masteragen_feature_show_at_home_no" name="masteragen_feature_show_at_home" value="0" <?php echo $value != '1' ? 'checked' : ''; ?>> No
  </label>
  <label for="masteragen_feature_show_at_home_yes">
    <input type="radio" id="feature_show_at_home_yes" name="masteragen_feature_show_at_home" value="1" <?php echo $value == '1' ? 'checked' : ''; ?>> Yes
  </label>
<?php }

function masteragen_feature_show_at_home_save( $post_id ) {
  if ( array_key_exists( 'masteragen_feature_show_at_home', $_POST ) ) {
    $value = $_POST['masteragen_feature_show_at_home'];
    update_post_meta( $post_id, 'masteragen_feature_show_at_home', $value );
  }
}
add_action( 'save_post', 'masteragen_feature_show_at_home_save' );




/** -----------------------------------------------------------------------
 * Add Custom Meta Box: Section Profit
 * ----------------------------------------------------------------------- */
function masteragen_feature_profit_metabox(){
  add_meta_box( 
    '_masteragen_feature_profit_id', 
    'Section Profits', 
    'masteragen_feature_profit_callback', 
    'masteragen_feature', 
    'normal'
  );
}
add_action( 'add_meta_boxes', 'masteragen_feature_profit_metabox' );

  
function masteragen_feature_profit_callback( $post ){ ?>
  <?php $title = get_post_meta( $post->ID, 'masteragen_feature_profit_title', true ); ?>
  <?php $profits = get_post_meta( $post->ID, 'masteragen_feature_profit', true ); ?>

  <p><label for="masteragen_feature_profit_title"><?php _e( 'Title' ); ?></label></p>
  <p><input type="text" class="large-text" name="masteragen_feature_profit_title" id="masteragen_feature_profit_title" value="<?php echo esc_attr( $title ); ?>"></p>

  <style>
    #profit_items td {padding: 10px 0;border-top: 1px solid #ddd;}
  </style>
  <table width="100%" id="profit_items">
    <?php $number = 0; ?>
    <?php if ( $profits != '' ) : ?>
      <?php foreach( (array)$profits as $profit ) : ?>
        <?php if (isset( $profit['img_id'] ) || isset( $profit['title'] ) || isset( $profit['desc'] ) ) : ?>
            <tr style="border-top: 1px solid #eee">
              <td width="200">
                <?php if( $profit['img_id'] ) : ?>
                  <?php echo wp_get_attachment_image( $profit['img_id'], 'thumbnail', '', [ 'class' => 'img-220' ] ); ?>
                <?php else: ?>
                  <div class="preview_image_media"></div>
                <?php endif; ?>
                <br>
                <button class="button botton_media"><?php _e( 'Upload Image' ); ?></button>
                <input type="hidden" class="image_media_id" name="masteragen_feature_profit[<?php echo $number; ?>][img_id]" value="<?php echo esc_attr( $profit['img_id'] ); ?>"/>
              </td>
              <td>
                <label for="masteragen_feature_profit_title"> Title
                  <input type="text" class="large-text" id="masteragen_feature_profit_title" name="masteragen_feature_profit[<?php echo $number; ?>][title]"  value="<?php echo esc_attr( $profit['title'] ); ?>"/>
                </label>
                <br>
                <br>
                <label for="masteragen_feature_profit_desc"> Description
                  <textarea class="large-text" rows="3" for="masteragen_feature_profit_desc" name="masteragen_feature_profit[<?php echo $number; ?>][desc]"><?php echo esc_attr( $profit['desc'] ); ?></textarea>
                </label>
              </td>
              <td width="30">
                <button class="button button--remove">x</button>
              </td>
          </tr>
          <?php $number++; ?>
        <?php endif; ?>
      <?php endforeach; ?>
    <?php endif; ?>
  </table>
  <br>
  <hr>
  <button class="button button--add"><?php echo __('Add Field'); ?></button>
  <script>
    var $ =jQuery.noConflict();
        $(document).ready(function() {
        var count = <?php echo $number - 1; ?>; // substract 1 from $c
        $('body').on('click', '.button--add', function(e) {
            e.preventDefault();
            count = count + 1;
            $('#profit_items').append('<tr><td><div class="preview_image_media"></div><button class="button botton_media"><?php _e( 'Upload Image' ); ?></button><input type="hidden" class="image_media_id" name="masteragen_feature_profit[' + count + '][img_id]" value=""/></td><td><label for="masteragen_feature_profit_title"> Title<input type="text" class="large-text" id="masteragen_feature_profit_title" name="masteragen_feature_profit[' + count + '][title]" /></label><br><br><label for="masteragen_feature_profit_desc"> Description <textarea rows="3" class="large-text" name="masteragen_feature_profit[' + count + '][desc]"></textarea><label></td><td><button class="button button--remove">x</button></td></tr>');
            return false;
        });
        $('body').on('click', '.button--remove', function(e) {
          e.preventDefault();
          $(this).closest('tr').remove();
        });
    });
  </script>
  <style>#profit_items {list-style: none;}</style>
  <?php
}


function save_masteragen_feature_profit($post_id){ 
  // to prevent metadata or custom fields from disappearing... 
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
  return $post_id; 
  // OK, we're authenticated: we need to find and save the data
  if ( 
    isset( $_POST['masteragen_feature_profit_title'] ) || 
    isset( $_POST['masteragen_feature_profit'] )
  ){
    $title = $_POST['masteragen_feature_profit_title'];
    $data = $_POST['masteragen_feature_profit'];
    update_post_meta( $post_id, 'masteragen_feature_profit_title', $title );
    update_post_meta( $post_id, 'masteragen_feature_profit', $data );
  }else{
    delete_post_meta( $post_id, 'masteragen_feature_profit_title');
    delete_post_meta( $post_id, 'masteragen_feature_profit');
  }
} 
add_action( 'save_post', 'save_masteragen_feature_profit' );



/** -----------------------------------------------------------------------
 * Add Custom Meta Box: Call to Action
 * ----------------------------------------------------------------------- */
function masteragen_feature_cta_metabox() {
  add_meta_box(
    '_masteragen_feature_cta_id',
    'Call to Action',
    'masteragen_feature_cta_callback',
    'masteragen_feature',
    'normal',
    'low'
  );
}
add_action( 'add_meta_boxes', 'masteragen_feature_cta_metabox' );

function masteragen_feature_cta_callback( $post ) { ?>
  <?php $title = get_post_meta( $post->ID, 'masteragen_feature_cta_title', true ); ?>
  <?php $image_id = get_post_meta( $post->ID, 'masteragen_feature_cta_img_id', true ); ?>
  <table width="100%">
    <tr>
      <td width="30%" valign="top">
        <p><label for="masteragen_feature_cta_img_id"><?php _e( 'Upload Image' ); ?></label></p>
        <?php if( $image_id ) : ?>
          <?php echo wp_get_attachment_image( $image_id, 'thumbnail', '', [ 'class' => 'img-220' ] ); ?>
        <?php else: ?>
          <div class="preview_image_media"></div>
        <?php endif; ?>
        <br>
        <button class="button botton_media" id="masteragen_feature_cta_img_id"><?php _e( 'Upload Image' ); ?></button>
        <input type="hidden"  name="masteragen_feature_cta_img_id" class="image_media_id" value="<?php echo esc_attr( $image_id ); ?>"/>
      </td>
      <td valign="top">
        <p><label for="masteragen_feature_cta_title"><?php _e( 'Title' ); ?></label></p>
        <input type="text" class="large-text" name="masteragen_feature_cta_title" id="masteragen_feature_cta_title" value="<?php echo esc_attr( $title ); ?>">
      </td>
    </tr>
  </table>
<?php }

function masteragen_feature_cta_save_postdata( $post_id ) {
  if ( 
    array_key_exists( 'masteragen_feature_cta_title', $_POST )  &&
    array_key_exists( 'masteragen_feature_cta_img_id', $_POST )
  ) {
    $title = $_POST['masteragen_feature_cta_title'];
    $image_id = $_POST['masteragen_feature_cta_img_id'];
    update_post_meta( $post_id, 'masteragen_feature_cta_title', $title );
    update_post_meta( $post_id, 'masteragen_feature_cta_img_id', $image_id );
  }
}
add_action( 'save_post', 'masteragen_feature_cta_save_postdata' );