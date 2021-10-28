<?php

function breadcrumb($path, $title) {
  echo '<ul class="list list--inline breadcrumb">';
    if ( empty( $path ) ) {
      echo '<li><a href="'.site_url().'"><i class="icon-agen-breadcrumb-back"></i> Home</a></li>';
    }else {
      echo '<li><a href="'.site_url( $path ).'"><i class="icon-agen-breadcrumb-back"></i> '.$title.'</a></li>';
    }
    echo '<li><span>';
    if ( !is_search() ) {
      echo the_title();
    } else {
      echo the_search_query();
    }
    echo '</span></li>';
  echo "</ul>";
}

/**
 * Create custom excerpt
 * 
 * @param string $size
 * 
 */
function custom_excerpt( $length ) {
  if ( has_excerpt() ) {
    return the_excerpt();

  } else {
    echo wp_trim_words( get_the_content(), $length, '' );
  }
}

/**
 * Create custom thumbnails
 * 
 * @param string $size
 * 
 */
function custom_thumbnail( $size = 'full' ) {
  if ( has_post_thumbnail() ) {
    return the_post_thumbnail( $size, array( 'loading' => 'lazy' ) );
  }
  return;
}