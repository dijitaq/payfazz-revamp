<?php

class Masteragen_Setting_Profile
{
  public function __construct() {
    //call register settings function
    add_action( 'admin_init', array ( $this, 'register_link_profile' ) );
  }


  /**
   * Registers a new settings variable.
   */
  public function register_link_profile() {
    register_setting( 'masteragen-profile-link-group', 'masteragen_link_facebook' );  
    register_setting( 'masteragen-profile-link-group', 'masteragen_link_twitter' );  
    register_setting( 'masteragen-profile-link-group', 'masteragen_link_instagram' );  
    register_setting( 'masteragen-profile-link-group', 'masteragen_link_linkedin' );  
    register_setting( 'masteragen-profile-link-group', 'masteragen_link_youtube' );  
    register_setting( 'masteragen-profile-link-group', 'masteragen_link_app_donwload' );  
  }

  
  /**
   * Rendering page profile.
   */
  public function render_form() { ?>
    <form method="post" action="options.php">
      <?php settings_fields( 'masteragen-profile-link-group' ); ?>
      <?php do_settings_sections( 'masteragen-profile-link-group' ); ?>
      <table class="form-table">
        <tr valign="top">
          <th scope="row">Facebook Link</th>
          <td><input type="url" name="masteragen_link_facebook" value="<?php echo esc_attr( get_option('masteragen_link_facebook') ); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Twitter Link</th>
          <td><input type="url" name="masteragen_link_twitter" value="<?php echo esc_attr( get_option('masteragen_link_twitter') ); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Linkedin Link</th>
          <td><input type="url" name="masteragen_link_linkedin" value="<?php echo esc_attr( get_option('masteragen_link_linkedin') ); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Instagram Link</th>
          <td><input type="url" name="masteragen_link_instagram" value="<?php echo esc_attr( get_option('masteragen_link_instagram') ); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Youtube Link</th>
          <td><input type="url" name="masteragen_link_youtube" value="<?php echo esc_attr( get_option('masteragen_link_youtube') ); ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Download App Link</th>
          <td><input type="url" name="masteragen_link_app_donwload" value="<?php echo esc_attr( get_option('masteragen_link_app_donwload') ); ?>" /></td>
        </tr>
      </table>
      <?php submit_button(); ?>
    </form>
    <?php
  }

}

