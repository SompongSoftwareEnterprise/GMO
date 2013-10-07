<?php

class RegistrationController extends BaseController {

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
		return View::make('registration/index');
	}

	public function registerCustomer() {
		return $this->registerForm(0);
	}
	
	public function registerAgency() {
		return $this->registerForm(1);
	}
	
	private function registerForm($is_agency) {
		return View::make('registration/form')
			->with('is_agency', $is_agency);
	}
	
	public function submitRegister() {
		
		// create a validator
		$validator = Validator::make(Input::all(), array(
			'first_name' => 'required',
			'last_name' => 'required',
			'sex' => 'required|in:M,F',
			'date_of_birth__date' => 'required|integer',
			'date_of_birth__month' => 'required|integer',
			'date_of_birth__year' => 'required|integer',
			'address1' => 'required',
			'city' => 'required',
			'email' => 'required|email',
			'phone' => 'required',
		));
		
		// validation failed!!
		if ($validator->fails()) {
			
			// get where to redirect back
			$action = Input::get('is_agency') == '1' ? 'registerAgency' : 'registerCustomer';
			
			// redirect user back to form
			return Redirect::action('RegistrationController@' . $action)
				->withErrors($validator)
				->withInput();
			
		}
	}
	
}