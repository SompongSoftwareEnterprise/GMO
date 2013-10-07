<?php

class Hasher {

	public static function makeSalt() {
		return md5(mt_rand() . time());
	}
	
	public static function makeHash($password, $salt) {
		return md5(md5($password) . md5($salt));
	}
	
	public static function checkHash($password, $salt, $hash) {
		return self::makeHash($password, $salt) == $hash;
	}

}