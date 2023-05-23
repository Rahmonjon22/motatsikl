<?php

/**
 * Gibt die Open Graph Meta-Tags zurueck.
 *
 * @author Oleg Meglin <om@meglin.media>
 * @since 1.0.0
 */

function open_graph(){

    $id = get_the_ID();

    // ID bei den Archiv Seiten aendern
    if(is_blog() && !is_single()):
        $id = get_option( 'page_for_posts' );
    elseif (is_archive()):
        $id = get_post_id();
    endif;

    // Title Tag
    $og_title = is_front_page() ? get_bloginfo('description') : get_the_title($id);
    if (get_field('seo_title', $id)):
        $og_title = get_field('seo_title', $id);
    endif;

    if (get_field('open_graph__title', $id)) :
        $og_title = get_field('open_graph__title', $id);
    endif;

    echo '<meta property="og:title" content="' . $og_title . '" />';
    echo "\n";


    // Type
    echo '<meta property="og:type" content="website" />';
    echo "\n";


    // URL
    echo '<meta property="og:url" content="' . get_permalink() . '" />';
    echo "\n";


    // Description
    $og_description = (get_field('open_graph__description', $id)) ? get_field('open_graph__description', $id) : get_field('seo_description', $id);
    if($og_description) :
        echo '<meta property="og:description" content="' . $og_description . '" />';
        echo "\n";
    endif;


    // Image
    $og_image = (get_field('open_graph__image', $id)) ? get_field('open_graph__image', $id) : get_field('mm_content__post_image', $id);
    if (!$og_image) :
        $og_image = get_field( 'sv_theme__open_graph__image', 'option' );
    endif;

    echo '<meta property="og:image" content="' . wp_get_attachment_image_src($og_image, array(1200, 630))[0] . '" />';
    echo "\n";

    echo "\n";

}