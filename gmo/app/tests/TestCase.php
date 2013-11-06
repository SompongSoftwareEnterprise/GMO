<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	protected $database = false;
	
	/**
	 * Creates the application.
	 *
	 * @return Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		return require __DIR__.'/../../bootstrap/start.php';
	}
	
	protected function fixtures($filename) {
		system('gmo-load-fixtures ' . $filename);
	}

	public function setUp()
	{
		parent::setUp();
		if ($this->database) {
			Artisan::call('migrate');
			$this->seed();
			Mail::pretend(true);
		}
	}

}
