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

		// validation rules
		$rules = array(
			'first_name' => 'required',
			'last_name' => 'required',
			'sex' => 'required|in:M,F',
			'address1' => 'required',
			'city' => 'required',
			'province' => 'required',
			'zip' => 'required',
			'email' => 'required|email',
			'phone' => 'required',
		);

		if (Input::get('is_company', '0')) {
			unset($rules['last_name']);
			unset($rules['sex']);
		} else {
			$rules += InputDate::rules('date_of_birth');
		}
		
		// create a validator
		$validator = Validator::make(Input::all(), $rules);
		
		// validation failed!!
		if ($validator->fails()) {
			
			// get where to redirect back
			$action = Input::get('is_agency') == '1' ? 'registerAgency' : 'registerCustomer';
			
			// redirect user back to form
			return Redirect::action('RegistrationController@' . $action)
				->withErrors($validator)
				->withInput();
			
		}
		
		// save data
		$username = 'user' . time();    // TODO
		$password = 'none';             // TODO
		
		$user = new User;
		$user->username = $username;
		// TODO: hash password
		$user->save();
		
		$entrepreneur = new Entrepreneur;
		$entrepreneur->first_name = Input::get('first_name');
		$entrepreneur->last_name = Input::get('last_name', '');
		$entrepreneur->sex = Input::get('sex', '');
		$entrepreneur->date_of_birth = InputDate::parse('date_of_birth');
		$entrepreneur->nationality = Input::get('nationality');
		$entrepreneur->country = Input::get('country');
		$entrepreneur->address1 = Input::get('address1', '');
		$entrepreneur->address2 = Input::get('address2', '');
		$entrepreneur->city = Input::get('city');
		$entrepreneur->province = Input::get('province');
		$entrepreneur->zip = Input::get('zip');
		$entrepreneur->email = Input::get('email');
		$entrepreneur->phone = Input::get('phone');
		$entrepreneur->fax = Input::get('fax');
		$entrepreneur->mobile = Input::get('mobile');
		$entrepreneur->user_id = $user->id;
		$entrepreneur->save();
		
		// TODO: send email
		return Message::make('The user has been successfully registered', 'RegistrationController@index', 'Finish')
			->with('back', false);
		
		
	}
	
}
