        <!-- motortour Section start -->
        <?php 
               $clone = "c_introduction";if(have_rows($clone)): 
    while(have_rows($clone)): the_row(); 
    $headline = get_sub_field($clone."_headline");
    $subline = get_sub_field($clone."_subline");?>

        <section class="motortour-section">
            <div class="fs-img-container">
                <a href="#destination-section" class="fs-arrow-box">
                    <img class="fs-arrowdown" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/svgs/arrow-down.svg" alt="arrowdown">
                </a>
            </div>
            <div class="fs-text-container">
                <h1><?php echo $headline; ?></h1>
                <h3><?php echo $subline; ?></h3>
            </div>
        </section>
        <?php endwhile;
endif; ?>