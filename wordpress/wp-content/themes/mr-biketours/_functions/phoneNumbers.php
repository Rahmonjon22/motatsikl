<?php
function getPhoneLink($tel,$options=array()){
	$international = parseToPhoneNumber($tel);

	$link = '<a href="tel:'.$international.'"';
	$link .= isset($options['linkClass']) ? ' class="'.$options['linkClass'].'" ' : '';
	$link .= ">".$tel.'</a>';
	return $link;
}

//interational => 004957140032
//plain => +4957140032
//formated => +49 (0)571 40032
//something => +49 571 40032 - 8
function getPhoneNumberType($tel){
	if(phoneNumberIsPlain($tel)) {
		return "plain";
	}
	if(phoneNumberIsInternational($tel)){
		return "international";
	}

	return "something";
}

function phoneNumberIsPlain($tel){
	if(strpos($tel,'+') === false || preg_match("/[^0-9+]/",$tel)){
		return false;
	}
	return true;
}

function phoneNumberIsInternational($tel){
	if(preg_match("/[^0-9+]/",$tel)){
		return false;
	}
	return true;
}

function parseToPhoneNumber($tel){
	$tel = str_replace('(0)','',$tel);
	//$tel = str_replace('+','00',$tel);
	$tel = preg_replace("/[^0-9+]/" , "" , $tel);
	if(substr($tel,0,1) == "0" && substr($tel,1,1) != "0"){
		$tel = '+49'.substr($tel,1);
	}

	return $tel;
}


function readablePhoneNumber($tel){
	$tel = preg_replace("/^00(\d{2})/","+$1 (0)",$tel);
	$tel = preg_replace("/\(0\)(\d{3})/","(0)$1 ",$tel);
	return $tel;
}