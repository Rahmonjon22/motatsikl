<?php
$global_menu_position = 2;


//Require Functions
$_filter = scandir(dirname(__FILE__) . "/_functions/");
foreach ($_filter as $f) {
	$f = dirname(__FILE__) . "/_functions/" . $f;
	if (is_file($f)) {
		require_once($f);
	}
}


//Require Filters
$_filter = scandir(dirname(__FILE__) . "/_filter/");
foreach ($_filter as $f) {
	$f = dirname(__FILE__) . "/_filter/" . $f;
	if (is_file($f)) {
		require_once($f);
	}
}

//Require Post-Types
//$_filter = scandir(dirname(__FILE__)."/_post_types/");
//foreach($_filter as $f){
//	$f = dirname(__FILE__)."/_post_types/".$f;
//	if(is_file($f)){
//		require_once($f);
//	}
//}


/* ACF Styling Backend */

function my_acf_admin_head()
{
	?>
	<style type="text/css">
		.acf-repeater .acf-table>tbody>tr td {
			border-bottom: 4px solid #000;
		}
	</style>
	<?php
}

add_action('acf/input/admin_head', 'my_acf_admin_head');


/* Custom Posttype Trip */
function trip_init()
{

	$args = array(
		'label' => 'Trip',
		'public' => TRUE,
		'show_ui' => TRUE,
		'show_in_rest' => TRUE,
		'hierarchical' => FALSE,
		'query_var' => FALSE,
		'exclude_from_search' => TRUE,
		'menu_icon' => 'dashicons-groups',
		'has_archive' => FALSE,
		'supports' => array(
			'title',
			'editor',
			'thumbnail'
		)
	);
	register_post_type('trip', $args);
}
add_action('init', 'trip_init');

/* Custom Categories Trip */
function create_trip_countries_taxonomies()
{
	$labels = array(
		'name' => _x('Countries', 'taxonomy general name'),
		'singular_name' => _x('Country', 'taxonomy singular name'),
		'search_items' => __('search country'),
		'all_items' => __('All Countries'),
		'parent_item' => __('Parent Country'),
		'parent_item_colon' => __('Parent Country:'),
		'edit_item' => __('edit Country'),
		'update_item' => __('update Country'),
		'add_new_item' => __('Add new country'),
		'new_item_name' => __('New Country name'),
		'menu_name' => __('Countries'),
	);
	$args = array(
		'hierarchical' => TRUE,
		// Set this to 'false' for non-hierarchical taxonomy (like tags)
		'labels' => $labels,
		'show_ui' => TRUE,
		'show_admin_column' => TRUE,
		'query_var' => TRUE,
		'parent_item' => NULL,
		'parent_item_colon' => NULL,
		'rewrite' => array('slug' => 'trip_countries', 'hierarchical' => true),
	);
	register_taxonomy('trip_countries', array('trip'), $args);
}
add_action('init', 'create_trip_countries_taxonomies', 0);



/* Custom Posttype Bikerental */
function bikerental_init()
{

	$args = array(
		'label' => 'Bikerental',
		'public' => TRUE,
		'show_ui' => TRUE,
		'show_in_rest' => TRUE,
		'hierarchical' => FALSE,
		'query_var' => FALSE,
		'exclude_from_search' => TRUE,
		'menu_icon' => 'dashicons-groups',
		'has_archive' => FALSE,
		'supports' => array(
			'title',
			'editor',
			'thumbnail'
		)
	);
	register_post_type('bikerental', $args);
}
add_action('init', 'bikerental_init');


/* Custom Categories Bikerental */
function create_bikerental_countries_taxonomies()
{
	$labels = array(
		'name' => _x('Countries', 'taxonomy general name'),
		'singular_name' => _x('Country', 'taxonomy singular name'),
		'search_items' => __('search country'),
		'all_items' => __('All Countries'),
		'parent_item' => __('Parent Country'),
		'parent_item_colon' => __('Parent Country:'),
		'edit_item' => __('edit Country'),
		'update_item' => __('update Country'),
		'add_new_item' => __('Add new country'),
		'new_item_name' => __('New Country name'),
		'menu_name' => __('Countries'),
	);
	$args = array(
		'hierarchical' => TRUE,
		// Set this to 'false' for non-hierarchical taxonomy (like tags)
		'labels' => $labels,
		'show_ui' => TRUE,
		'show_admin_column' => TRUE,
		'query_var' => TRUE,
		'parent_item' => NULL,
		'parent_item_colon' => NULL,
		'rewrite' => array('slug' => 'countries', 'hierarchical' => true),
	);
	register_taxonomy('bikerental_countries', array('bikerental'), $args);
}
add_action('init', 'create_bikerental_countries_taxonomies', 0);

/* Custom Posttype Accordion */
function accordion_init()
{
	$args = array(
		'label' => 'Accordion',
		'public' => TRUE,
		'show_ui' => TRUE,
		'show_in_rest' => TRUE,
		'hierarchical' => FALSE,
		'query_var' => FALSE,
		'exclude_from_search' => TRUE,
		'menu_icon' => 'dashicons-groups',
		'has_archive' => FALSE,
		'supports' => array(
			'title',
			'editor',
			'thumbnail'
		)
	);
	register_post_type('accordion', $args);
}
add_action('init', 'accordion_init');



/* Rename Posts */

function revcon_change_post_label()
{
	global $menu;
	global $submenu;
	$menu[5][0] = 'News';
	$submenu['edit.php'][5][0] = 'News';
	$submenu['edit.php'][10][0] = 'Add News';
	$submenu['edit.php'][16][0] = 'News Tags';
	echo '';
}

function revcon_change_post_object()
{
	global $wp_post_types;
	$labels = & $wp_post_types['post']->labels;
	$labels->name = 'News';
	$labels->singular_name = 'News';
	$labels->add_new = 'Add News';
	$labels->add_new_item = 'Add News';
	$labels->edit_item = 'Edit News';
	$labels->new_item = 'News';
	$labels->view_item = 'View News';
	$labels->search_items = 'Search News';
	$labels->not_found = 'No News found';
	$labels->not_found_in_trash = 'No News found in Trash';
	$labels->all_items = 'All News';
	$labels->menu_name = 'News';
	$labels->name_admin_bar = 'News';
}

add_action('rest_api_init', 'add_custom_fields');
add_action('admin_menu', 'revcon_change_post_label');
add_action('init', 'revcon_change_post_object');

function add_custom_fields()
{
	register_rest_field(
		'post',
		'custom_fields',
		//New Field Name in JSON RESPONSEs
		array(
			'get_callback' => 'get_all_fields',
			// custom function name
			'update_callback' => NULL,
			'schema' => NULL,
		)
	);
}


function get_all_fields($request_data)
{
	// get posts
	$acf = get_fields($request_data->id);

	return $acf;
}


function ws_register_images_field()
{
	register_rest_field(
		'post',
		'_featured_media',
		array(
			'get_callback' => 'ws_get_images_urls',
			'update_callback' => NULL,
			'schema' => NULL,
		)
	);
}

add_action('rest_api_init', 'ws_register_images_field');

function ws_get_images_urls($object, $field_name, $request)
{
	$medium = wp_get_attachment_image_src(get_post_thumbnail_id($object->id), 'medium');
	$medium_url = $medium['0'];

	$large = wp_get_attachment_image_src(get_post_thumbnail_id($object->id), 'large');
	$large_url = $large['0'];

	return array(
		'medium' => $medium_url,
		'large' => $large_url,
	);
}

//loads bars theme organisims
require_once('bars/Bars.php');
$bars = \POINTDIGITAL\Bars::getInstance();


/* Add Image Size */
add_image_size('background-image', 1920, 9999);


// ACF Options Page
if (function_exists('acf_add_options_page')) {

	acf_add_options_page(
		array(
			'page_title' => __('Theme Einstellungen', 'bars-theme'),
			'menu_title' => __('Theme Einstellungen', 'bars-theme'),
			'menu_slug' => 'theme-general-settings',
			'capability' => 'edit_posts',
			'redirect' => FALSE
		)
	);

}

is_admin() && add_action('pre_get_posts', 'acf_orderby');

function acf_orderby($query)
{
	// Nothing to do:
	if (!$query->is_main_query() || 'acf-field-group' != $query->get('post_type'))
		return;

	$query->set('orderby', 'title');
}

function menu_custom_header_meta()
{
	register_nav_menu('menu_custom_header_meta', __('Meta Menu (Header)'));
}

add_action('init', 'menu_custom_header_meta');

function include_cpt_search($query)
{

	if ($query->is_search) {
		$query->set('post_type', array('post', 'page', 'machines'));
	}

	return $query;

}

add_filter('pre_get_posts', 'include_cpt_search');

function rr_404_my_event()
{
	global $post;
	if ($post->ID == 2413 || $post->ID == 3529 || $post->ID == 6195 || $post->ID == 4291) {
		global $wp_query;
		//$wp_query->set_404();
		status_header(404);
	}
}

add_action('wp', 'rr_404_my_event');