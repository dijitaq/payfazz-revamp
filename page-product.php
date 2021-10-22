 <?php 
/* Template Name: Page Product */ 

get_header( 'product' ); ?>

<div class="product-section product-section--hero-image">
  <div class="grid product-section__grid postition-relative">
    <div class="grid__row postition-relative" style="z-index: 2;">
      <div class="grid__col product-section__col-5">
        <h1 class="product-section__heading-one--hero-image">Limitless to<br>Open Business.</h1>

        <p class="product-section__paragraph--hero-image">PAYFAZZ helps business to access financial services,<br>digital and wholesales goods easily in one ecosystem.</p>
      </div>

      <div class="grid__col product-section__col-6 postition-relative">
        <div class="product-section__thumbnail--hero-image product-section__thumbnail--hero-image-one">
          <div class="product-section--hero-image__mask">
            <img src="<?php echo get_template_directory_uri() . '/assets/img/product/payfazz-product-hero-image-01.jpg'; ?>">
          </div>

          <span class="product-section--hero-image__flag product-section--hero-image__flag--yellow">Cheap</span>
        </div>

        <div class="product-section__phone-container--hero-image">
          <img src="<?php echo get_template_directory_uri() . '/assets/img/product/payfazz-hero-image-phone.png'; ?>">
        </div>
      </div>
    </div>

    <div class="grid__row">
      <div class="grid__col">
        <div class="product-section__thumbnail--hero-image product-section__offset-2">
          <div class="product-section--hero-image__mask">
            <img src="<?php echo get_template_directory_uri() . '/assets/img/product/payfazz-product-hero-image-02.jpg'; ?>">
          </div>

          <span class="product-section--hero-image__flag product-section--hero-image__flag--payfazz-blue">Easy</span>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="product-section product-section--masteragen">
  <div class="grid product-section__grid">
    <div class="grid__row">
      <div class="grid__col product-section__col-5">
        <img class="product-section__logo product-section__logo--masteragen" src="<?php echo get_template_directory_uri() . '/assets/img/product/logo-payfazz-masteragen-color.svg'; ?>" >

        <h2 class="product-section__heading-two">One Stop App for Every Financial Service Needs</h2>

        <p class="product-section__paragraph">Solution for bank transfer, cash in, cash out, e-money top up and acceptance in one app. Get access to productive working capital
and start growing your business with Modal PAYFAZZ.</p>

        <a class="button button-outline--payfazz-blue">PELAJARI LEBIH</a>
      </div>

      <div class="grid__col product-section__col-4 product-section__offset-2">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/product/payfazz-masteragen-phone.png' ?>">
      </div>
    </div>
  </div>
</div>

<div class="product-section product-section--agen">
  <div class="grid product-section__grid">
    <div class="grid__row">
      <div class="grid__col product-section__col-5">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/product/payfazz-agen-phone.png' ?>">
      </div>

      <div class="grid__col product-section__col-5 product-section__offset-1">
        <img class="product-section__logo product-section__logo--agen" src="<?php echo get_template_directory_uri() . '/assets/img/product/logo-payfazz-agen-color.svg'; ?>" >

        <h2 class="product-section__heading-two">One Stop App for Ordering<br>Digital &amp; Wholesale Goods</h2>

        <p class="product-section__paragraph">It is easy to start your digital &amp; consumer goods business. Sell more phone credit, data package, electricity bills, postpaid bills, and resell wholesaler goods in one app. Buy digital and wholesale goods Now and Pay Later with Kredit PAYFAZZ.</p>

        <a class="button button-outline--payfazz-blue">PELAJARI LEBIH</a>
      </div>
    </div>
  </div>
</div>

<div class="product-section product-section--mobile">
  <div class="grid product-section__grid">
    <div class="grid__row justify-content-between">
      <div class="grid__col product-section__col-5">
        <img class="product-section__logo product-section__logo--mobile" src="<?php echo get_template_directory_uri() . '/assets/img/product/logo-payfazz-mobile-color.svg'; ?>" >

        <h2 class="product-section__heading-two">One Stop App for Loyalty, Payments and Rewards</h2>

        <p class="product-section__paragraph">Pay in PAYFAZZ ecosystem with higher discounts and earn more rewards from all transaction you spent in one app.</p>

        <a class="button button-outline--payfazz-blue">PELAJARI LEBIH</a>
      </div>

      <div class="grid__col product-section__col-5">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/product/payfazz-mobile-phone.png' ?>">
      </div>
    </div>
  </div>
</div>

<section class="product-section product-section--testimonial">
  <div class="grid">
    <div class="grid__row justify-content-center">
      <div class="grid__col product-section__col-8 text-center">
        <h1>Di unduh lebih dari<br>5.000.000 kali di seluruh Indonesia</h1>
      </div>
    </div>
  </div>

  <?php $testimoni = new WP_Query( array ( 
    'post_type'       => 'testimoni', 
    'posts_per_page'  => 10, 
    'no_found_rows'   => true,
    'meta_query'      => array(
      array(
          'key'     => 'testimoni_product',
          'compare' => '==',
          'value'   => 'payfazz-masteragen',
      )
    ),
    'meta_key'        => 'testimoni_product',
    'orderby'         => 'meta_value',
    'order'           => 'ASC' ) ); ?>
  
  <?php if ( $testimoni->have_posts() ) : ?>
    <div class="swiper testimonial-swiper" id="testimonial-swiper">
      <div class="swiper-wrapper testimonial-swiper__wrapper">
        <?php while( $testimoni->have_posts() ) : $testimoni->the_post(); ?>
          <div class="swiper-slide d-flex justify-content-center">
            <div class="testimonial-swiper__slide d-flex">
              <div class="testimonial-swiper__image-container">
                <?php if ( has_post_thumbnail() ) : ?>
                  <div class="testimonial-swiper__image-mask">
                    <?php the_post_thumbnail('testimoni-thumbnail', ['loading' => 'lazy']); ?>
                  </div>
                <?php endif; ?>
              </div>

              <div class="testimonial-swiper__text-container">
                <img class="testimonial-swiper__quote-icon" src="<?php echo get_template_directory_uri() . '/assets/img/payfazz/icon-testimonial-quote.svg'; ?>" width="48" height="48">

                <p class="testimonial-swiper__description"><?php echo get_post_meta( get_the_ID(), 'testimoni_desc', true ); ?></p>

                <p class="testimonial-swiper__owner"><?php echo get_post_meta( $post->ID, 'testimoni_owner', true ); ?></p>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>

      <div class="swiper-pagination"></div>
    </div>
  <?php endif; ?>
</section>

<?php get_footer(); ?>