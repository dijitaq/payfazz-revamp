    <footer class="main-footer">
      <div class="grid">
        <div class="grid__row">
          <div class="grid__col main-footer__col-one">
            <img class="main-footer__logo" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/img/payfazz/logo-payfazz-black.svg" alt="<?php _e( 'logo payfazz' ); ?>">

            <p class="main-footer__address">
              PT PAYFAZZ TEKNOLOGI NUSANTARA
              <br>Menara Prima Lt 12 
              <br>Jl. DR. Ide Anak Agung Gede Agung RT05/RW02,
              <br>Kuningan Timur, Kecamatan Setiabudi,
              <br>Daerah Khusus Ibukota – Jakarta 12950
            </p>
          </div>

          <div class="grid__col main-footer__col-two">
            <?php
              if ( has_nav_menu( 'footer-payfazz-primary' ) ) { ?>
                <h4 class="widget__title widget__title--mb-29"><?php _e( 'PRODUK', 'payfazz' ); ?></h4>

                <?php  $args = array(
                  'theme_location'  => 'footer-payfazz-primary',
                  'container'       => null,
                  'container_class' => null,
                  'menu_class'      => 'main-footer__navigation',
                  'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                  'depth'           => 2,
                );
                wp_nav_menu($args);
              }
            ?>
          </div>

          <div class="grid__col main-footer__col-three">
            <h4 class="widget__title widget__title--mb-29"><?php _e( 'LAYANAN BANTUAN', 'payfazz' ); ?></h4>

            <ul class="main-footer__navigation main-footer__navigation--nml-6">
              <li class="d-flex align-items-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/payfazz/icon-fazz-contact-phone-black.svg" width="30" height="30">
                021-5011-2000
              </li>

              <li class="d-flex align-items-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/payfazz/icon-fazz-contact-email-black.svg" width="30" height="30">
                cs@payfazz.com
              </li>

              <li class="d-flex align-items-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/payfazz/icon-fazz-contact-clock-black.svg" width="30" height="30">
                Setiap hari (06:00 - 24:00)
              </li>
            </ul>
          </div>

          <div class="grid__col main-footer__col-four">
            <h4 class="widget__title widget__title--mb-29"><?php _e( 'IKUTI KAMI', 'payfazz' ); ?></h4>
            
            <ul class="main-footer__navigation main-footer__navigation--inline d-flex  main-footer__navigation--nml-12">
              <li>
                <a href="<?php echo get_option( 'fazz_link_facebook' ); ?>" target="_blank" rel="noopener noreferrer" aria-label="payfazz instagram link">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/payfazz/icon-fazz-facebook-black.svg" width="30" height="30">
                </a>
              </li>

              <li>
                <a href="<?php echo get_option( 'fazz_link_twitter' ); ?>" target="_blank" rel="noopener noreferrer" aria-label="payfazz facebook link">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/payfazz/icon-fazz-twitter-black.svg" width="30" height="30">
                </a>
              </li>

              <li>
                <a href="<?php echo get_option( 'fazz_link_youtube' ); ?>" target="_blank" rel="noopener noreferrer" aria-label="payfazz youtube link">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/payfazz/icon-fazz-youtube-black.svg" width="30" height="30">
                </a>
              </li>

              <li>
                <a href="<?php echo get_option( 'fazz_link_instagram' ); ?>" target="_blank" rel="noopener noreferrer" aria-label="payfazz linkedin link">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/payfazz/icon-fazz-instagram-black.svg" width="30" height="30">
                </a>
              </li>
              
              <li>
                <a href="<?php echo get_option( 'fazz_link_linkedin' ); ?>" target="_blank" rel="noopener noreferrer" aria-label="payfazz twitter link">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/payfazz/icon-fazz-linkedin-black.svg" width="30" height="30">
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="grid">
        <div class="grid__row">
          <div class="grid__col">
            <a href="http://fazzfinancial.com" target="_blank" rel="noopener noreferrer" title="member of fazzfinancial group"> 
              <img loading="lazy" src="<?php echo get_template_directory_uri() ?>/assets/img/member-of-fazzfinancial-group-black.svg" alt="member of fazzfinancial group" class="main-footer__logo-member">
            </a>

            <hr class="main-footer__hr">
          </div>
        </div>
      </div>

      <div class="grid">
        <div class="grid__row">
          <div class="grid__col grid__col-copyright d-flex justify-content-between align-items-center">
            <p class="d-inline-block">&copy; FAZZFINANCIAL GROUP 2021. All rights reserved.</p>

            <?php
              if ( has_nav_menu( 'footer-payfazz-secondary' ) ) { ?>
                <?php  $args = array(
                  'theme_location'  => 'footer-payfazz-secondary',
                  'container'       => null,
                  'container_class' => null,
                  'menu_class'      => 'main-footer__navigation main-footer__navigation--inline d-flex',
                  'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                  'depth'           => 2,
                );
                wp_nav_menu( $args );
              }
            ?>
          </div>
        </div>
      </div>
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>