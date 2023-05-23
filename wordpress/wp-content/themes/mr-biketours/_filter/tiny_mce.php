<?php


/**
 * TinyMCE hinzufuegen der Dropdown "Formate"
 *
 * @author Oleg Meglin <om@meglin.media>
 * @since 1.0.0
 *
 * @return string
 */

// Callback function to insert 'styleselect' into the $buttons array
function mm__wysiwyg__insert_format_btn( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'mm__wysiwyg__insert_format_btn' );



/**
 * TinyMCE hinzufuegen von custom Formaten in die Dropdown "Formate"
 * @link https://codex.wordpress.org/TinyMCE_Custom_Styles
 *
 * @author Oleg Meglin <om@meglin.media>
 * @since 1.0.0
 *
 * @return string
 */

function mm__wysiwyg__insert_formats( $init_array ) {

    $style_formats = array(

        // Text
        // ---------------------
        array(
            'title' => __('Lead', 'bars-theme'),
            'selector'  => 'p',
            'classes' => 'lead',
        ),

        array(
            'title' => __('Overline Text', 'bars-theme'),
            'classes' => 'text-overline',
            'inline' => 'span',
            'wrapper' => true,
        ),
        
        array(
            'title' => __('Phonenumber', 'bars-theme'),
            'classes' => 'text-phone',
            'inline' => 'span',
            'wrapper' => true,
        ),
        
         array(
            'title' => __('Read more', 'bars-theme'),
            'classes' => 'text-collapse',
            'block' => 'div',
            'wrapper' => true,
        ),




        // Buttons
        // ---------------------

        array(
            'title' => 'Buttons',
            'items' => array(
                array(
                    'title' => __('Button', 'bars-theme'),
                    'selector'  => 'a',
                    'classes' => 'btn',
                ),

                // Colors
                array(
                    'title' => __('Color: default', 'bars-theme'),
                    'selector'  => 'a',
                    'classes' => 'btn-default',
                ),

                array(
                    'title' => __('Color: primary', 'bars-theme'),
                    'selector'  => 'a',
                    'classes' => 'btn-primary',
                ),

                array(
                    'title' => __('Color: success', 'bars-theme'),
                    'selector'  => 'a',
                    'classes' => 'btn-success',
                ),

                array(
                    'title' => __('Color: info', 'bars-theme'),
                    'selector'  => 'a',
                    'classes' => 'btn-info',
                ),

                array(
                    'title' => __('Color: warning', 'bars-theme'),
                    'selector'  => 'a',
                    'classes' => 'btn-warning',
                ),

                array(
                    'title' => __('Color: danger', 'bars-theme'),
                    'selector'  => 'a',
                    'classes' => 'btn-danger',
                ),

                array(
                    'title' => __('Color: link', 'bars-theme'),
                    'selector'  => 'a',
                    'classes' => 'btn-link',
                ),

                // Sizes
                array(
                    'title' => __('Size: lg', 'bars-theme'),
                    'selector'  => 'a',
                    'classes' => 'btn-lg',
                    'exact' => 'btn-sm',
                ),

                array(
                    'title' => __('Size: sm', 'bars-theme'),
                    'selector'  => 'a',
                    'classes' => 'btn-sm',
                    'exact' => 'btn-lg',
                ),

                array(
                    'title' => __('Size: xs', 'bars-theme'),
                    'selector'  => 'a',
                    'classes' => 'btn-xs',
                ),
            ),
        ),



    );

    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );

    return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'mm__wysiwyg__insert_formats' );




/**
 * Schleife auf die Content Sektion.
 *
 * @author Oleg Meglin <om@meglin.media>
 * @since 1.0.0
 */
function mm__load_content_sections(){

    // Ermittlung der letzten Sektion
    $count = count( get_field('mm_content__section__selector') );
    $i = 1;

    while ( have_rows( 'mm_content__section__selector' ) ) : the_row();

        // Ermittlung der letzten Sektion
        $last_row = false;
        if ($i == $count) :
            $last_row = true;
        endif;
        $i++;

        // Template aufrufen
        require get_template_directory() . '/lib/sections/' . get_sub_field( 'mm_content__section__type' ) . '.php';

    endwhile;
}