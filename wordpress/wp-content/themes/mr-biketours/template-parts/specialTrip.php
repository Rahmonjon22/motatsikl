        <!-- Fourth section -->
        <?php  wp_reset_postdata(); ?>
 <section class="specialTrip-section">

            <h1 class="ths-title"> Sonderreise</h1>
            <p class="ths-paragraph">Im September sind noch Plätze frei. Jetzt buchen und Vorfreunde sichern!</p>
            <?php
            $trip = get_field('special_trip');
            // var_dump($trip);
            $taxonomy_paragraph = get_field("taxonomy_paragraph", $trip->ID);
            $duration = get_field('duration', $trip->ID);
            $distance = get_field('distance', $trip->ID);
            $max_bikes = get_field('max_bikes', $trip->ID);
            $price = get_field('price', $trip->ID);
            // $title = get_the_title($trip->ID);
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
            <div class="ths-container">
                <div class="ths-card-container">
                    <div class="destination-tourism-container">
                        <h3 class="destination-country"><?php echo $tags ?></h3>
                        <h1 class="discovery"> <?php echo $title ?></h1>
                        <p class="lorem"><?php echo $taxonomy_paragraph ?></p>
                        <div class="tourismInKm">
                            <div class="days">
                                <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/svgs/icon_clock.svg" alt="questionInBox">
                                <h2><?php echo $duration ?></h2>
                            </div>
                            <div class="days">
                                <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/svgs/icon_road.svg" alt="questionInBox">
                                <h2> <?php echo $distance ?>km</h2>
                            </div>
                            <div class="days">
                                <img src="<?php echo get_stylesheet_directory_uri();?>/assets/images/svgs/Path 11659.svg" alt="questionInBox">
                                <h2>Max <?php echo $max_bikes ?> bikes</h2>
                            </div>
                        </div>
                        <div class="price-order">
                            <div class="price-info">
                                <p class="properson">ink.Flug pro Person</p>
                                <p>ab <span class="priceflight"><?php echo $price ?></span></p>
                            </div>
                            <a class="order-button" href="order">Jetzt entdecken</a>
                        </div>
                    </div>
                </div>
                <div class="ths-image-container"><img src=" <?php the_field('teaser_image', $trip->ID) ?>" alt="image"></div>
            </div>
        </section>
