        <!-- Fourth section -->
        <?php 
               $clone = "c_last-minute";if(have_rows($clone)): 
    while(have_rows($clone)): the_row(); 
    $header_text = get_sub_field($clone."_header_text");
    $info_text = get_sub_field($clone."_info_text");
    $last_minute_price = get_sub_field($clone."_last_minute_price");
    ?>
        <section class="lastminute-section">
            <div class="frs-container">
                <div class="frs-leftcontainer">
                <h1><?php echo $header_text; ?></h1>
                    <p>I<?php echo $info_text; ?></p>
                    <p class="proPerson">inkl. Flug pro Person</p>
                    <p class="price">ab <span><?php echo $last_minute_price; ?> </span></p>
                    <button>Jetzt entdecken</button>
                </div>
                <div class="frs-rightcontainer">
                    <?php
                     $repeater = "r_boxes";
                     if(have_rows($repeater)): 
    while(have_rows($repeater)): the_row(); 
    $link = get_sub_field("link"); 
    $image = get_sub_field("image"); 
    $image_size_l = 'medium';
    $image_array_l = wp_get_attachment_image_src($image, $image_size_l);?> 
                      <a class="frs-box1" href="<?php echo $link["url"]; ?>" style="background:linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo $image_array_l[0]; ?>')">
                        <h3><?php echo $link["title"]; ?></h3><img src= "<?php echo get_stylesheet_directory_uri();?>/assets/images/svgs/arrow-right.svg" alt="arrowright">
                    </a>
                     <?php
                     endwhile;endif;   ?>
        
                </div>
            </div>
        </section>
        <?php endwhile;
endif; ?>