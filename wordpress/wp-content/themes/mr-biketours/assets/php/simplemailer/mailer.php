<?php
$iframe = array_key_exists('iframe', $_GET);
$ajax = array_key_exists('ajax', $_GET) && !$iframe;


$input = file_get_contents('php://input');
if ((!isset($_POST['subject']) || count($_POST) <= 0) && $input !== "") {
	$_POST = json_decode($input, TRUE);
}

include 'verifyCaptcha.php';


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
			'err'
		),
		'doNotTranslateValue' => array(
			'email'
		),
		'extendedValue' => array(),
		'email' => array(
			'from' => 'support@pd-tech.de',
			'from_name' => 'PD Support'
		)
	));

	$conf = include(dirname(__FILE__) . '/smtp_conf.php');
	$mailer->setSMTPConf($conf);

	//TODO set target mail address!
	$target = "schwier@pointdigital.de";
	try {
		$mailer->sendmail($target, $_POST['subject']);
	} catch (Exception $e) {
		header($_SERVER['SERVER_PROTOCOL'] . $e->getCode() . " " . $e->getMessage(), TRUE, $e->getCode());
		echo json_encode(array('status' => $e->getCode(), 'error' => $e->getMessage()));
		exit();
	}

	if (isset($_POST['customer_copy']) && $_POST['customer_copy'] == "1") {
		//mail an Kunden
		$mailer->setMailTemplate("customer.html");
		$mailer->sendmail($_POST['email'], $_POST['subject']);
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