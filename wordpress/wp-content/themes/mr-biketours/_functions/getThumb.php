<?php
function bars__get_thumb($org, $options = array()) {
	$basic = array('min' => 0, 'max' => 1980);
	$options = array_merge($basic, $options);
	$image = $org;

	$image = substr($image,strpos($image,'wp-content/'));
	$dir = dirname($image)."/";
	$url = str_replace($image, "", $org);
	$sizes = getimagesize(ABSPATH . $image);
	$sizes = array('width' => $sizes[0], 'height' => $sizes[1], 'mime' => $sizes['mime']);
	$thumb = "";
	if ($sizes['width'] > $options['max']) {
		$name = basename($image);
		$t = explode(".", basename($image));
		$ext = array_pop($t);
		$n = str_replace("." . $ext, "-", $name);
		$biggest = 0;

		foreach (glob(ABSPATH . $dir . $n . "*." . $ext) as $file) {
			$s = getimagesize($file);
			if (filesize($file) > $biggest && basename($file) != basename($image) && $s[0] > $options['min'] && $s[0] <= $options['max']) {
				$thumb = str_replace(ABSPATH, $url, $file);
				$biggest = filesize($file);
			}
		};
	}
	if ($thumb === "") {
		return $org;
	}

	return $thumb;
}

function bars__getimagesizes($org) {

	$image = $org;
	$image = substr($image,strpos($image,'wp-content/'));
	$sizes = getimagesize(ABSPATH . $image);
	$sizes = array('width' => $sizes[0], 'height' => $sizes[1], 'mime' => $sizes['mime']);

	return $sizes;

}