<?php

function the_breadcrumb() {
	echo '<div class="breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">';
    if (function_exists('bcn_display')):
        bcn_display();
    endif;
    echo '</div>';
}