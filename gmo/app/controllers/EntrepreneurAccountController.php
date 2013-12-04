<?php

class EntrepreneurAccountController extends AbstractEntrepreneurController {

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

		$id = $this->entrepreneur->id;
		$username = $this->entrepreneur->user_id;
		$agencyIDs = CustomerAgency::where('customer_id','=',$username)->get();

		$agencies = array();

		foreach($agencyIDs as $agencyID){
			$agency = Entrepreneur::where('user_id','=',$agencyID->agency_id)->first();
			//                    $tmp = array('agencyID' => $agency->user_id,'first_name' => $agency->first_name,'last_name' => $agency->last_name);
			array_push($agencies,$agency);
		}

		//$a = '123'
		//sd($a)
		//var_dump($this->entrepreneur->id);
		var_dump($this->entrepreneur->is_agency);
		return View::make('account/index')
			->with('entrepreneur', $this->entrepreneur)
			->with('agencies',$agencies)
			->with('from_edit_page',Session::get('from_edit_page'));
	}

	public function editAccount(){
		return View::make('account/edit_account')
			->with('entrepreneur', $this->entrepreneur);
	}

	private function getEntrepreneur($id) {
		return Entrepreneur::find($id);
	}

	private function getUser($id) {
		return User::find($id);
	}

	public function saveAccount(){

		$rules = Entrepreneur::getValidationRules();
		
		// validate old password
		$rules += array(
			// a validation rule to check old password.
			// the code is in "gmo/app/validators.php".
			'old_password' => 'old_password:' . $this->entrepreneur->user->password_salt . ',' . $this->entrepreneur->user->password_hash,
			'password' => 'confirmed'
		);

		unset($rules['first_name']);
		unset($rules['last_name']);

		$validator = Validator::make(Input::all(), $rules);

		// $user = this->getUser(1);

		// TODO check password
		if ($validator->fails()) {
			return Redirect::action('EntrepreneurAccountController@editAccount')
				->withErrors($validator)
				->withInput();
		}

		$id = $this->entrepreneur['id'];
		$this->entrepreneur['first_name'] = Input::get('first_name');
		$this->entrepreneur['last_name'] = Input::get('last_name');
		
		$this->entrepreneur['address1'] = Input::get('address1');
		$this->entrepreneur['address2'] = Input::get('address2');
		$this->entrepreneur['city'] = Input::get('city');
		$this->entrepreneur['country'] = Input::get('country');
		$this->entrepreneur['email'] = Input::get('email');
		$this->entrepreneur['phone'] = Input::get('phone');
		// $entrepreneur = $this->getEntrepreneur($input['id']);
		// //print_r($input);
		// $entrepreneur->first_name = $input['first_name'];
		// $entrepreneur->last_name = $input['last_name'];
		// $entrepreneur->password = $input['password'];
		// $entrepreneur->address1 = $input['address1'];
		// $entrepreneur->address2 = $input['address2'];
		// $entrepreneur->city = $input['city'];
		// $entrepreneur->country = $input['country'];
		// $entrepreneur->email = $input['email'];
		// $entrepreneur->phone = $input['phone'];
		$this->entrepreneur->save();

		if (Input::get('password')) {
			$user = $this->entrepreneur->user;
			$user->password_hash = Hasher::makeHash(Input::get('password'), $user->password_salt);
			$user->save();
		}


		return MessageView::make('Your account information has been updated.',
			'EntrepreneurAccountController@index', 'Finish')
			->with('back', false);

		// return Model::make('Entrepreneur')
		// 	->with('entrepreneur',$entrepreneur);
		// $user = Entrepreneur::find($entrepreneur['id']);
		// echo $user->first_name;

		// return View::make('account/edit_account')
		// 	->with('entrepreneur', $entrepreneur);
	}
}
