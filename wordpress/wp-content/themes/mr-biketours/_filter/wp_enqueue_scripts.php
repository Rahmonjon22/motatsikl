<?php
function bars_theme_script_enqueue() {
	$abs = dirname(dirname(__FILE__));
	$css = "/assets/css/main.css";
	$js = '/assets/Javascript/main.js';

	if(is_file($abs.$css)) {
		wp_enqueue_style('style', get_template_directory_uri() . $css, array(), filectime($abs . $css), 'all');
	}
	if(is_file($abs.$js)) {
		wp_enqueue_script('main', get_template_directory_uri() .$js, array(), filectime($abs . $js), TRUE);
	}

}

add_action('wp_enqueue_scripts', 'bars_theme_script_enqueue');