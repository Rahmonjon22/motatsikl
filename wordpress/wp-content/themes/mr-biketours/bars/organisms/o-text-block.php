<?php
/**
 * @param $field
 * @param $page_id
 * @return bool
 */
function getOrganismTextBlock($field = 'o-text_block', $page_id = 0) {

	?><div class="">
		<div><?php the_field($field.'_a-overline',$page_id); ?></div>
		<h4><?php the_field($field.'_a-headline',$page_id); ?></h4>
		<h5><?php the_field($field.'_a-subline',$page_id); ?></h5>
		<div><?php the_field($field.'_a-text',$page_id); ?></div>
	</div>
	<?php

	return TRUE;
}