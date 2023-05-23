<?php
/**
 * Created by PhpStorm.
 * User: Olli
 * Date: 12.02.2018
 * Time: 15:36
 */

function getTeaser($text, $length = 300) {
	$text = strip_tags($text);
	if (strlen($text) > $length) {
		$leer = strrpos(substr($text, 0, $length), ' ');
		$punkt = strrpos(substr($text, 0, $length), '.');
		$komma = strrpos(substr($text, 0, $length), '.');
		if ($komma > $leer) {
			$leer = $komma;
		}
		if ($punkt > $leer) {
			$leer = $punkt;
		}
		$text = substr($text, 0, $leer);
		$text .= "...";
	}

	return $text;
}