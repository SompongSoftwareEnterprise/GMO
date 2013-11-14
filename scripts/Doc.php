<?php

require __DIR__ . '/vendor/autoload.php';

use \Michelf\Markdown;
use \Symfony\Component\DomCrawler\Crawler;

class Doc {

	public $filename;
	public $crawler;

	public function __construct($filename, $crawler) {
		$this->filename = $filename;
		$this->crawler = $crawler;
	}

	public function section($pattern) {

		$ret = true;

		return $this->crawler->filter('h2')->reduce(function($node) use ($pattern) {
			return !!preg_match($pattern, $node->text());
		})->first()->nextAll()->reduce(function($node) use (&$ret) {
			foreach ($node as $element) {
				if (strtolower($element->nodeName) == 'h2') {
					$ret = false;
				}
				break;
			}
			return $ret;
		});

	}

	public static function read($filename) {
		$data = Markdown::defaultTransform(file_get_contents($filename));
		$crawler = new Crawler($data);
		return new Doc($filename, $crawler);
	}

	public function __toString() {
		return "[Doc: $this->filename]";
	}

}


