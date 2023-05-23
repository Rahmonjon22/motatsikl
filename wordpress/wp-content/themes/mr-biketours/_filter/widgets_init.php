<?php

function bars_widgets_init() {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

	//WPML language selector
	if (is_plugin_active('sitepress-multilingual-cms/sitepress.php')) {
		register_sidebar(array(

			'name' => __('Language selection', 'bars-theme'),
			'id' => 'bars-langselect',
			'description' => __('Place the language selection widget here', 'bars-theme'),

			/*'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',

			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',*/

		));
	}


}

add_action('widgets_init', 'bars_widgets_init');
