<?php
/* Template Name: Home */
get_header();
include "_templates/top.php";?>
 <main>
        <!-- motortour Section start -->
       <?php get_template_part("template-parts/introduction");?>
		<?php  get_template_part("template-parts/destination");?>
        <?php  get_template_part("template-parts/specialTrip");?>
       <!-- Fourth section -->
        <?php  get_template_part("template-parts/last-minute");?>
        <!-- gallery section -->
        <?php  get_template_part("template-parts/gallery-section");?>
    </main>
<?php get_footer(); ?>



