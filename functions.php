<?php

require_once( get_template_directory() . '/inc/setup-theme.php' );
require_once( get_template_directory() . '/inc/enqueue-script.php' );
require_once( get_template_directory() . '/inc/settings/index.php' );
require_once( get_template_directory() . '/inc/post-type.php' );
require_once( get_template_directory() . '/inc/metabox/index.php' );
require_once( get_template_directory() . '/inc/widgets.php' );
require_once( get_template_directory() . '/inc/hooks.php' );
require_once( get_template_directory() . '/inc/utils.php' );

/**
 * Hiding WordPress Version Information
 */
remove_action('wp_head', 'wp_generator');

remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
remove_action( 'admin_print_styles', 'print_emoji_styles' );


/**
 * Related Post
 * 
 * @param string $post_type
 * @param string $taxonomy
 * 
 */
function payfazz_related_post( $post_type, $taxonomy, $title, $template = 'template-parts/content-post' ) {
  global $post;

  //Get array of terms
  $terms = get_the_terms( $post->ID , $taxonomy );

  if ( $terms ) :

    //Pluck out the IDs to get an array of IDS
    $term_ids = wp_list_pluck( $terms, 'term_id');

    //Query posts with tax_query. Choose in 'IN' if want to query posts with any of the terms
    //Chose 'AND' if you want to query for posts with all terms
    $query = new WP_Query( array(
      'post_type' => $post_type,
      'tax_query' => array(
        array(
          'taxonomy' => $taxonomy,
          'field' => 'id',
          'terms' => $term_ids,
          'operator'=> 'IN' //Or 'AND' or 'NOT IN'
        )),
      'posts_per_page' => 3,
      'ignore_sticky_posts' => 1,
      'orderby' => 'rand',
      'post__not_in'=> array($post->ID)
    ) );

    //Loop through posts and display...
    if($query->have_posts()) {
      echo '<div class="divider-20"></div>';
      echo '<h4 class="font-size-24">' . $title . '</h4>';
      echo '<div class="divider-20"></div>';
      echo '<div class="flex flex--between">';
      while ($query->have_posts() ) : $query->the_post();
        get_template_part( $template );
      endwhile; 
      echo '</div>';
    }
    wp_reset_query();

  endif;
}



/**
 * Share post
 * 
 * @param string $permalink
 */
function payfazz_share_post( $permalink ) {
  // Get current page URL 
  $contentURL = urlencode( $permalink );
  $content = '';

  // Construct sharing URL without using any script
  $twitterURL = 'https://twitter.com/intent/tweet?url='.$contentURL;
  $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$contentURL;
  $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$contentURL;

  // Add sharing button at the end of page/page content
  $content .= '<ul class="list list--inline list--share clr-black-100">';
  $content .= '<li><b>Share</b></li>';
  $content .= '<li><a aria-label="share on facebook" rel="noreferrer" href="'. $facebookURL .'" target="_blank"><i class="icon-fontello-facebook"></i></a></li>';
  $content .= '<li><a aria-label="share on twitter" rel="noreferrer" href="'.$twitterURL.'" target="_blank"><i class="icon-fontello-twitter"></i></a></li>';
  $content .= '<li><a aria-label="share on twitter" rel="noreferrer" href="'.$linkedInURL.'" target="_blank"><i class="icon-fontello-linkedin"></i></a></li>';
  wp_is_mobile() ? $content .= '<li><a class="btn_media_share" aria-label="share" rel="noreferrer" href="#"><i class="icon-fontello-share "></i></a></li>' : null;
  $content .= '</ul>';
  return $content;
}



/**
 * WordPress Breadcrumbs
 */
function tsh_wp_custom_breadcrumbs() {

  $separator              = '/';
  $breadcrumbs_id         = 'tsh_breadcrumbs';
  $breadcrumbs_class      = 'tsh_breadcrumbs';
  $home_title             = esc_html__('Home', 'your-domain');

  // Add here you custom post taxonomies
  $tsh_custom_taxonomy    = 'product_cat';

  global $post,$wp_query;
     
  // Hide from front page
  if ( !is_front_page() ) {
     
      echo '<ul id="' . $breadcrumbs_id . '" class="' . $breadcrumbs_class . '">';
         
      // Home
      echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
      echo '<li class="separator separator-home"> ' . $separator . ' </li>';
         
      if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
            
          echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title('', false) . '</strong></li>';
            
      } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
            
          // For Custom post type
          $post_type = get_post_type();
            
          // Custom post type name and link
          if($post_type != 'post') {
                
              $post_type_object = get_post_type_object($post_type);
              $post_type_archive = get_post_type_archive_link($post_type);
            
              echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
              echo '<li class="separator"> ' . $separator . ' </li>';
            
          }
            
          $custom_tax_name = get_queried_object()->name;
          echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
            
      } else if ( is_single() ) {
            
          $post_type = get_post_type();

          if($post_type != 'post') {
                
              $post_type_object = get_post_type_object($post_type);
              $post_type_archive = get_post_type_archive_link($post_type);
            
              echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
              echo '<li class="separator"> ' . $separator . ' </li>';
            
          }
            
          // Get post category
          $category = get_the_category();
           
          if(!empty($category)) {
            
              // Last category post is in
              $last_category = $category[count($category) - 1];
                
              // Parent any categories and create array
              $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
              $cat_parents = explode(',',$get_cat_parents);
                
              // Loop through parent categories and store in variable $cat_display
              $cat_display = '';
              foreach($cat_parents as $parents) {
                  $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                  $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
              }
           
          }

          $taxonomy_exists = taxonomy_exists($tsh_custom_taxonomy);
          if(empty($last_category) && !empty($tsh_custom_taxonomy) && $taxonomy_exists) {
                 
              $taxonomy_terms = get_the_terms( $post->ID, $tsh_custom_taxonomy );
              $cat_id         = $taxonomy_terms[0]->term_id;
              $cat_nicename   = $taxonomy_terms[0]->slug;
              $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $tsh_custom_taxonomy);
              $cat_name       = $taxonomy_terms[0]->name;
             
          }
            
          // If the post is in a category
          if(!empty($last_category)) {
              echo $cat_display;
              echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                
          // Post is in a custom taxonomy
          } else if(!empty($cat_id)) {
                
              echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
              echo '<li class="separator"> ' . $separator . ' </li>';
              echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
            
          } else {
                
              echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                
          }
            
      } else if ( is_category() ) {
             
          // Category page
          echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
             
      } else if ( is_page() ) {
             
          // Standard page
          if( $post->post_parent ){
                 
              // Get parents 
              $anc = get_post_ancestors( $post->ID );
                 
              // Get parents order
              $anc = array_reverse($anc);
                 
              // Parent pages
              if ( !isset( $parents ) ) $parents = null;
              foreach ( $anc as $ancestor ) {
                  $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                  $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
              }
                 
              // Render parent pages
              echo $parents;
                 
              // Active page
              echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                 
          } else {
                 
              // Just display active page if not parents pages
              echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                 
          }
             
      } else if ( is_tag() ) { // Tag page
             
          // Tag information
          $term_id        = get_query_var('tag_id');
          $taxonomy       = 'post_tag';
          $args           = 'include=' . $term_id;
          $terms          = get_terms( $taxonomy, $args );
          $get_term_id    = $terms[0]->term_id;
          $get_term_slug  = $terms[0]->slug;
          $get_term_name  = $terms[0]->name;
             
          // Return tag name
          echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
         
      } elseif ( is_day() ) { // Day archive page
             
          // Year link
          echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
          echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
             
          // Month link
          echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
          echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
             
          // Day display
          echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
             
      } else if ( is_month() ) { // Month Archive
             
          // Year link
          echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
          echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
             
          // Month display
          echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
             
      } else if ( is_year() ) { // Display year archive

          echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
             
      } else if ( is_author() ) { // Author archive
             
          // Get the author information
          global $author;
          $userdata = get_userdata( $author );
             
          // Display author name
          echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
         
      } else if ( get_query_var('paged') ) {
             
          // Paginated archives
          echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
             
      } else if ( is_search() ) {
         
          // Search results page
          echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
         
      } elseif ( is_404() ) {
             
          // 404 page
          echo '<li>' . 'Error 404' . '</li>';
      }

      echo '</ul>';  
  }
}