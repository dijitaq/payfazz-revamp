<article class="grid__col grid__col--3">
  <?php if ( has_post_thumbnail() ) : ?> 
    <a href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail( 'full', array ( 'loading' => 'lazy', 'class' => 'archive-section__thumbnail image-' . get_the_ID() ) ); ?>
    </a>

    <p class="archive-section__date"><?php echo get_the_date(); ?></p>

    <h3 class="archive-section__header-three"><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>

    <p class="archive-section__excerpt"><?php echo get_the_excerpt(); ?></p>

    <a href="<?php the_permalink(); ?>" class="archive-section__details">Details</a>
  <?php endif; ?>
</article>