<?php

require_once( get_template_directory() . '/inc/settings/payfazz-setting-profile-class.php' );
require_once( get_template_directory() . '/inc/settings/agen-setting-profile-class.php' );
require_once( get_template_directory() . '/inc/settings/buku-setting-profile-class.php' );
require_once( get_template_directory() . '/inc/settings/masteragen-setting-profile-class.php' );

if ( ! class_exists( 'Payfazz_Setting' ) ) {

  class Payfazz_Setting
  {
    private $page_title = 'Payfazz';
    private $menu_title = 'Payfazz Settings';
    private $capability = 'manage_options';
    private $menu_slug  = 'payfazz_settings';
    private $position   = 10;

    static  $instance;
    private $agen_profile_setting;
    private $buku_profile_setting;
    private $payfazz_profile_setting;
    private $masteragen_profile_setting;

    public function __construct() {
      // initial setting profile class
      $this->agen_profile_setting =  new Agen_Setting_Profile();
      $this->buku_profile_setting =  new Buku_Setting_Profile();
      $this->payfazz_profile_setting =  new Payfazz_Setting_Profile();
      $this->masteragen_profile_setting =  new Masteragen_Setting_Profile();
    }

    public static function Instance() {
      if (!isset(self::$instance)) {
       self::$instance = new self();
      }

      return self::$instance;
    }


    public function build() {
      // create custom plugin settings menu
      add_action('admin_menu', array ( $this, 'register_menu' ) );
    }


    /**
     * Registers a new settings page under Settings.
     */
    public function register_menu() {
      // craete sub menu on setting menu 
      add_options_page( 
        $this->page_title, 
        $this->menu_title,
        $this->capability, 
        $this->menu_slug,
        array ( $this, 'render_page' ),
        $this->position
      );
    }
    

    /**
     * Rendering page
     */
    public function render_page() {
      echo '<div class="wrap">';
      echo '<h1 class="wp-heading-inline">' . $this->menu_title . '</h1>';
        $tab = ( ! empty( $_GET['tab'] ) ) ? esc_attr( $_GET['tab'] ) : 'profile';
        $this->content_tab( $tab );

        echo '<div class="tab-content">';
        switch($tab) :
          case 'masteragen':
            $this->masteragen_profile_setting->render_form();
            break;
          case 'agen':
            $this->agen_profile_setting->render_form();
            break;
          case 'buku':
            $this->buku_profile_setting->render_form();
            break;
          default:
            $this->payfazz_profile_setting->render_form();
            break;
        endswitch;
        echo '</div>';
      echo '</div>';
    }


    /**
     * Rendering content tabs layouts.
     */
    public function content_tab( $current = 'payfazz'  ) { 
      $tabs = array(
        'payfazz'     => __( 'Payfazz', $this->menu_slug ), 
        'masteragen'  => __( 'Masteragen', $this->menu_slug ),
        'agen'        => __( 'Agen', $this->menu_slug ),
        'buku'        => __( 'Buku', $this->menu_slug ),
      );

      $html = '<nav class="nav-tab-wrapper">';
        foreach( $tabs as $tab => $name ){
          $class = ( $tab == $current ) ? 'nav-tab-active' : '';
          $html .= '<a class="nav-tab ' . $class . '" href="?page=' . $this->menu_slug . '&tab=' . $tab . '">' . $name . '</a>';
        }
      $html .= '</nav>';

      echo $html;
    }

  }

  $payfazzSetting = Payfazz_Setting::Instance();
  $payfazzSetting->build();

}