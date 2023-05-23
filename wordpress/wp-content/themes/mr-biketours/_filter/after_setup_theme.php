<?php

/**
 * Bild Thumb-Sizes
 *
 * @author Oleg Meglin <om@meglin.media>
 * @since 1.0.0
 */

add_action( 'after_setup_theme', 'mm_theme_setup' );
function mm_theme_setup() {
    add_image_size( 'hero', 1980 );
    add_image_size( 'hd', 1980 );
    add_image_size( 'blog-overview', 400 );
    add_image_size( 'blog-detail', 900 );
}

add_action('after_setup_theme', 'bars_theme_setup');
function bars_theme_setup()
{
	load_theme_textdomain('bars-theme', get_template_directory() . '/languages');
	add_theme_support('post-thumbnails');
}