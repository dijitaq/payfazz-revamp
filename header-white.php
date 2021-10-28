<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header class="main-header main-header--white">
    <div class="grid">
      <div class="grid__row">
        <nav class="grid__col d-flex justify-content-between align-items-center">
          <img class="main-header__logo" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/img/payfazz/logo-payfazz-color.svg" alt="<?php _e( 'logo payfazz' ); ?>">

          <?php
            if ( has_nav_menu( 'header-payfazz' ) ) {
              $walker = new Menu_With_Description;

              $args = array(
                'theme_location'  => 'header-payfazz',
                'container'       => null,
                'container_class' => null,
                'menu_class'      => 'main-header__navigation main-header__navigation--white main-header__navigation--inline d-flex',
                'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                'depth'           => 2,
                'walker'          => new WP_Bootstrap_Navwalker()
              );
              wp_nav_menu($args);
            }
          ?>
        </nav>
      </div>
    </div>
  </header>