 <?php 
/* Template Name: Page Press Release */ 

get_header( 'white' ); ?>

<section class="archive-section archive-section__hero-image">
  <div class="grid">
    <div class="grid__row justify-content-center">
      <div class="grid__col grid__col--12">
        <h1 class="archive-section__hero-image__header-one text-center">Siaran Pers</h1>
      </div>

      <div class="grid__col grid__col--6">
        <div class="input-group archive-section__input-group">
          <input type="text" name="" class="form-control input-group__form-control">

          <button type="submit" class="button button--payfazz-blue input-group__button">Submit</button>
        </div>
      </div>

      <div class="grid__col grid__col--12 d-flex justify-content-center">
        <?php $path_name = get_queried_object()->name; ?>
        <?php $categories = get_terms( 'press_categories' ); ?>

        <ul class="category-navigation category-navigation--inline d-flex">
          <?php foreach ( $categories as $cat ) : ?>
            <li class="<?php echo $path_name == $cat->name ? 'menu-item current-menu-item' : 'menu-item'; ?>"><a href="<?php echo esc_url( get_term_link( $cat ) ); ?>"><?php echo $cat->name; ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</section>

<section class="archive-section archive-section__articles">
  <?php
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

    $args_archive = array(
      'post_type'       => 'press',
      'categories'      => array( 'press_categories' ),
      'post_status'     => 'publish',
      'posts_per_page'  => 4,
      'paged'           => $paged,
    );

    $query_archive = new WP_Query( $args_archive );
  ?>

  <div class="grid">
    <div id="article-container" class="grid__row justify-content-center">
      <?php if ( $query_archive->have_posts() ) : ?>
        <?php add_enqueue_scripts( $query_archive );  ?>

        <?php while ( $query_archive->have_posts() ) : $query_archive->the_post(); ?>

          <?php get_template_part( 'template-parts/content', 'post' ); ?>

        <?php endwhile; ?>
      <?php endif; wp_reset_query(); ?>
  </div>

  <div class="grid_row">
    <div class="grid__col grid__col--12 d-flex justify-content-center">
      <?php if ( $query_archive->max_num_pages > 1 ) : ?>
        <a id="load-more-posts-trigger" class="button button--payfazz-blue archive-section__load-more">Load more</a>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>