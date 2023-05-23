    <!-- Atemberaubende Natur-section -->
	<section class="atemberaubende-section">
    <?php
$clone = "c_destination";
if (have_rows($clone)):

    while (have_rows($clone)):
        the_row();
        $headline = get_sub_field($clone . "_headline");
        $info_headline_text = get_sub_field($clone . "_info_headline_text");
        ?>
            <div class="left-afrika">
                <h1 class="AvenirDemi"> <?php echo $headline; ?></h1>
                <p class="AvenirRegular"> <?php echo $info_headline_text; ?></p>
            </div>
            <?php endwhile;
endif; ?>

            <div class="right-afrika">
                <div class="afrika-card">
                <?php
            // var_dump($trip);
            $duration = get_field('duration');
            $distance = get_field('distance');
            $max_bikes = get_field('max_bikes');
            $price = get_field('price' );
            $starting_period = get_field('starting_period');
            $ending_period = get_field('ending_period');
            $new_bonus = get_field('new_bonus');

            $tripcountries = get_the_terms($post->ID, "trip_countries");
            $tags = "";
            $i = 1;
            echo count($tripcountries);
            foreach ($tripcountries as $tripcountry) {
                $tags .= $tripcountry->name;
                if(count($tripcountries) >  $i ){
                    $tags .= ", ";
                }
                $i++;
                // 
            }
            $title = get_the_title();
            ?>
                    <div class="destination-tourism-box">
                        <h3 class="destination-country"><?php echo $tags ?></h3>
                        <h2 class="discovery"><?php echo $title ?></h2>
                        <p class="start-termin">
                            Starttermin: <?php echo $starting_period; ?> - <?php echo $ending_period; ?>
                        </p>
                        <p class="p-neu"><span>Neu!</span><?php echo $new_bonus; ?></p>
                        <div class="tourismInKm">
                            <div class="days">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/icon_clock.svg" alt="questionInBox">
                                <h2>   <?php echo $duration; ?></h2>
                            </div>
                            <div class="days">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/icon_road.svg" alt="questionInBox">
                                <h2> <?php echo $distance; ?> km</h2>
                            </div>
                            <div class="days">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/Path 11659.svg" alt="questionInBox">
                                <h2>Max <?php echo $max_bikes; ?> Bikes</h2>
                            </div>
                        </div>
                    </div>
                    

                    <div class="afrika-options">
                        <div class="option">
                            <div class="option-info">
                                <p class="AvenirRegular"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg" alt="person"> 2 Personen
                                </p>
                                <p class="AvenirRegular "><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/sleeping-bed.svg"
                                        alt="sleeping-bed"> DZ</p>
                                <p class="AvenirRegular">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="34.716" height="19.287"
                                        viewBox="0 0 34.716 19.287">
                                        <path id="Path_11659" data-name="Path 11659"
                                            d="M34.669-7.533a6.543,6.543,0,0,1-.331,2.991,6.826,6.826,0,0,1-1.492,2.463,6.791,6.791,0,0,1-2.388,1.6A6.577,6.577,0,0,1,27.5-.015,6.551,6.551,0,0,1,23.286-1.9a6.462,6.462,0,0,1-2.027-4.128A6.558,6.558,0,0,1,21.674-9.2a6.761,6.761,0,0,1,1.785-2.569l-1.07-1.612a8.652,8.652,0,0,0-2.275,2.923,8.351,8.351,0,0,0-.829,3.676.983.983,0,0,1-.279.7.908.908,0,0,1-.686.294h-4.9A6.521,6.521,0,0,1,11.18-1.657,6.526,6.526,0,0,1,6.75,0,6.5,6.5,0,0,1,1.981-1.981,6.5,6.5,0,0,1,0-6.75a6.5,6.5,0,0,1,1.981-4.769A6.5,6.5,0,0,1,6.75-13.5a6.8,6.8,0,0,1,2.29.407l.362-.678a6.62,6.62,0,0,0-4.58-1.657H3.857a.927.927,0,0,1-.678-.286.927.927,0,0,1-.286-.678.927.927,0,0,1,.286-.678.927.927,0,0,1,.678-.286H5.786a11.063,11.063,0,0,1,2.185.2,6.923,6.923,0,0,1,1.755.58,11.857,11.857,0,0,1,1.077.6q.331.218.768.55h9.447l-1.281-1.929H16.393a.922.922,0,0,1-.738-.339.933.933,0,0,1-.211-.791.907.907,0,0,1,.347-.573,1.018,1.018,0,0,1,.648-.226H20.25a.936.936,0,0,1,.8.422L22.1-17.282,23.821-19a.944.944,0,0,1,.693-.286h1.522a.927.927,0,0,1,.678.286.927.927,0,0,1,.286.678v1.929a.927.927,0,0,1-.286.678.927.927,0,0,1-.678.286h-2.7l1.733,2.592a6.544,6.544,0,0,1,4.143-.542,6.494,6.494,0,0,1,3.676,2.027A6.606,6.606,0,0,1,34.669-7.533ZM6.75-1.929A4.671,4.671,0,0,0,9.809-3.021a4.729,4.729,0,0,0,1.672-2.765H6.75a.938.938,0,0,1-.829-.467A.921.921,0,0,1,5.906-7.2l2.215-4.174a5.135,5.135,0,0,0-1.371-.2,4.643,4.643,0,0,0-3.405,1.416A4.643,4.643,0,0,0,1.929-6.75,4.643,4.643,0,0,0,3.345-3.345,4.643,4.643,0,0,0,6.75-1.929ZM24.559-3.345a4.643,4.643,0,0,0,3.405,1.416,4.643,4.643,0,0,0,3.405-1.416A4.643,4.643,0,0,0,32.786-6.75a4.643,4.643,0,0,0-1.416-3.405,4.643,4.643,0,0,0-3.405-1.416,4.952,4.952,0,0,0-1.823.362l2.622,3.917a.971.971,0,0,1,.151.738.883.883,0,0,1-.407.6.892.892,0,0,1-.542.166.882.882,0,0,1-.8-.437L24.544-10.14a4.683,4.683,0,0,0-1.4,3.39A4.643,4.643,0,0,0,24.559-3.345Z"
                                            transform="translate(0 19.286)" fill="black" />
                                    </svg>
                                    1 Motorrad
                                </p>
                                <h2 class="option-price AvenirDemi">€ 4.795 <span>p.P</span></h2>
                                <h2 class="AvenirDemi inclusive">inkl.Flug</h2>
                            </div>
                            <button>Auswählen</button>
                        </div>
                        <div class="option">
                            <div class="option-info">
                                <p class="AvenirRegular"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg" alt="person">2 Personen
                                </p>
                                <p class="AvenirRegular"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/sleeping-bed.svg"
                                        alt="sleeping-bed">DZ</p>
                                <p class="AvenirRegular">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="34.716" height="19.287"
                                        viewBox="0 0 34.716 19.287">
                                        <path id="Path_11659" data-name="Path 11659"
                                            d="M34.669-7.533a6.543,6.543,0,0,1-.331,2.991,6.826,6.826,0,0,1-1.492,2.463,6.791,6.791,0,0,1-2.388,1.6A6.577,6.577,0,0,1,27.5-.015,6.551,6.551,0,0,1,23.286-1.9a6.462,6.462,0,0,1-2.027-4.128A6.558,6.558,0,0,1,21.674-9.2a6.761,6.761,0,0,1,1.785-2.569l-1.07-1.612a8.652,8.652,0,0,0-2.275,2.923,8.351,8.351,0,0,0-.829,3.676.983.983,0,0,1-.279.7.908.908,0,0,1-.686.294h-4.9A6.521,6.521,0,0,1,11.18-1.657,6.526,6.526,0,0,1,6.75,0,6.5,6.5,0,0,1,1.981-1.981,6.5,6.5,0,0,1,0-6.75a6.5,6.5,0,0,1,1.981-4.769A6.5,6.5,0,0,1,6.75-13.5a6.8,6.8,0,0,1,2.29.407l.362-.678a6.62,6.62,0,0,0-4.58-1.657H3.857a.927.927,0,0,1-.678-.286.927.927,0,0,1-.286-.678.927.927,0,0,1,.286-.678.927.927,0,0,1,.678-.286H5.786a11.063,11.063,0,0,1,2.185.2,6.923,6.923,0,0,1,1.755.58,11.857,11.857,0,0,1,1.077.6q.331.218.768.55h9.447l-1.281-1.929H16.393a.922.922,0,0,1-.738-.339.933.933,0,0,1-.211-.791.907.907,0,0,1,.347-.573,1.018,1.018,0,0,1,.648-.226H20.25a.936.936,0,0,1,.8.422L22.1-17.282,23.821-19a.944.944,0,0,1,.693-.286h1.522a.927.927,0,0,1,.678.286.927.927,0,0,1,.286.678v1.929a.927.927,0,0,1-.286.678.927.927,0,0,1-.678.286h-2.7l1.733,2.592a6.544,6.544,0,0,1,4.143-.542,6.494,6.494,0,0,1,3.676,2.027A6.606,6.606,0,0,1,34.669-7.533ZM6.75-1.929A4.671,4.671,0,0,0,9.809-3.021a4.729,4.729,0,0,0,1.672-2.765H6.75a.938.938,0,0,1-.829-.467A.921.921,0,0,1,5.906-7.2l2.215-4.174a5.135,5.135,0,0,0-1.371-.2,4.643,4.643,0,0,0-3.405,1.416A4.643,4.643,0,0,0,1.929-6.75,4.643,4.643,0,0,0,3.345-3.345,4.643,4.643,0,0,0,6.75-1.929ZM24.559-3.345a4.643,4.643,0,0,0,3.405,1.416,4.643,4.643,0,0,0,3.405-1.416A4.643,4.643,0,0,0,32.786-6.75a4.643,4.643,0,0,0-1.416-3.405,4.643,4.643,0,0,0-3.405-1.416,4.952,4.952,0,0,0-1.823.362l2.622,3.917a.971.971,0,0,1,.151.738.883.883,0,0,1-.407.6.892.892,0,0,1-.542.166.882.882,0,0,1-.8-.437L24.544-10.14a4.683,4.683,0,0,0-1.4,3.39A4.643,4.643,0,0,0,24.559-3.345Z"
                                            transform="translate(0 19.286)" fill="black" />
                                    </svg>
                                    2 Motorräder
                                </p>
                                <h2 class="option-price AvenirDemi">€ 5.795 <span>p.P</span></h2>
                                <h2 class="AvenirDemi inclusive">inkl.Flug</h2>
                            </div>
                            <button>Auswählen</button>
                        </div>
                        <div class="option">
                            <div class="option-info">
                                <p class="AvenirRegular"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg" alt="person">1 Person</p>
                                <p class="uppercase AvenirRegular"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/sleeping-bed.svg"
                                        alt="sleeping-bed">EZ</p>
                                <p class="AvenirRegular">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="34.716" height="19.287"
                                        viewBox="0 0 34.716 19.287">
                                        <path id="Path_11659" data-name="Path 11659"
                                            d="M34.669-7.533a6.543,6.543,0,0,1-.331,2.991,6.826,6.826,0,0,1-1.492,2.463,6.791,6.791,0,0,1-2.388,1.6A6.577,6.577,0,0,1,27.5-.015,6.551,6.551,0,0,1,23.286-1.9a6.462,6.462,0,0,1-2.027-4.128A6.558,6.558,0,0,1,21.674-9.2a6.761,6.761,0,0,1,1.785-2.569l-1.07-1.612a8.652,8.652,0,0,0-2.275,2.923,8.351,8.351,0,0,0-.829,3.676.983.983,0,0,1-.279.7.908.908,0,0,1-.686.294h-4.9A6.521,6.521,0,0,1,11.18-1.657,6.526,6.526,0,0,1,6.75,0,6.5,6.5,0,0,1,1.981-1.981,6.5,6.5,0,0,1,0-6.75a6.5,6.5,0,0,1,1.981-4.769A6.5,6.5,0,0,1,6.75-13.5a6.8,6.8,0,0,1,2.29.407l.362-.678a6.62,6.62,0,0,0-4.58-1.657H3.857a.927.927,0,0,1-.678-.286.927.927,0,0,1-.286-.678.927.927,0,0,1,.286-.678.927.927,0,0,1,.678-.286H5.786a11.063,11.063,0,0,1,2.185.2,6.923,6.923,0,0,1,1.755.58,11.857,11.857,0,0,1,1.077.6q.331.218.768.55h9.447l-1.281-1.929H16.393a.922.922,0,0,1-.738-.339.933.933,0,0,1-.211-.791.907.907,0,0,1,.347-.573,1.018,1.018,0,0,1,.648-.226H20.25a.936.936,0,0,1,.8.422L22.1-17.282,23.821-19a.944.944,0,0,1,.693-.286h1.522a.927.927,0,0,1,.678.286.927.927,0,0,1,.286.678v1.929a.927.927,0,0,1-.286.678.927.927,0,0,1-.678.286h-2.7l1.733,2.592a6.544,6.544,0,0,1,4.143-.542,6.494,6.494,0,0,1,3.676,2.027A6.606,6.606,0,0,1,34.669-7.533ZM6.75-1.929A4.671,4.671,0,0,0,9.809-3.021a4.729,4.729,0,0,0,1.672-2.765H6.75a.938.938,0,0,1-.829-.467A.921.921,0,0,1,5.906-7.2l2.215-4.174a5.135,5.135,0,0,0-1.371-.2,4.643,4.643,0,0,0-3.405,1.416A4.643,4.643,0,0,0,1.929-6.75,4.643,4.643,0,0,0,3.345-3.345,4.643,4.643,0,0,0,6.75-1.929ZM24.559-3.345a4.643,4.643,0,0,0,3.405,1.416,4.643,4.643,0,0,0,3.405-1.416A4.643,4.643,0,0,0,32.786-6.75a4.643,4.643,0,0,0-1.416-3.405,4.643,4.643,0,0,0-3.405-1.416,4.952,4.952,0,0,0-1.823.362l2.622,3.917a.971.971,0,0,1,.151.738.883.883,0,0,1-.407.6.892.892,0,0,1-.542.166.882.882,0,0,1-.8-.437L24.544-10.14a4.683,4.683,0,0,0-1.4,3.39A4.643,4.643,0,0,0,24.559-3.345Z"
                                            transform="translate(0 19.286)" fill="black" />
                                    </svg>
                                    1 Motorrad
                                </p>
                                <h2 class="option-price AvenirDemi">€ 4.795 <span>p.P</span></h2>
                                <h2 class="AvenirDemi inclusive">inkl.Flug</h2>
                            </div>
                            <button>Auswählen</button>
                        </div>
                        <button class="uppercase AvenirDemi">Jetzt buchen</button>
                        <p class="AvenirMedium merkliste">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 50 50"
                                style="enable-background:new 0 0 50 50;" xml:space="preserve" fill="black">
                                <g id="Layer_1">
                                    <path
                                        d="M45.281,25.915c4.949-5.004,4.949-13.146,0-18.15C42.881,5.337,39.688,4,36.292,4c-0.001,0-0.001,0-0.001,0
                               c-3.396,0-6.59,1.337-8.991,3.765L25,10.09l-2.3-2.325C20.299,5.337,17.106,4,13.709,4c-3.396,0-6.589,1.337-8.99,3.765
                               c-4.949,5.004-4.949,13.146,0,18.15L25,46.422L45.281,25.915z M6.141,9.171C8.163,7.126,10.852,6,13.709,6
                               c2.858,0,5.547,1.126,7.569,3.171L25,12.935l3.722-3.764C30.744,7.126,33.433,6,36.291,6c2.858,0,5.546,1.126,7.568,3.171
                               c4.183,4.229,4.183,11.109,0,15.338L25,43.578L6.141,24.509C1.958,20.28,1.958,13.399,6.141,9.171z" />
                                </g>
                                <g>
                                </g>
                            </svg>
                            Merkliste
                        </p>
                    </div>


                </div>
            </div>
        </section>