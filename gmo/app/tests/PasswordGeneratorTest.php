<?php

class PasswordGeneratorTest extends TestCase {
	
	public function testGenerate() {

		for ($i = 0; $i < 100; $i ++) {
			$pass = PasswordGenerator::generate();
			$this->assertTrue(strlen($pass) >= 8, 'Password must be at least 8 characters');
			$this->assertTrue(!!preg_match('~[0-9]~', $pass), 'Password must contain numbers');
			$this->assertTrue(!!preg_match('~[a-z]~', $pass), 'Password must contain lowercase letters');
			$this->assertTrue(!!preg_match('~[A-Z]~', $pass), 'Password must contain uppercase letters');
		}

	}
	
}


