<?php

class RunningNumber {

	private static function query($kind, $year) {
		return DB::select('
			SELECT year, kind, number FROM yy_running_numbers
			WHERE kind = ? AND year = ?', array($kind, $year));
	}

	private static function format($year, $kind, $results) {
		$number = empty($results) ? 1 : $results[0]->number;
		return sprintf('%02d%04d', ($year + 543) % 100, $number);
	}

	public static function getNextNumber($kind = 'default', $year = null) {
		$year = self::ensureValidYear($year);
		$results = self::query($kind, $year);
		return self::format($year, $kind, $results);
	}
	
	public static function increment($kind = 'default', $year = null) {
		$year = self::ensureValidYear($year);
		$results = self::query($kind, $year);
		if (empty($results)) {
			DB::insert('INSERT INTO yy_running_numbers (year, kind, number) VALUES (?, ?, ?)',
				array($year, $kind, 2));
		} else {
			DB::update('UPDATE yy_running_numbers SET number = number + 1 WHERE year = ? AND kind = ?',
				array($year, $kind));
		}
		return self::format($year, $kind, $results);
	}
	
	public static function ensureValidYear($year) {
		return $year === null ? date('Y') : $year;
	}

}
