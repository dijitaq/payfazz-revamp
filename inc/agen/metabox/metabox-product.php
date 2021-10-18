<?php

/** -----------------------------------------------------------------------
 * Add Custom Meta Box: Show at Home
 * ----------------------------------------------------------------------- */
function agen_product_show_at_home_meta_box() {
  add_meta_box( 
    '_agen_product_shoaw_at_home_id', 
    'Shot at Home ', 
    'agen_product_show_at_home_callback', 
    'agen_product', 
    'side');
}
add_action( 'add_meta_boxes', 'agen_product_show_at_home_meta_box' );

function agen_product_show_at_home_callback( $post ) { ?>
  <?php $value = get_post_meta( $post->ID, 'agen_product_show_at_home', true ); ?>
  <label for="product_show_at_home">
    <input type="radio" id="agen_product_show_at_home" name="agen_product_show_at_home" value="0" <?php echo $value != '1' ? 'checked' : ''; ?>> No
  </label>
  <label for="agen_product_show_at_home">
    <input type="radio" id="agen_product_show_at_home" name="agen_product_show_at_home" value="1" <?php echo $value == '1' ? 'checked' : ''; ?>> Yes
  </label>
<?php }

function agen_product_show_at_home_save( $post_id ) {
  if ( array_key_exists( 'agen_product_show_at_home', $_POST ) ) {
    $value = $_POST['agen_product_show_at_home'];
    update_post_meta( $post_id, 'agen_product_show_at_home', $value );
  }
}
add_action( 'save_post', 'agen_product_show_at_home_save' );


/** -----------------------------------------------------------------------
 * Add Custom Meta Box: Icon
 * ----------------------------------------------------------------------- */
function product_meta_box() {
  add_meta_box( 
    '_agen_product_id', 
    'Icon', 
    'agen_product_callback', 
    'agen_product', 
    'side'
  );
}
add_action( 'add_meta_boxes', 'product_meta_box' );

function agen_product_callback( $post ) { ?>
  <?php $image_id = get_post_meta( $post->ID, 'agen_product_icon_id', true ); ?>
  
  <?php if( $image_id ) : ?>
    <?php echo wp_get_attachment_image( $image_id, 'full'); ?>
  <?php else: ?>
    <div class="preview_image_media"></div>
  <?php endif; ?>
  <br>
  <button class="button botton_media" id="agen_product_icon_id"><?php _e( 'Upload Image' ); ?></button>
  <input type="hidden"  name="agen_product_icon_id" class="image_media_id" value="<?php echo $image_id; ?>"/>
<?php }

function agen_product_save( $post_id ) {
  if ( array_key_exists( 'agen_product_icon_id', $_POST ) ) {
    $image_id = $_POST['agen_product_icon_id'];
    update_post_meta( $post_id, 'agen_product_icon_id', $image_id );
  }
}
add_action( 'save_post', 'agen_product_save' );



/** -----------------------------------------------------------------------
 * Add Custom Meta Box: Section Guide
 * ----------------------------------------------------------------------- */
function product_guide_metabox(){
  add_meta_box( 
    '_agen_product_guide_id', 
    'Guides', 
    'agen_product_guide_callback', 
    'agen_product', 
    'normal', 
    'low' 
  );
};
add_action( 'add_meta_boxes', 'product_guide_metabox' );

  
function agen_product_guide_callback( $post ){ ?>
  <?php $guides = get_post_meta( $post->ID, 'agen_product_guide', true ); ?>
  <?php $desc = get_post_meta( $post->ID, 'agen_product_guide_desc', true ); ?>

  <style>
    #guide_items td {padding: 10px 0;border-bottom: 1px solid #ddd;}
  </style>
  <label for="agen_product_guide_desc">Title</label>
  <input type="text" class="large-text" id="agen_product_guide_desc" name="agen_product_guide_desc" value="<?php echo $desc; ?>" />
  <br>
  <br>
  <hr>
  <table width="100%" id="guide_items">
    <?php $number = 0; ?>
    <?php if ( $guides != '' ) : ?>
      <?php foreach( (array)$guides as $guide ) : ?>
        <?php if (isset( $guide['img_id'] ) || isset( $guide['title'] ) || isset( $guide['desc'] ) ) : ?>
            <tr style="border-top: 1px solid #eee">
              <td width="200">
                <?php if( $guide['img_id'] ) : ?>
                  <?php echo wp_get_attachment_image( $guide['img_id'], 'thumbnail', '', [ 'class' => 'img-220' ] ); ?>
                <?php else: ?>
                  <div class="preview_image_media"></div>
                <?php endif; ?>
                <br>
                <button class="button botton_media"><?php _e( 'Upload Image' ); ?></button>
                <input type="hidden" class="image_media_id" name="agen_product_guide[<?php echo $number; ?>][img_id]" value="<?php echo esc_attr( $guide['img_id'] ); ?>"/>
              </td>
              <td>
                <input type="text" class="large-text" name="agen_product_guide[<?php echo $number; ?>][title]"  value="<?php echo esc_attr( $guide['title'] ); ?>"/>
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
  <button class="button button--add"><?php echo __('Add Field'); ?></button>
  <script>
    var $ =jQuery.noConflict();
        $(document).ready(function() {
        var count = <?php echo $number - 1; ?>; // substract 1 from $c
        $('body').on('click', '.button--add', function(e) {
            e.preventDefault();
            count = count + 1;
            $('#guide_items').append('<tr><td><div class="preview_image_media"></div><button class="button botton_media"><?php _e( 'Upload Image' ); ?></button><input type="hidden" class="image_media_id" name="agen_product_guide[' + count + '][img_id]" value=""/></td><td><input type="text" class="large-text" name="agen_product_guide[' + count + '][title]" /><td><button class="button button--remove">x</button></td></tr>');
            return false;
        });
        $('body').on('click', '.button--remove', function(e) {
          e.preventDefault();
          $(this).closest('tr').remove();
        });
    });
  </script>
  <style>#guide_items {list-style: none;}</style>
  <?php
}

function save_agen_product_guide( $post_id ){ 
  // to prevent metadata or custom fields from disappearing... 
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
  return $post_id; 
  // OK, we're authenticated: we need to find and save the data
  if ( isset( $_POST['agen_product_guide'] ) && isset( $_POST['agen_product_guide_desc'] ) ){
    $guide = $_POST['agen_product_guide'];
    $guide_desc = $_POST['agen_product_guide_desc'];
    update_post_meta( $post_id, 'agen_product_guide', $guide );
    update_post_meta( $post_id, 'agen_product_guide_desc', $guide_desc );
  }
} 
add_action( 'save_post', 'save_agen_product_guide' );