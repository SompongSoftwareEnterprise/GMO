<?php

class EntrepreneurController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index() {
		return View::make('account/index');
	}

	public function registerCustomer() {
		return $this->registerForm(false);
	}
	
	public function registerAgency() {
		return $this->registerForm(true);
	}
	
	private function registerForm($is_agency) {
		return 'is_agency is ' . $is_agency;
	}
	
}