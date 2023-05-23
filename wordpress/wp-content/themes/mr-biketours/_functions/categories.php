<?php
function pd_get_categories($args){
	$defaults = array('parent'=>0);
	$args = wp_parse_args( $args, $defaults );
	$categories = pd_get_sub_categories($args);
	return $categories;
}

function pd_get_sub_categories($args){

	$categories = get_categories($args);
	if(count($categories)>0) {
		foreach ($categories as $key => &$category) {
			$args['parent'] = $category->term_id;
			$category->children = pd_get_sub_categories($args);
		}
		return $categories;
	}else{
		return false;
	}
}