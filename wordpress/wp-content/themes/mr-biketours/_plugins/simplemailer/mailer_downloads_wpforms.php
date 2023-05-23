<?php

function sendCustomerDownloadMail($fields, $downloadFiles, $fieldID_name, $fieldID_email, $fieldID_title) {
	define('SMTP_DEBUG', FALSE);
	$dir = dirname(__FILE__) . "/";
	$basedir = dirname($dir) . "/";
	require_once($basedir . 'vendor/autoload.php');
	require_once($dir . 'sendmail.php');
	$firstname = $fields[$fieldID_name]['first'];
	$lastname = $fields[$fieldID_name]['last'];
	
	$fields['email'] = $fields[$fieldID_email][ 'value' ];
	$fields['title'] = $fields[$fieldID_title][ 'value' ];
	$fields['name'] = $firstname . " " . $lastname;
	
	$mailer = new FCGDSendmail($fields, array(
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
	$customerTpl = 'customer_download.html';
	$mailer->setMailTemplate($customerTpl);
	$mailer->setSMTPConf($conf);

	
	try {
		$mailer->sendmail($fields[$fieldID_email][ 'value' ], "Requested Download-Files",2, $downloadFiles);
	} catch (Exception $e) {
		return array('status' => '500', 'error' => $e->getMessage());
	}


	return array('status' => '200', 'data' => 'ok');

}
