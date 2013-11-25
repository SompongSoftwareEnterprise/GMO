<?php

use \Michelf\Markdown;
use \Symfony\Component\DomCrawler\Crawler;

class Doc {

	function section($crawler, $pattern) {
		$primaryActors = $crawler->filter('h2')->reduce(function($node) use ($pattern) {
			return !!preg_match($pattern, $node->text());
		});
	}

	public static function read($filename) {
		$data = Markdown::defaultTransform(file_get_contents($filename));
		$crawler = new Crawler($data);
		return $crawler;
	}

}


