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
		$accounts = Entrepreneur::all();
		return View::make('account/index')
			->with('accounts', $accounts);
	}

	public function edit_account(){
		$entrepreneur = Input::all();
		// echo $entrepreneur['first_name'];
		return View::make('account/edit_account')
			->with('entrepreneur', $entrepreneur);
	}

	
}