<?php
/**
 * The template for displaying content in the single.php template.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
<section class="single-section single-section__hero-image">
	<div class="grid">
		<div class="grid__row">
			<div class="grid__col grid__col--12">
				<?php echo get_the_post_thumbnail( get_the_ID(), 'large' ); ?>
			</div>
		</div>
	</div>
</section>

<section class="single-section single-section__content">
	<div class="grid">
		<div class="grid__row justify-content-between">
			<div class="grid__col grid__col--4">
				<p class="single-section__content__paragraph--page">PRESS RELEASE</p>

				<h2 class="single-section__content__header-two"><?php echo get_the_title(); ?></h2>

				<hr class="single-section__content__hr">

				<ul class="share-navigation share-navigation--inline">
					<?php echo payfazz_share_post( get_permalink() ); ?>
				</ul>
			</div>

			<div class="grid__col grid__col--7">
				<?php echo get_the_content(); ?>
			</div>
		</div>
</section>

<section class="single-section single-section__related">
	<div class="grid">
  	<div class="grid__row">
  		<div class="grid__col">
  			<h3 class="single-section__content__header-three">Related News</h3>
  		</div>
  	</div>

    <div class="grid__row">
      <?php payfazz_revamp_related_post( 'press', 'press_categories', 'template-parts/content-post' ); ?>
    </div>
  </div>
</section>

</article><!-- /#post-<?php the_ID(); ?> -->
