<?php
/**
 * Created by PhpStorm.
 * User: Olli
 * Date: 22.03.2017
 * Time: 15:10
 */
/**
 *
 */
function getHelperAnsprechpartner($field,$page_id) {
	$query = new WP_Query( array('post_type' => 'ansprechpartner', 'orderby' => 'sorting') );
	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
		$page_id = get_the_ID();
		the_field('firstname',$page_id);
		the_field('lastname',$page_id);
		the_field('image',$page_id);
		the_field('position',$page_id);
		the_field('address',$page_id);
		the_field('phone',$page_id);
		the_field('fax',$page_id);
		the_field('email',$page_id);
	endwhile;
	endif;


}