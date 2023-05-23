<!--Footer -->

<footer class="d-block bg--gray-darker">

	<div class="container-fluid">
		
		footer 2

	</div>


</footer>

<!-- /Footer-->


<!--Footer2-->

<footer class="bar bar--footer  bar--footer--copyright">

	<div class="container text-small">

		<?php pd__showMenu('meta-menu'); ?>

	</div>

</footer>
<script>
jQuery(window).scroll(function() {    
    var scroll = jQuery(window).scrollTop();

    if (scroll >= 70) {
        jQuery(".navbar").addClass("darkHeader");
    } else {
        jQuery(".navbar").removeClass("darkHeader");
    }
});
</script>
<!--/Footer2-->
