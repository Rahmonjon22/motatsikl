<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Contains a list of redundant Transports so when one fails, the next is used.
 *
 * @author Chris Corbyn
 */
class Swift_Transport_FailoverTransport extends Swift_Transport_LoadBalancedTransport {

	/**
	 * Registered transport currently used.
	 *
	 * @var Swift_Transport
	 */
	private $_currentTransport;

	// needed as __construct is called from elsewhere explicitly
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Send the given Message.
	 *
	 * Recipient/sender data will be retrieved from the Message API.
	 * The return value is the number of recipients who were accepted for delivery.
	 *
	 * @param Swift_Mime_Message $message
	 * @param string[] $failedRecipients An array of failures by-reference
	 *
	 * @return int
	 */
	public function send(Swift_Mime_Message $message, &$failedRecipients = NULL) {
		$maxTransports = count($this->_transports);
		$sent = 0;
		$this->_lastUsedTransport = NULL;

		for ($i = 0; $i < $maxTransports
		&& $transport = $this->_getNextTransport(); ++$i) {
			try {
				if (!$transport->isStarted()) {
					$transport->start();
				}

				if ($sent = $transport->send($message, $failedRecipients)) {
					$this->_lastUsedTransport = $transport;

					return $sent;
				}
			} catch (Swift_TransportException $e) {
				$this->_killCurrentTransport();
			}
		}

		if (count($this->_transports) == 0) {
			throw new Swift_TransportException(
				'All Transports in FailoverTransport failed, or no Transports available'
			);
		}

		return $sent;
	}

	protected function _getNextTransport() {
		if (!isset($this->_currentTransport)) {
			$this->_currentTransport = parent::_getNextTransport();
		}

		return $this->_currentTransport;
	}

	protected function _killCurrentTransport() {
		$this->_currentTransport = NULL;
		parent::_killCurrentTransport();
	}
}
