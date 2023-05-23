<?php

/**
 * Google Recaptca verify
 */
$responseData = FALSE;
if(isset($_POST['g-recaptcha-response'])) {
	$g_secret = "6LctBNkbAAAAACdjXBF--DVUyL3-VEN-fkopI8ZU";
	//$verifyResponse = get_content('https://www.google.com/recaptcha/api/siteverify?secret='.$g_secret.'&response='.$_POST['g-recaptcha-response']);
	$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$g_secret.'&response='.$_POST['g-recaptcha-response']);
	$responseData = json_decode($verifyResponse)->success;
}
/*
function get_content($URL){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $URL);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}
*/
