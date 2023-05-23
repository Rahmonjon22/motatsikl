<section class="section-rental">
<?php
$clone = "c_introduction";
if (have_rows($clone)):

    while (have_rows($clone)):
        the_row();
        $headline = get_sub_field($clone . "_headline");
        $subline = get_sub_field($clone . "_subline");
        ?>
            <div class="bike-rental-container">
                <h1 class="bike-title AvenirBold">
                <?php echo $headline; ?>
                </h1>
                <p class="bike-subtitle AvenirRegular">  <?php echo $subline; ?> </p>
                <div class="tabContainer">
                    <div class="btnContainer">
                    <button class="btnContainer-btn " onclick="showPanel(0)"><span class="btn-span">USA | Mexiko</span>
                    <?php
                        $countries = get_terms("bikerental_countries");
                        $i = 1;
                        foreach ($countries as $country) { ?>
                            <button class="btnContainer-btn " onclick="showPanel(<?php echo $i ?>)"><span class="btn-span">
                                    <?php echo $country->name ?>
                                </span></button>

                            <?php $i++;
                        }
                        ?>
                         </button>
                    </div>
                        <!-- *********** BIKE RENTAL STARTS HERE ************* -->
                    <div class="tabPanel">
                        <h2 class="bikeTP-title ">Mietmotorräder im Reisepreis enthalten</h2>
                        <p class="bikeTP-subtitle">Eingeschränkte Modell-Verfügbarkeit an einigen Mietstationen</p>
                        <div class="bikeTP-motors-container">
                            <div class="bikeTP-bg-img">
                                <div class="bg-img-bikeTP"></div>
                            </div>
                            <div class="bikeTP-grid-motors">   
                            <?php
                        $query = new WP_Query(
                            array(
                                'post_type' => 'bikerental',
                                'tax_query' => array(
                                array (
                                'taxonomy' => 'bikerental_countries',
                                'field' => 'slug',
                                'terms' => 'kanada',
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
                                $class_type = get_field("class_type");
                                $duration = get_field("duration");
                                $img = get_the_post_thumbnail();
                                $tripcountries = get_the_terms($post->ID, "bikerental_countries");
                                $tags = "";
                                foreach ($tripcountries as $tripcountry) {
                                    $tags .= $tripcountry->name . ", ";
                                    // 
                                }
                                ?>                       
                                <div class="motors-container">
                                    <div class="motorsssss ">
                                        <div class="motor-box">
                                            <div class="motors-img ">
                                                <h4 class="mt-size-class AvenirDemi"><?php echo $class_type; ?>
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">HD Street Glide®</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>

                                <div class="motors-container">
                                    <div class="motorsssss ">
                                        <div class="motor-box">
                                            <div class="motors-img bike2">
                                                <h4 class="mt-size-class AvenirDemi">A
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">HD Street Glide®</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="motors-container">
                                    <div class="motorsssss ">
                                        <div class="motor-box">
                                            <div class="motors-img bike3">
                                                <h4 class="mt-size-class AvenirDemi">A
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">HD Road Glide®</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="motors-container">

                                    <div class="motorsssss ">
                                        <div class="motor-box">
                                            <div class="motors-img bike4">
                                                <h4 class="mt-size-class AvenirDemi">A
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">HD Heritage Softail®</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="motors-container">
                                    <div class="motorsssss ">
                                        <div class="motor-box">
                                            <div class="motors-img bike5">
                                                <h4 class="mt-size-class AvenirDemi">A
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">HD Road King®</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="motors-container">
                                    <div class="motorsssss mobilenone" style="visibility: hidden;">
                                        <div class="motor-box">
                                            <div class="motors-img bike2">
                                                <h4 class="mt-size-class AvenirDemi">A
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">HD Street Glide®</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="motors-container">
                                    <div class="motorsssss ">
                                        <div class="motor-box">
                                            <div class="motors-img bike6">
                                                <h4 class="mt-size-class AvenirDemi">A
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">Yamaha® Bolt</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="motors-container">
                                    <div class="motorsssss ">
                                        <div class="motor-box">
                                            <div class="motors-img bike7">
                                                <h4 class="mt-size-class AvenirDemi">A
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">Yamaha MT-07®</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="motors-container">
                                    <div class="motorsssss ">
                                        <div class="motor-box">
                                            <div class="motors-img bike8">
                                                <h4 class="mt-size-class AvenirDemi">A
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">Yamaha Super Ténéré®</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <h2 class="bikeTP-title " style="margin-top: 40px;">Modelle auf Anfrage gegen Aufpreis</h2>
                        <p class="bikeTP-subtitle"><span class="bikeTP-subtitle-span">ab € 30,-</span> pro Fahrtag</p>
                        <div class="bikeTP-motors-container">
                            <div class="bikeTP-motors-bg-image"></div>
                            <div class="bikeTP-grid-motors">
                                <div class="motors-container">
                                    <div class="motorsssss ">
                                        <div class="motor-box">
                                            <div class="motors-img bike8">
                                                <h4 class="mt-size-class AvenirDemi">B
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">HD Ultra Limited®</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="motors-container">
                                    <div class="motorsssss ">
                                        <div class="motor-box">
                                            <div class="motors-img bike6">
                                                <h4 class="mt-size-class AvenirDemi">B
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">BMW® R1200 GS</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="motors-container">
                                    <div class="motorsssss ">
                                        <div class="motor-box">
                                            <div class="motors-img bike7">
                                                <h4 class="mt-size-class AvenirDemi">B
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">BMW® R1200 RT</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                       <!-- *********** BIKE RENTAL ENDS HERE ************* -->
                   
                    <div class="tabPanel">

                    <h2 class="bikeTP-title ">Mietmotorräder im Reisepreis enthalten</h2>
                        <p class="bikeTP-subtitle">Eingeschränkte Modell-Verfügbarkeit an einigen Mietstationen</p>
                        <div class="bikeTP-motors-container">
                            <div class="bikeTP-bg-img">
                                <div class="bg-img-bikeTP"></div>
                            </div>
                            <div class="bikeTP-grid-motors">   
                            <?php
                        $query = new WP_Query(
                            array(
                                'post_type' => 'bikerental',
                                'tax_query' => array(
                                array (
                                'taxonomy' => 'bikerental_countries',
                                'field' => 'slug',
                                'terms' => 'kanada',
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
                                $class_type = get_field("class_type");
                                $duration = get_field("duration");
                                $img = get_the_post_thumbnail();
                                $tripcountries = get_the_terms($post->ID, "bikerental_countries");
                                $tags = "";
                                foreach ($tripcountries as $tripcountry) {
                                    $tags .= $tripcountry->name . ", ";
                                    // 
                                }
                                ?>                       
                                <div class="motors-container">
                                    <div class="motorsssss ">
                                        <div class="motor-box">
                                            <div class="motors-img ">
                                                <h4 class="mt-size-class AvenirDemi"><?php echo $class_type; ?>
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">HD Street Glide®</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>

                                <div class="motors-container">
                                    <div class="motorsssss ">
                                        <div class="motor-box">
                                            <div class="motors-img bike2">
                                                <h4 class="mt-size-class AvenirDemi">A
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">HD Street Glide®</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="motors-container">
                                    <div class="motorsssss ">
                                        <div class="motor-box">
                                            <div class="motors-img bike3">
                                                <h4 class="mt-size-class AvenirDemi">A
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">HD Road Glide®</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="motors-container">

                                    <div class="motorsssss ">
                                        <div class="motor-box">
                                            <div class="motors-img bike4">
                                                <h4 class="mt-size-class AvenirDemi">A
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">HD Heritage Softail®</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="motors-container">
                                    <div class="motorsssss ">
                                        <div class="motor-box">
                                            <div class="motors-img bike5">
                                                <h4 class="mt-size-class AvenirDemi">A
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">HD Road King®</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="motors-container">
                                    <div class="motorsssss mobilenone" style="visibility: hidden;">
                                        <div class="motor-box">
                                            <div class="motors-img bike2">
                                                <h4 class="mt-size-class AvenirDemi">A
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">HD Street Glide®</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="motors-container">
                                    <div class="motorsssss ">
                                        <div class="motor-box">
                                            <div class="motors-img bike6">
                                                <h4 class="mt-size-class AvenirDemi">A
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">Yamaha® Bolt</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="motors-container">
                                    <div class="motorsssss ">
                                        <div class="motor-box">
                                            <div class="motors-img bike7">
                                                <h4 class="mt-size-class AvenirDemi">A
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">Yamaha MT-07®</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="motors-container">
                                    <div class="motorsssss ">
                                        <div class="motor-box">
                                            <div class="motors-img bike8">
                                                <h4 class="mt-size-class AvenirDemi">A
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">Yamaha Super Ténéré®</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <h2 class="bikeTP-title " style="margin-top: 40px;">Modelle auf Anfrage gegen Aufpreis</h2>
                        <p class="bikeTP-subtitle"><span class="bikeTP-subtitle-span">ab € 30,-</span> pro Fahrtag</p>
                        <div class="bikeTP-motors-container">
                            <div class="bikeTP-motors-bg-image"></div>
                            <div class="bikeTP-grid-motors">
                                <div class="motors-container">
                                    <div class="motorsssss ">
                                        <div class="motor-box">
                                            <div class="motors-img bike8">
                                                <h4 class="mt-size-class AvenirDemi">B
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">HD Ultra Limited®</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="motors-container">
                                    <div class="motorsssss ">
                                        <div class="motor-box">
                                            <div class="motors-img bike6">
                                                <h4 class="mt-size-class AvenirDemi">B
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">BMW® R1200 GS</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="motors-container">
                                    <div class="motorsssss ">
                                        <div class="motor-box">
                                            <div class="motors-img bike7">
                                                <h4 class="mt-size-class AvenirDemi">B
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                    <img class="size-class-svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/person.svg"
                                                        alt="person">
                                                </h4>
                                            </div>
                                            <h4 class="mt-type-class AvenirDemi">BMW® R1200 RT</h4>
                                        </div>
                                        <div class="motor-hidden-box">
                                            <p class="hidden-paragraph">Milwaukee-Eight® 107, 1.746 ccm, 90 PS,
                                                6-Gang-Getriebe, 22,7l Tank, </p>
                                            <p class="hidden-paragraph">Sitzhöhe 663 mm, Bodenfreiheit 135 mm, ca. 376
                                                kg, GPS,</p>
                                            <p class="hidden-paragraph">GPS, USB, Bluetooth, Lautsprecher,
                                                Geschwindigkeitsregelung, ABS</p>
                                            <button class="hidden-button"><a class="hidden-hypertext" href="#">Wichtige
                                                    Informationen zur Vermietung</a></button>
                                        </div>
                                        <button class="hide-show">
                                            <p class="mt-more-info AvenirMedium underlineonHover">Technische Daten
                                                <svg width="11px" height="20px" viewBox="0 0 11 20" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>arrow_forward_ios</title>
                                                    <desc>Created with Sketch.</desc>
                                                    <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <g id="Rounded"
                                                            transform="translate(-345.000000, -3434.000000)">
                                                            <g id="Navigation"
                                                                transform="translate(100.000000, 3378.000000)">
                                                                <g id="-Round-/-Navigation-/-arrow_forward_ios"
                                                                    transform="translate(238.000000, 54.000000)">
                                                                    <g>
                                                                        <polygon id="Path" opacity="0.87"
                                                                            points="24 24 0 24 0 0 24 0"></polygon>
                                                                        <path
                                                                            d="M7.38,21.01 C7.87,21.5 8.66,21.5 9.15,21.01 L17.46,12.7 C17.85,12.31 17.85,11.68 17.46,11.29 L9.15,2.98 C8.66,2.49 7.87,2.49 7.38,2.98 C6.89,3.47 6.89,4.26 7.38,4.75 L14.62,12 L7.37,19.25 C6.89,19.73 6.89,20.53 7.38,21.01 Z"
                                                                            id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </p>
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                       <!-- *********** BIKE RENTAL ENDS HERE ************* -->
                   
                    
                    </div>
                </div>

            </div>

            <?php endwhile;
endif; ?>
            </div>

        </section>