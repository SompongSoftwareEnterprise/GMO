<?php

class HasherTest extends TestCase {
	
	public function testMakeSalt() {
		$salt_a = Hasher::makeSalt();
		$salt_b = Hasher::makeSalt();
		$this->assertNotEquals($salt_a, $salt_b);
	}

	public function testMakeHash() {
		$pass_a = 'hello';
		$pass_b = 'world';
		$salt_a = Hasher::makeSalt();
		$salt_b = Hasher::makeSalt();
		$hash_a = Hasher::makeHash($pass_a, $salt_a);
		$hash_b = Hasher::makeHash($pass_b, $salt_a);
		$hash_c = Hasher::makeHash($pass_a, $salt_b);
		$hash_d = Hasher::makeHash($pass_a, $salt_a);
		$this->assertNotEquals($hash_a, $hash_b);
		$this->assertNotEquals($hash_a, $hash_c);
		$this->assertEquals($hash_a, $hash_d);
	}

	public function testCheckHash() {
		$salt = Hasher::makeSalt();
		$pass = 'wtf';
		$hash = Hasher::makeHash($pass, $salt);
		$this->assertTrue(Hasher::checkHash('wtf', $salt, $hash));
		$this->assertFalse(Hasher::checkHash('noway', $salt, $hash));
	}
	
}


