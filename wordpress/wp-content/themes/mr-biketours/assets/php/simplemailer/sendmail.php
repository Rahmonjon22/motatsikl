<?php
require_once(dirname(__FILE__) . "/CTemplate.php");

class FCGDSendmail {

	private $options = array();
	private $POST = array();

	protected $mailTemplate = "mail.html";
	protected $smtp_conf = array();

	function __construct($POST, $options = array()) {
		if (count($POST) <= 0) {
			throw new Exception('No POST data set');
		}
		$defaults = array(
			'language' => 'de',
			'ignore' => array(
				'attempt'
			),
			'doNotTranslateValue' => array(),
			'captcha' => FALSE,
			'email' => array(
				'from' => 'support@pointdigital.de'
			),
			'translations' => require_once(dirname(__FILE__) . "/translations.php"),
			'extendedVars' => array(), //erweitert Werte z.B. um eine Maßeinheit ( value => einheit )
			'allowedAttchments' => array('image/jpeg'),
			'max_attachment_size' => 10*1024*1024
		);

		$this->options = array_replace_recursive($defaults, $options);

		$this->POST = $POST;
	}

	function setSMTPConf($conf) {
		$this->smtp_conf = $conf;
	}

	function setMailTemplate($template) {
		$this->mailTemplate = $template;
	}

	private function buildMail() {
		$Template = new CTemplate();
		$Template->Load(dirname(__FILE__) . '/' . $this->mailTemplate);

		$fields = $this->getFields();
		$Template->Replace('###FIELDS###', $fields);
		$Template->Replace('###DATE###', date('d.m.Y H:i'));

		//print $this->replaceTranslation($Template->Get()); exit();
		return $this->replaceTranslation($Template->Get());

	}

	private function getFields($input = FALSE) {
		$fields = "";
		$doNotTranslateValue = $this->options['doNotTranslateValue'];
		$extendedValue = $this->options['extendedValue'];
		$translateValue = function ($key, $value) use ($doNotTranslateValue, $extendedValue) {
			if (!in_array($key, $doNotTranslateValue)) {
				$value = $this->translateKey($value);
			}
			if (array_key_exists($key, $extendedValue)) {
				$value .= $extendedValue[$key];
			}

			return $value;
		};
		foreach ($this->POST as $key => $value) {
			if (!is_array($value)) {
				if (!in_array($key, $this->options['ignore'])) {
					if ($input) {
						$fields .= '<textarea name="' . $key . '">' . $translateValue($key, $value) . "</textarea>\n";
					} else {
						$fields .= $this->key2translation($key) . ": " . $translateValue($key, $value) . "<br />\n";
					}
					//print "'".$this->key2translation($key)."'=>'',<br />";
				}
			} else {
				$print_array = function ($key, $value) use ($input,&$fields,$translateValue,&$print_array) {
					if (!$input) {
						$fields .= $this->key2translation($key) . ":<br />";
						//print $this->key2translation($key)."<br />";
						foreach ($value as $valuekey => $val) {
							if(is_array($val)){
								$print_array($valuekey,$val);
							}else {
								$fields .= $this->key2translation($valuekey) . ": " . $translateValue($valuekey, $val) . "<br />";
							}
						}
						$fields .= "<br />";
					} else {
						foreach ($value as $valuekey => $val) {
							if(is_array($val)){
								$print_array($valuekey,$val);
							}else{
								$fields .= '<textarea name="' . $key . '[' . $valuekey . ']">' . $translateValue($key, $val) . "</textarea>\n";
							}
						}
					}
				};
				$print_array($key,$value);

			}
		}

		return $fields;
	}

	private function translateKey($key) {
		if (array_key_exists($this->options['language'], $this->options['translations'])) {
			$lang = $this->options['language'];
		} else {
			$lang = 'en';
		}
		if (array_key_exists($lang, $this->options['translations']) && array_key_exists(strtolower($key), $this->options['translations'][$lang])) {
			return $this->options['translations'][$lang][strtolower($key)];
		} else {
			return ucfirst($key);
		}
	}

	private function replaceTranslation($content) {
		if (array_key_exists($this->options['language'], $this->options['translations'])) {
			$lang = $this->options['language'];
		} else {
			$lang = 'en';
		}
		if (array_key_exists($lang, $this->options['translations'])) {
			if (strpos($content, '###TRANS') !== FALSE) {
				$subpattern = array();
				$pattern = '&###TRANS_(.*)###&sU';
				preg_match_all($pattern, $content, $subpattern);
				$translations = $subpattern[1];
				$translations = array_unique($translations);

				foreach ($translations as $translate) {
					if (array_key_exists(strtolower($translate), $this->options['translations'][$lang])) {
						$content = str_replace('###TRANS_' . $translate . '###', $this->options['translations'][$lang][strtolower($translate)], $content);
					} else {
						$content = str_replace('###TRANS_' . $translate . '###', $translate, $content);
					}
				}
			}
		}

		return ucfirst($content);
	}

	protected function getSMTPTransport() {
		if (
			(!is_array($this->smtp_conf) || count($this->smtp_conf) <= 0) ||
			!array_key_exists('SMTPSERVER', $this->smtp_conf) ||
			!array_key_exists('SMTPPORT', $this->smtp_conf) ||
			!array_key_exists('SMTPUSER', $this->smtp_conf) ||
			!array_key_exists('SMTPPASS', $this->smtp_conf)

		) {
			throw new Exception('SMTP not configured!');
		}
		$transport = Swift_SmtpTransport::newInstance($this->smtp_conf['SMTPSERVER'], $this->smtp_conf['SMTPPORT'], $this->smtp_conf['SMTPPORT'] === 25 ? NULL : $this->smtp_conf['SECURITY']);
		$transport->setUsername($this->smtp_conf['SMTPUSER']);
		$transport->setPassword($this->smtp_conf['SMTPPASS']);

		return $transport;
	}

	/**
	 * @param Swift_Message $message
	 */
	protected function addAttachments(&$message){
		if(is_array($_FILES)){
			$max = $this->options['max_attachment_size'];
			$sum = 0;
			foreach($_FILES as $_file){
				if(is_uploaded_file($_file['tmp_name']) && in_array($_file['type'],$this->options['allowedAttchments']) && ($sum+$_file['size'] <=$max)){
					$message->attach(Swift_Attachment::newInstance(file_get_contents($_file['tmp_name']),$_file['name'],$_file['type']));
					$sum+=$_file['size'];
				}
			}
		}
	}

	function sendmail($target, $subject) {
		if ($target === "notfound@pd-tech.de") {
			throw new \Exception('No valid target was set in ' . dirname(__FILE__) . '/mailer.php!');
		}
		if (SMTP_DEBUG) {
			$target = $this->smtp_conf['TEST_TARGET'];
		}
		//$email_from_name = $this->POST['firstname']." ".$this->POST['lastname'];
		$email_from = array($this->options['email']['from']);
		if (isset($this->options['email']['from_name'])) {
			$email_from = array($this->options['email']['from'] => $this->options['email']['from_name']);
		}

		if (!array_key_exists('email', $this->POST)) {
			throw new Exception('No sender address set!');
		}
		$email_replyTo = $this->POST['email'];

		/* mailserver einstellen */
		$transport = $this->getSMTPTransport();
		$mailer = Swift_Mailer::newInstance($transport);

		$message = Swift_Message::newInstance();
		$message->setSubject($subject);
		$message->setFrom($email_from);
		//$message->setFrom(array($email_from => $email_from_name));
		$message->setTo(array($target));
		$message->setReplyTo($email_replyTo);

		$message->setBody($this->buildMail(), 'text/html', "UTF-8");

		$this->addAttachments($message);

		if ($mailer->send($message)) {
			return TRUE;
		} else {
			throw new Exception('Can\'t send mail to ' . $target . '!');
		}
	}

	function buildThanksSubmit() {
		$content = '<form method="post" id="fcgd_thanksSubmit"><div style="display:none">';

		$content .= $this->getFields(TRUE);

		$content .= '</div></form>';

		$content .= '
			<script type="text/javascript">
				document.getElementById(\'fcgd_thanksSubmit\').submit();
			</script>
		';

		return $content;
	}

	function showThanksPage() {
		if (array_key_exists($this->options['language'], $this->options['translations']) && array_key_exists('date_format', $this->options['translations'][$this->options['language']])) {
			$date = $this->options['translations'][$this->options['language']]['date_format'];
		} else {
			$date = $this->options['translations']['en']['date_format'];
		}

		$content = "<div id=\"thanksPage\">";
		$content .= '<h2>###TRANS_danke_h1###</h2>';
		$content .= '<p>###TRANS_danke_text###</p>';
		$content .= '<b>###TRANS_danke_anfrage### ' . date($date) . ':</b><br />';

		$content .= '<p>' . $this->getFields() . '</p>';

		$content .= '<div class="printButton"><a href="javascript:window.print()" style="background-color:#00925b; color:#fff; width:120px; height:25px; line-height: 25px; display: block; text-align: center;">###TRANS_print###</a></div>';
		$content .= '</div>';
		$ncontent = $this->replaceTranslation($content);

		return $ncontent;
	}

	private function key2translation($key) {
		if (array_key_exists('translations', $this->options) && count($this->options['translations']) > 0) {
			$key = strtolower($key);
			$key = str_replace(' ', '_', $key);
			$key = preg_replace("/[^a-zA-Z0-9_]/", "", $key);

			return "###TRANS_" . $key . "###";
		} else {
			return $key;
		}
	}
}