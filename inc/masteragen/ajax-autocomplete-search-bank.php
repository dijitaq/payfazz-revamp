<?php

add_action('wp_enqueue_scripts', function() {
	wp_enqueue_script('autocomplete-search', get_stylesheet_directory_uri() . '/assets/js/masteragen/scripts-autocomplete.js', ['jquery', 'jquery-ui-autocomplete'], null, true);
	wp_localize_script('masteragen-dep-jquery-scripts', 'AutocompleteSearch', [ 
    'ajax_url' => admin_url('admin-ajax.php'),
		'ajax_nonce' => wp_create_nonce('autocompleteSearchNonce')
	]);
 
	$wp_scripts = wp_scripts();
	wp_enqueue_style('jquery-ui-css', '//ajax.googleapis.com/ajax/libs/jqueryui/' . $wp_scripts->registered['jquery-ui-autocomplete']->ver . '/themes/smoothness/jquery-ui.css', false, null, false	);
});
 
add_action('wp_ajax_nopriv_autocompleteSearch', 'awp_autocomplete_search');
add_action('wp_ajax_autocompleteSearch', 'awp_autocomplete_search');
function awp_autocomplete_search() {
	check_ajax_referer('autocompleteSearchNonce', 'security');
 
	$search_term = $_REQUEST['term'];
	if (!isset($_REQUEST['term'])) {
		echo json_encode([]);
	}
 
	$suggestions = [];
	$query = new WP_Query([
    'post_type' => 'masteragen_bank',
		's' => $search_term,
		'posts_per_page' => -1,
	]);
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			$suggestions[] = [
				'id' => get_the_ID(),
				'label' => get_the_title(),
				'link' => ''
			];
		}
		wp_reset_postdata();
	}
	echo json_encode($suggestions);
	wp_die();
}