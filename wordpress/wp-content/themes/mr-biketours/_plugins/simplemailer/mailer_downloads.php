<?php
$iframe = array_key_exists('iframe', $_GET);
$ajax = array_key_exists('ajax', $_GET) && !$iframe;


$input = file_get_contents('php://input');
if ((!isset($_POST['subject']) || count($_POST) <= 0) && $input !== "") {
	//$_POST = json_decode($input, TRUE);
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
			'err',
			'g-recaptcha-response',
			'_code',
			'MAX_FILE_SIZE',
			"formtarget",
			"lang",
			'acceptDataProtection'
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
	$customerTpl = $_POST['lang'] == 'en' ? 'customer_download_en.html':'customer_download.html';
	$mailer->setMailTemplate($customerTpl);
	$mailer->setSMTPConf($conf);

	//TODO set target mail address!
	if($_POST['email'] == "montanus@brunsdigital.de" || $_POST['email'] == "montanus@pointdigital.de") {
		$target = "montanus@brunsdigital.de";
	}
	else {
		$target = "f.nolte@altendorf.de";
	}
	

	try {
		$mailer->sendmail($_POST['email'], $_POST['subject'],2,getDownloadItems($_POST['downloaditems']));
	} catch (Exception $e) {
		header($_SERVER['SERVER_PROTOCOL'] . $e->getCode() . " " . $e->getMessage(), TRUE, $e->getCode());
		echo json_encode(array('status' => $e->getCode(), 'error' => $e->getMessage()));
		exit();
	}


	$mailer->setMailTemplate("customer_download_copy.html");
	$mailer->sendmail($target, $_POST['subject'],2,getDownloadItems($_POST['downloaditems']));

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

function getDownloadItems($_items) {
	$downloadItems = explode(",",$_items);
	$downloadUrls = NULL;
	if($downloadItems && count($downloadItems) > 0) {
		$downloadUrls = array();
		require($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');


		$download_args = [
			'post_type' => 'downloads_haendler',
			'post_status' => 'publish',
			'numberposts' => -1,
			'post__in'=> $downloadItems,
			'tax_query' => array(
				array(
					'taxonomy' => 'downloads_haendler_area',
					'field' => 'slug',
					'terms' => 'download',
				)
			)
		];

		$downloads = get_posts($download_args);
		foreach ($downloads as $download):
			$postID = $download->ID;
			foreach ($downloadItems as $downloadItemID):
				if($postID == $downloadItemID) {
					array_push($downloadUrls,get_field('a-file',$postID)['url']);
				}
			endforeach;
		endforeach;

	}

	return $downloadUrls;
}
