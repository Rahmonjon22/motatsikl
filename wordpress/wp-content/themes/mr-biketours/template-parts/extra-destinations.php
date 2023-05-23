<!-- destination Section start -->

<section id="destination-section " class="destination-section afrika-section">
    <div class="afrika-title-box">
        <?php
        $extra_destination_headline = get_field('extra_destination_headline');
        ?>
        <h1 class="afrika-title AvenirBold">
            <?php echo $extra_destination_headline; ?>
        </h1>
    </div>
    <div href="usa-biketour.html" class="card-tourisim">

        <?php
        $query = new WP_Query(
            array(
                'post_type' => 'trip',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'trip_countries',
                        'field' => 'slug',
                        'terms' => 'usa',
                    )
                ),
                'post_status' => 'publish',
                'posts_per_page' => -1
            )
        );
        if ($query->have_posts()):
            while ($query->have_posts()):
                $query->the_post();
                //var_dump($post);
                $title = get_the_title();
                $link = get_the_permalink();
                $tour_type = get_field("tour_type");
                $duration = get_field("duration");
                $img = get_the_post_thumbnail();
                $tripcountries = get_the_terms($post->ID, "trip_countries");
                $tags = "";
                $i = 1;
                foreach ($tripcountries as $tripcountry) {
                    $tags .= $tripcountry->name;
                    if(count($tripcountries) >  $i ){
                        $tags .= ", ";
                    }
                    $i++;
                }
                ?>
                <a class="card-container">
                    <img src="<?php echo $img ?>" alt="lasvegas">
                    <div class="card-text-container">
                        <h2 class="uppercase">
                            <?php echo $tags ?>
                        </h2>
                        <div class="card-firsttext">
                            <h1 class="AvenirBold"> <?php echo $title; ?></h1>
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/arrow-black-right.svg"
                                alt="arrow-black-right">
                        </div>
                        <div class="card-firsttext">
                            <h3><?php echo $tour_type; ?></h3>
                            <h3 class="tage">  <?php echo $duration ?></h3>
                        </div>
                    </div>
                </a>
            <?php
            endwhile;
        endif;
        wp_reset_postdata();
        ?>
    </div>

</section>