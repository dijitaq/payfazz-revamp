 <?php 
/* Template Name: Page Product */ 

get_header( 'product' ); ?>

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
                <img class="testimonial-swiper__quote-icon" src="<?php echo get_template_directory_uri() . '/assets/img/payfazz/icon-testimonial-quote.svg' ?>" width="48" height="48">

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