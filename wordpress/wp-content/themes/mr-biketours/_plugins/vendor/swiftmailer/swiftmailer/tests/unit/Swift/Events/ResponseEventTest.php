<?php

class Swift_Events_ResponseEventTest extends \PHPUnit_Framework_TestCase {

	public function testResponseCanBeFetchViaGetter() {
		$evt = $this->_createEvent($this->_createTransport(), "250 Ok\r\n", TRUE);
		$this->assertEquals("250 Ok\r\n", $evt->getResponse(),
			'%s: Response should be available via getResponse()'
		);
	}

	public function testResultCanBeFetchedViaGetter() {
		$evt = $this->_createEvent($this->_createTransport(), "250 Ok\r\n", FALSE);
		$this->assertFalse($evt->isValid(),
			'%s: Result should be checkable via isValid()'
		);
	}

	public function testSourceIsBuffer() {
		$transport = $this->_createTransport();
		$evt = $this->_createEvent($transport, "250 Ok\r\n", TRUE);
		$ref = $evt->getSource();
		$this->assertEquals($transport, $ref);
	}

	private function _createEvent(Swift_Transport $source, $response, $result) {
		return new Swift_Events_ResponseEvent($source, $response, $result);
	}

	private function _createTransport() {
		return $this->getMockBuilder('Swift_Transport')->getMock();
	}
}
