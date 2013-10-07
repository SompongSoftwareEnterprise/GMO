<?php

class RunningNumberTest extends TestCase {
	
	protected $database = true;
	
	public function testRunningNumber() {
		$this->assertEquals('560001', RunningNumber::getNextNumber('default', 2013));
		$this->assertEquals('560001', RunningNumber::getNextNumber('default', 2013));
		$this->assertEquals('560001', RunningNumber::increment('default', 2013));
		$this->assertEquals('560002', RunningNumber::increment('default', 2013));
		$this->assertEquals('560003', RunningNumber::increment('default', 2013));
		$this->assertEquals('560004', RunningNumber::increment('default', 2013));
		$this->assertEquals('550001', RunningNumber::increment('default', 2012));
		$this->assertEquals('570001', RunningNumber::increment('default', 2014));
		$this->assertEquals('570002', RunningNumber::increment('default', 2014));
		$this->assertEquals('560005', RunningNumber::increment('default', 2013));
		$this->assertEquals('560006', RunningNumber::increment('default', 2013));
		$this->assertEquals('560007', RunningNumber::increment('default', 2013));
		$this->assertEquals('560008', RunningNumber::increment('default', 2013));
		$this->assertEquals('560009', RunningNumber::increment('default', 2013));
		$this->assertEquals('560010', RunningNumber::increment('default', 2013));
		$this->assertEquals('560001', RunningNumber::increment('not_default', 2013));
		$this->assertEquals('560002', RunningNumber::increment('not_default', 2013));
		$this->assertEquals('560003', RunningNumber::getNextNumber('not_default', 2013));
		$this->assertEquals('560003', RunningNumber::getNextNumber('not_default', 2013));
	}
	
}


