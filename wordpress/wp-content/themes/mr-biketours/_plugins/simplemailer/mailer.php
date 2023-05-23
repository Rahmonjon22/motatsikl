<?php
$iframe = array_key_exists('iframe', $_GET);
$ajax = array_key_exists('ajax', $_GET) && !$iframe;


$input = file_get_contents('php://input');
if ((!isset($_POST['subject']) || count($_POST) <= 0) && $input !== "") {
	//$_POST = json_decode($input, TRUE);
}

include 'verifyCaptcha.php';
if(isset($_POST) && isset($_POST['noRecaptcha']) && $_POST['noRecaptcha'] == 1) {
	$responseData = TRUE;
}

if (isset($_POST) && isset($_POST['subject']) && count($_POST) > 0 && $responseData) {
	define('SMTP_DEBUG', FALSE);
	$dir = dirname(__FILE__) . "/";
	$basedir = dirname($dir) . "/";
	require_once($basedir . 'vendor/autoload.php');
	require_once($dir . 'sendmail.php');

	$mailer = new FCGDSendmail($_POST, array(
		'ignore' => array(
			'subject',
			'thx',
			'err',
			'g-recaptcha-response',
			'_code',
			'MAX_FILE_SIZE',
			"formtarget",
			"lang",
			'acceptDataProtection',
			'noRecaptcha'
		),
		'doNotTranslateValue' => array(
			'email'
		),
		'extendedValue' => array(),
		'email' => array(
			'from' => 'no-reply@altendorfgroup.com',
			'from_name' => 'Altendorf Website'
		)
	));

	$conf = include(dirname(__FILE__) . '/smtp_conf.php');
	$mailer->setSMTPConf($conf);

	//TODO set target mail address!
	$target = "";
	if(isset( $_POST['formtarget'])) {
		switch ($_POST['formtarget']) {
			case "_0": $target = "montanus@pointdigital.de";break; //debug
			case "_1": $target = "info@altendorf.de";break; //Allgemein
			case "_2": $target = "info@hebrock.de";break; //Hebrock Maschinen
			case "_3": $target = "sales@altendorf.de";break; //Altendorf Maschinen
			case "_4": $target = "personal@altendorf.de";break; //Karriere
			case "_5": $target = "marketing@altendorf.de";break; //Presse
			case "_6": $target = "service@altendorf.de";break; //Service
			case "_7": $target = "service@altendorf.de";break; //Garantieverlängerung
			case "_8": $target = "bewerbung@altendorf.de";break; //Garantieverlängerung
			case "_9": $target = "retouren@altendorf.de";break;
			case "_10": $target = "f.nolte@altendorf.de";break;
			case "_11": $target = "a.vongarrel@altendorf.de";break;
			case "_12": $target = "inspect@altendorf.de";break;
			case "_13": $target = "ersatzteile@altendorf.de";break;
			case "_14": $target = "tkd@altendorf.de";break;
			case "_15": $target = "inspect@hebrock.de";break;
			case "_16": $target = "info@altendorfgroupamerica.us";break;
			case "_17": $target = "s.gausmann@altendorf.de";break;
			case "_18": $target = "schilke@brunsdigital.de";break; //debug
			case "_19": $target = "traue@brunsdigital.de";break; //debug
			default: $target =   "info@altendorf.de";
		}
	}
	else {
		$target = "info@altendorf.de";
	}
	$formRetoure = $_POST['frmname'] && $_POST['frmname'] == 'form_retoure' ? 3 : 1;
	try {
		$mailer->sendmail($target, $_POST['subject'],$formRetoure);
	} catch (Exception $e) {
		header($_SERVER['SERVER_PROTOCOL'] . $e->getCode() . " " . $e->getMessage(), TRUE, $e->getCode());
		echo json_encode(array('status' => $e->getCode(), 'error' => $e->getMessage()));
		exit();
	}

	if (isset($_POST['customer_copy']) && $_POST['customer_copy'] == "1") {
		//mail an Kunden
		$customerTpl = $_POST['lang'] == 'en' ? 'customer_en.html':'customer.html';
		$mailer->setMailTemplate($customerTpl);
		$mailer->sendmail($_POST['email'], $_POST['subject'],$formRetoure);
	}
	if (!$ajax && !$iframe) {
		header('Location: ' . $_POST['thx']);
	} else {
		$json = json_encode(array('status' => '200', 'data' => 'ok'));
		if($iframe){
			?><script type="application/javascript">
				window.parent.postMessage(<?=$json;?>,'*');
			</script><?php
		}else {
			header($_SERVER['SERVER_PROTOCOL'] . ' 200 OK', TRUE, 200);
			echo $json;
			exit();
		}
	}

} else {
	header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', TRUE, 500);
	if ($ajax) {
		echo json_encode(array('status' => '500', 'error' => 'Missing fields'));
		exit();
	} else {
		header('Location: ' . $_POST['err']);
	}

}

