<?php

class PasswordGenerator {

	public static function generate() {

		$output = array();

		// uppercase characters
		$count = mt_rand(1, 3);
		for ($i = 0; $i < $count; $i ++) $output[] = chr(mt_rand(0x41, 0x41 + 25)); // A -> Z

		$count = mt_rand(1, 3);
		for ($i = 0; $i < $count; $i ++) $output[] = chr(mt_rand(0x30, 0x39)); // 0 -> 9

		while (count($output) < 8) {
			$output[] = chr(mt_rand(0x61, 0x61 + 25)); // a -> z
		}

		shuffle($output);
		return implode('', $output);

	}

}
