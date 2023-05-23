		<!--Footer -->
		<footer>
        <div class="footer-mainpart">
            <div class="footer-info-container">
                <div class="footer-leftside">
                    <div class="footer-kundensupport">
                        <h2>KUNDENSUPPORT</h2>
                        <p><a href="tel:+49-571-882-86">+49 (0) 571 882 86</a></p>
                        <p><a href= "mailto:info@mr-biketours.de">info@mr-biketours.de</a></p>
                         <p>Katalog anfordem</p>
                    </div>
                    <div class="footer-uberuns">
                        <h2>Über uns</h2>
                        <p>Über MR Biketours</p>
                        <p>Unser Team</p>
                    </div>
                </div>
                <div class="footer-rightside">
                    <div class="footer-newsletter">
                        <h1>Newsletter abonnieren</h1>
                        <div class="footer-input">
                            <input type="text" placeholder="Ihre E-Mail-Adresse">
                            <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/arrow-black-right.svg" alt="arrow"></a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="footer-group-image">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Group 42.png" alt="group">
            </div>
        </div>

        <div class="footer-Impressum-container">
            <div class="footer-impressum">
                <h3>© 2022 MR Biketours, Obermarktstr. 28-30, D 32423 Minden</h3>
                <h4>Impressum</h4>
                <hr class="footer-vertical">
                <h4>DatenSchutz</h4>
            </div>
            <div class="footer-social-icons">
                <div class="icon-holder">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/facebook.svg" alt="Facebook">
                </div>
                <div class="icon-holder">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/instagram.svg" alt="Instagram">
                </div>
                <div class="icon-holder">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/svgs/youtube.svg" alt="youtube">
                </div>
            </div>
        </div>

    </footer>
		    <script src="<?php echo get_stylesheet_directory_uri();?>/assets/Javascript/jquery-3.1.0.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri();?>/assets/Javascript/form.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri();?>/assets/Javascript/jbvalidator.min.js"></script>
		<!-- /Footer-->
		<?php wp_footer(); ?>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
      <script>
        console.log("hell11o");
        console.log(jQuery);
jQuery(window).scroll(function() {    
    console.log("hello");
	var scroll = jQuery(window).scrollTop();
		
    if (scroll >= 70) {
        jQuery(".navbar").addClass("darkHeader");
    } else {
        jQuery(".navbar").removeClass("darkHeader");
    }
});
</script>
  	</body>

</html>
