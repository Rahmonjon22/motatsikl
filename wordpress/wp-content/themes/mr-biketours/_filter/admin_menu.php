<?php
// Kommentare aus dem Backend entfernen

function remove_menus(){
  remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'remove_menus' );

add_filter('show_admin_bar', '__return_false');