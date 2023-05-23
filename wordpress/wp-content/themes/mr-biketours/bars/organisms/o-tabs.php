<?php
/**
 * calls the organisms for tabs in top or left orientation
 * @param $field
 * @param $page_id
 * @return bool
 */
function getOrganismTabs($field = 'o-tabs', $page_id = 0) {
	global $bars;

	?> <div class="row"><h2>TODO</h2></div> <?php

	if (have_rows($field,$page_id)) {
		if(get_field('tab_orientation', 'option') === 'top'){
			$bars->_print('tabs-top', $field);
		}else{
			$bars->_print('tabs-left', $field);
		}
	}

	return FALSE;
}