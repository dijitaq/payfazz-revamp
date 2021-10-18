<?php

/**
 * Add a sidebar.
 * link@ https://developer.wordpress.org/reference/functions/register_sidebar/
 */
function agen_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Agen Footer One', 'payfazz' ),
    'id'            => 'agen-footer-one',
    'description'   => __( 'Widgets in this area will be shown on footer.', 'payfazz' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '<aside>',
    'before_title'  => '<h3 class="widget__title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Agen Footer Two', 'payfazz' ),
    'id'            => 'agen-footer-two',
    'description'   => __( 'Widgets in this area will be shown on footer.', 'payfazz' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '<aside>',
    'before_title'  => '<h3 class="widget__title">',
    'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'agen_widgets_init' );