<!-- gallery section -->
<?php if( have_rows('gallery_footer','option') ): ?>
 <section class="gallery-section">
 <?php while( have_rows('gallery_footer','option') ) : the_row(); ?>
            <a style="background-image: url('<?php echo get_sub_field('image'); ?>');" href="<?php  $term_id = get_sub_field('link');  echo get_term_link( $term_id, 'trip_countries' ); ?>" class="image-box1">
                <h1><?php echo get_sub_field('title'); ?></h1>
                <hr>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/Path 11659.svg" alt="motorbike-svg">
            </a>
            <?php endwhile; ?>
        </section>
        <?php endif; ?>