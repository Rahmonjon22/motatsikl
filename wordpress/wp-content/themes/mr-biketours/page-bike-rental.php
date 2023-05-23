<?php
/* Template Name: Bike-Rental */
$body_class = "bikes-body";
get_header();
include "_templates/top-bike-rental.php";?>
 <main class="bikes">
        <!-- motortour Section start -->
       <?php get_template_part("template-parts/bike-rental");?>
		<?php  get_template_part("template-parts/accordion-bikes");?>
        <?php  get_template_part("template-parts/fanartical-bike");?>
        <!-- gallery section -->
        <?php  get_template_part("template-parts/gallery-section");?>
    </main>
<?php get_footer(); ?>



