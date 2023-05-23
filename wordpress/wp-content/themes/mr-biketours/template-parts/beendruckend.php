<!-- beeindruckend-section -->
<?php
$clone = "c_introduction";
if (have_rows($clone)):

    while (have_rows($clone)):
        the_row();
        $headline = get_sub_field($clone . "_headline");
        $subline = get_sub_field($clone . "_subline");
        $front_img = get_sub_field($clone . "_front_img");
        $bg_img = get_sub_field($clone . "_bg_img");
        ?>
  <section class="beeindruckend-section">
            <div class="left-beendruckend">
                <h1><?php echo $headline; ?></h1>
                <p> <?php echo $subline; ?></p>
            </div>
            <div class="right-beendruckend">
                <div class="beendruckend-image" style="background-image: url('<?php echo $bg_img ?>');"></div>
                <div class="beendruckend-image2">  <img src="<?php echo $front_img ?>" alt="usa-motorbike"></div>
            </div>
        </section>
        <?php endwhile;
endif; ?>

