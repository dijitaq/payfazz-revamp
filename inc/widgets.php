<?php


/**
 * Add a sidebar.
 * link@ https://developer.wordpress.org/reference/functions/register_sidebar/
 */
function custom_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Footer One', 'payfazz' ),
    'id'            => 'footer-one',
    'description'   => __( 'Widgets in this area will be shown on footer.', 'payfazz' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '<aside>',
    'before_title'  => '<h4 class="widget__title">',
    'after_title'   => '</h4>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Footer Two', 'payfazz' ),
    'id'            => 'footer-two',
    'description'   => __( 'Widgets in this area will be shown on footer.', 'payfazz' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '<aside>',
    'before_title'  => '<h4 class="widget__title">',
    'after_title'   => '</h4>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Footer Three', 'payfazz' ),
    'id'            => 'footer-three',
    'description'   => __( 'Widgets in this area will be shown on footer.', 'payfazz' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '<aside>',
    'before_title'  => '<h4 class="widget__title">',
    'after_title'   => '</h4>',
  ) );
}
add_action( 'widgets_init', 'custom_widgets_init' );