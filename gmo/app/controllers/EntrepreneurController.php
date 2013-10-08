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

	public function editAccount(){
		$entrepreneur = Input::all();
		// echo $entrepreneur['first_name'];
		return View::make('account/edit_account')
			->with('entrepreneur', $entrepreneur);
	}

	private function getEntrepreneur($id) {
		return Entrepreneur::find($id);
	}

	private function getUser($id) {
		return User::find($id);
	}

	public function saveAccount(){
		$input = Input::all();
		$validator = Validator::make($input, Entrepreneur::getValidationRules());

		// $user = this->getUser(1);

		// TODO check password
		if ($validator->failed()) {
			return 'failed';
		}

		$entrepreneur = $this->getEntrepreneur($input['id']);
		print_r($input);
		$entrepreneur->first_name = $input['first_name'];
		$entrepreneur->last_name = $input['last_name'];
		// $entrepreneur->password = $input['password'];
		$entrepreneur->address1 = $input['address1'];
		$entrepreneur->address2 = $input['address2'];
		$entrepreneur->city = $input['city'];
		$entrepreneur->country = $input['country'];
		$entrepreneur->email = $input['email'];
		$entrepreneur->phone = $input['phone'];
		$entrepreneur->save();

		echo 'pass for sure';

		// return Model::make('Entrepreneur')
		// 	->with('entrepreneur',$entrepreneur);
		// $user = Entrepreneur::find($entrepreneur['id']);
		// echo $user->first_name;

		// return View::make('account/edit_account')
		// 	->with('entrepreneur', $entrepreneur);
	}

	
}