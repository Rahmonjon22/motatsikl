<?php

/**
 * @group legacy
 */
class Swift_Transport_MailTransportTest extends \SwiftMailerTestCase {

	public function testTransportInvokesMailOncePerMessage() {
		$invoker = $this->_createInvoker();
		$dispatcher = $this->_createEventDispatcher();
		$transport = $this->_createTransport($invoker, $dispatcher);

		$headers = $this->_createHeaders();
		$message = $this->_createMessageWithRecipient($headers);

		$invoker->shouldReceive('mail')
			->once();

		$transport->send($message);
	}

	public function testTransportUsesToFieldBodyInSending() {
		$invoker = $this->_createInvoker();
		$dispatcher = $this->_createEventDispatcher();
		$transport = $this->_createTransport($invoker, $dispatcher);

		$to = $this->_createHeader();
		$headers = $this->_createHeaders(array(
			'To' => $to,
		));
		$message = $this->_createMessageWithRecipient($headers);

		$to->shouldReceive('getFieldBody')
			->zeroOrMoreTimes()
			->andReturn('Foo <foo@bar>');
		$invoker->shouldReceive('mail')
			->once()
			->with('Foo <foo@bar>', \Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any());

		$transport->send($message);
	}

	public function testTransportUsesSubjectFieldBodyInSending() {
		$invoker = $this->_createInvoker();
		$dispatcher = $this->_createEventDispatcher();
		$transport = $this->_createTransport($invoker, $dispatcher);

		$subj = $this->_createHeader();
		$headers = $this->_createHeaders(array(
			'Subject' => $subj,
		));
		$message = $this->_createMessageWithRecipient($headers);

		$subj->shouldReceive('getFieldBody')
			->zeroOrMoreTimes()
			->andReturn('Thing');
		$invoker->shouldReceive('mail')
			->once()
			->with(\Mockery::any(), 'Thing', \Mockery::any(), \Mockery::any(), \Mockery::any());

		$transport->send($message);
	}

	public function testTransportUsesBodyOfMessage() {
		$invoker = $this->_createInvoker();
		$dispatcher = $this->_createEventDispatcher();
		$transport = $this->_createTransport($invoker, $dispatcher);

		$headers = $this->_createHeaders();
		$message = $this->_createMessageWithRecipient($headers);

		$message->shouldReceive('toString')
			->zeroOrMoreTimes()
			->andReturn(
				"To: Foo <foo@bar>\r\n" .
				"\r\n" .
				'This body'
			);
		$invoker->shouldReceive('mail')
			->once()
			->with(\Mockery::any(), \Mockery::any(), 'This body', \Mockery::any(), \Mockery::any());

		$transport->send($message);
	}

	public function testTransportSettingUsingReturnPathForExtraParams() {
		$invoker = $this->_createInvoker();
		$dispatcher = $this->_createEventDispatcher();
		$transport = $this->_createTransport($invoker, $dispatcher);

		$headers = $this->_createHeaders();
		$message = $this->_createMessageWithRecipient($headers);

		$message->shouldReceive('getReturnPath')
			->zeroOrMoreTimes()
			->andReturn(
				'foo@bar'
			);
		$invoker->shouldReceive('mail')
			->once()
			->with(\Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any(), '-ffoo@bar');

		$transport->send($message);
	}

	public function testTransportSettingEmptyExtraParams() {
		$invoker = $this->_createInvoker();
		$dispatcher = $this->_createEventDispatcher();
		$transport = $this->_createTransport($invoker, $dispatcher);

		$headers = $this->_createHeaders();
		$message = $this->_createMessageWithRecipient($headers);

		$message->shouldReceive('getReturnPath')
			->zeroOrMoreTimes()
			->andReturn(NULL);
		$message->shouldReceive('getSender')
			->zeroOrMoreTimes()
			->andReturn(NULL);
		$message->shouldReceive('getFrom')
			->zeroOrMoreTimes()
			->andReturn(NULL);
		$invoker->shouldReceive('mail')
			->once()
			->with(\Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any(), NULL);

		$transport->send($message);
	}

	public function testTransportSettingSettingExtraParamsWithF() {
		$invoker = $this->_createInvoker();
		$dispatcher = $this->_createEventDispatcher();
		$transport = $this->_createTransport($invoker, $dispatcher);
		$transport->setExtraParams('-x\'foo\' -f%s');

		$headers = $this->_createHeaders();
		$message = $this->_createMessageWithRecipient($headers);

		$message->shouldReceive('getReturnPath')
			->zeroOrMoreTimes()
			->andReturn(
				'foo@bar'
			);
		$message->shouldReceive('getSender')
			->zeroOrMoreTimes()
			->andReturn(NULL);
		$message->shouldReceive('getFrom')
			->zeroOrMoreTimes()
			->andReturn(NULL);
		$invoker->shouldReceive('mail')
			->once()
			->with(\Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any(), '-x\'foo\' -ffoo@bar');

		$transport->send($message);
	}

	public function testTransportSettingSettingExtraParamsWithoutF() {
		$invoker = $this->_createInvoker();
		$dispatcher = $this->_createEventDispatcher();
		$transport = $this->_createTransport($invoker, $dispatcher);
		$transport->setExtraParams('-x\'foo\'');

		$headers = $this->_createHeaders();
		$message = $this->_createMessageWithRecipient($headers);

		$message->shouldReceive('getReturnPath')
			->zeroOrMoreTimes()
			->andReturn(
				'foo@bar'
			);
		$message->shouldReceive('getSender')
			->zeroOrMoreTimes()
			->andReturn(NULL);
		$message->shouldReceive('getFrom')
			->zeroOrMoreTimes()
			->andReturn(NULL);
		$invoker->shouldReceive('mail')
			->once()
			->with(\Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any(), '-x\'foo\'');

		$transport->send($message);
	}

	public function testTransportSettingInvalidFromEmail() {
		$invoker = $this->_createInvoker();
		$dispatcher = $this->_createEventDispatcher();
		$transport = $this->_createTransport($invoker, $dispatcher);

		$headers = $this->_createHeaders();
		$message = $this->_createMessageWithRecipient($headers);

		$message->shouldReceive('getReturnPath')
			->zeroOrMoreTimes()
			->andReturn(
				'"attacker\" -oQ/tmp/ -X/var/www/cache/phpcode.php "@email.com'
			);
		$message->shouldReceive('getSender')
			->zeroOrMoreTimes()
			->andReturn(NULL);
		$message->shouldReceive('getFrom')
			->zeroOrMoreTimes()
			->andReturn(NULL);
		$invoker->shouldReceive('mail')
			->once()
			->with(\Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any(), NULL);

		$transport->send($message);
	}

	public function testTransportUsesHeadersFromMessage() {
		$invoker = $this->_createInvoker();
		$dispatcher = $this->_createEventDispatcher();
		$transport = $this->_createTransport($invoker, $dispatcher);

		$headers = $this->_createHeaders();
		$message = $this->_createMessageWithRecipient($headers);

		$message->shouldReceive('toString')
			->zeroOrMoreTimes()
			->andReturn(
				"Subject: Stuff\r\n" .
				"\r\n" .
				'This body'
			);
		$invoker->shouldReceive('mail')
			->once()
			->with(\Mockery::any(), \Mockery::any(), \Mockery::any(), 'Subject: Stuff' . PHP_EOL, \Mockery::any());

		$transport->send($message);
	}

	public function testTransportReturnsCountOfAllRecipientsIfInvokerReturnsTrue() {
		$invoker = $this->_createInvoker();
		$dispatcher = $this->_createEventDispatcher();
		$transport = $this->_createTransport($invoker, $dispatcher);

		$headers = $this->_createHeaders();
		$message = $this->_createMessage($headers);

		$message->shouldReceive('getTo')
			->zeroOrMoreTimes()
			->andReturn(array('foo@bar' => NULL, 'zip@button' => NULL));
		$message->shouldReceive('getCc')
			->zeroOrMoreTimes()
			->andReturn(array('test@test' => NULL));
		$invoker->shouldReceive('mail')
			->once()
			->with(\Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any())
			->andReturn(TRUE);

		$this->assertEquals(3, $transport->send($message));
	}

	public function testTransportReturnsZeroIfInvokerReturnsFalse() {
		$invoker = $this->_createInvoker();
		$dispatcher = $this->_createEventDispatcher();
		$transport = $this->_createTransport($invoker, $dispatcher);

		$headers = $this->_createHeaders();
		$message = $this->_createMessage($headers);

		$message->shouldReceive('getTo')
			->zeroOrMoreTimes()
			->andReturn(array('foo@bar' => NULL, 'zip@button' => NULL));
		$message->shouldReceive('getCc')
			->zeroOrMoreTimes()
			->andReturn(array('test@test' => NULL));
		$invoker->shouldReceive('mail')
			->once()
			->with(\Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any())
			->andReturn(FALSE);

		$this->assertEquals(0, $transport->send($message));
	}

	public function testToHeaderIsRemovedFromHeaderSetDuringSending() {
		$invoker = $this->_createInvoker();
		$dispatcher = $this->_createEventDispatcher();
		$transport = $this->_createTransport($invoker, $dispatcher);

		$to = $this->_createHeader();
		$headers = $this->_createHeaders(array(
			'To' => $to,
		));
		$message = $this->_createMessageWithRecipient($headers);

		$headers->shouldReceive('remove')
			->once()
			->with('To');
		$headers->shouldReceive('remove')
			->zeroOrMoreTimes();
		$invoker->shouldReceive('mail')
			->once()
			->with(\Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any());

		$transport->send($message);
	}

	public function testSubjectHeaderIsRemovedFromHeaderSetDuringSending() {
		$invoker = $this->_createInvoker();
		$dispatcher = $this->_createEventDispatcher();
		$transport = $this->_createTransport($invoker, $dispatcher);

		$subject = $this->_createHeader();
		$headers = $this->_createHeaders(array(
			'Subject' => $subject,
		));
		$message = $this->_createMessageWithRecipient($headers);

		$headers->shouldReceive('remove')
			->once()
			->with('Subject');
		$headers->shouldReceive('remove')
			->zeroOrMoreTimes();
		$invoker->shouldReceive('mail')
			->once()
			->with(\Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any());

		$transport->send($message);
	}

	public function testToHeaderIsPutBackAfterSending() {
		$invoker = $this->_createInvoker();
		$dispatcher = $this->_createEventDispatcher();
		$transport = $this->_createTransport($invoker, $dispatcher);

		$to = $this->_createHeader();
		$headers = $this->_createHeaders(array(
			'To' => $to,
		));
		$message = $this->_createMessageWithRecipient($headers);

		$headers->shouldReceive('set')
			->once()
			->with($to);
		$headers->shouldReceive('set')
			->zeroOrMoreTimes();
		$invoker->shouldReceive('mail')
			->once()
			->with(\Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any());

		$transport->send($message);
	}

	public function testSubjectHeaderIsPutBackAfterSending() {
		$invoker = $this->_createInvoker();
		$dispatcher = $this->_createEventDispatcher();
		$transport = $this->_createTransport($invoker, $dispatcher);

		$subject = $this->_createHeader();
		$headers = $this->_createHeaders(array(
			'Subject' => $subject,
		));
		$message = $this->_createMessageWithRecipient($headers);

		$headers->shouldReceive('set')
			->once()
			->with($subject);
		$headers->shouldReceive('set')
			->zeroOrMoreTimes();
		$invoker->shouldReceive('mail')
			->once()
			->with(\Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any(), \Mockery::any());

		$transport->send($message);
	}

	public function testMessageHeadersOnlyHavePHPEolsDuringSending() {
		$invoker = $this->_createInvoker();
		$dispatcher = $this->_createEventDispatcher();
		$transport = $this->_createTransport($invoker, $dispatcher);

		$subject = $this->_createHeader();
		$subject->shouldReceive('getFieldBody')->andReturn("Foo\r\nBar");

		$headers = $this->_createHeaders(array(
			'Subject' => $subject,
		));
		$message = $this->_createMessageWithRecipient($headers);
		$message->shouldReceive('toString')
			->zeroOrMoreTimes()
			->andReturn(
				"From: Foo\r\n<foo@bar>\r\n" .
				"\r\n" .
				"This\r\n" .
				'body'
			);

		if ("\r\n" != PHP_EOL) {
			$expectedHeaders = "From: Foo\n<foo@bar>\n";
			$expectedSubject = "Foo\nBar";
			$expectedBody = "This\nbody";
		} else {
			$expectedHeaders = "From: Foo\r\n<foo@bar>\r\n";
			$expectedSubject = "Foo\r\nBar";
			$expectedBody = "This\r\nbody";
		}

		$invoker->shouldReceive('mail')
			->once()
			->with(\Mockery::any(), $expectedSubject, $expectedBody, $expectedHeaders, \Mockery::any());

		$transport->send($message);
	}

	/**
	 * @expectedException \Swift_TransportException
	 * @expectedExceptionMessage Cannot send message without a recipient
	 */
	public function testExceptionWhenNoRecipients() {
		$invoker = $this->_createInvoker();
		$invoker->shouldReceive('mail');
		$dispatcher = $this->_createEventDispatcher();
		$transport = $this->_createTransport($invoker, $dispatcher);

		$headers = $this->_createHeaders();
		$message = $this->_createMessage($headers);

		$transport->send($message);
	}

	public function noExceptionWhenRecipientsExistProvider() {
		return array(
			array('To'),
			array('Cc'),
			array('Bcc'),
		);
	}

	/**
	 * @dataProvider noExceptionWhenRecipientsExistProvider
	 *
	 * @param string $header
	 */
	public function testNoExceptionWhenRecipientsExist($header) {
		$invoker = $this->_createInvoker();
		$invoker->shouldReceive('mail');
		$dispatcher = $this->_createEventDispatcher();
		$transport = $this->_createTransport($invoker, $dispatcher);

		$headers = $this->_createHeaders();
		$message = $this->_createMessage($headers);
		$message->shouldReceive(sprintf('get%s', $header))->andReturn(array('foo@bar' => 'Foo'));

		$transport->send($message);
	}

	private function _createTransport($invoker, $dispatcher) {
		return new Swift_Transport_MailTransport($invoker, $dispatcher);
	}

	private function _createEventDispatcher() {
		return $this->getMockery('Swift_Events_EventDispatcher')->shouldIgnoreMissing();
	}

	private function _createInvoker() {
		return $this->getMockery('Swift_Transport_MailInvoker');
	}

	private function _createMessage($headers) {
		$message = $this->getMockery('Swift_Mime_Message')->shouldIgnoreMissing();
		$message->shouldReceive('getHeaders')
			->zeroOrMoreTimes()
			->andReturn($headers);

		return $message;
	}

	private function _createMessageWithRecipient($headers, $recipient = array('foo@bar' => 'Foo')) {
		$message = $this->_createMessage($headers);
		$message->shouldReceive('getTo')->andReturn($recipient);

		return $message;
	}

	private function _createHeaders($headers = array()) {
		$set = $this->getMockery('Swift_Mime_HeaderSet')->shouldIgnoreMissing();

		if (count($headers) > 0) {
			foreach ($headers as $name => $header) {
				$set->shouldReceive('get')
					->zeroOrMoreTimes()
					->with($name)
					->andReturn($header);
				$set->shouldReceive('has')
					->zeroOrMoreTimes()
					->with($name)
					->andReturn(TRUE);
			}
		}

		$header = $this->_createHeader();
		$set->shouldReceive('get')
			->zeroOrMoreTimes()
			->andReturn($header);
		$set->shouldReceive('has')
			->zeroOrMoreTimes()
			->andReturn(TRUE);

		return $set;
	}

	private function _createHeader() {
		return $this->getMockery('Swift_Mime_Header')->shouldIgnoreMissing();
	}
}
