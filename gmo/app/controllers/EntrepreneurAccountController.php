<?php

class EntrepreneurAccountController extends BaseController {

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

		$id = 1001;
                $agencyIDs = CustomerAgency::where('customer_id','=',$id)->get();

                $agencies = array();

                foreach($agencyIDs as $agencyID){
                    $agency = Entrepreneur::where('user_id','=',$agencyID->agency_id)->first();
//                    $tmp = array('agencyID' => $agency->user_id,'first_name' => $agency->first_name,'last_name' => $agency->last_name);
                    array_push($agencies,$agency);
                }

		return View::make('account/index')
			->with('entrepreneur', $this->entrepreneur)
			->with('agencies',$agencies);
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
		$validator = Validator::make(Input::all(), Entrepreneur::getValidationRules());

		// $user = this->getUser(1);

		// TODO check password
		if ($validator->fails()) {
			return Redirect::action('EntrepreneurAccountController@editAccount')
				->withErrors($validator)
				->withInput();
		}

		print_r(Input::all());
		$id = $this->entrepreneur['id'];
		echo "$id";
		$this->entrepreneur['first_name'] = Input::get('first_name');
		$this->entrepreneur['last_name'] = Input::get('last_name');
		// $entrepreneur = $this->getEntrepreneur($input['id']);
		// print_r($input);
		// $entrepreneur->first_name = $input['first_name'];
		// $entrepreneur->last_name = $input['last_name'];
		// // $entrepreneur->password = $input['password'];
		// $entrepreneur->address1 = $input['address1'];
		// $entrepreneur->address2 = $input['address2'];
		// $entrepreneur->city = $input['city'];
		// $entrepreneur->country = $input['country'];
		// $entrepreneur->email = $input['email'];
		// $entrepreneur->phone = $input['phone'];
		$this->entrepreneur->save();

		echo 'pass for sure';

		return View::make('account/update_account')
				->with('status',true);

		// return Model::make('Entrepreneur')
		// 	->with('entrepreneur',$entrepreneur);
		// $user = Entrepreneur::find($entrepreneur['id']);
		// echo $user->first_name;

		// return View::make('account/edit_account')
		// 	->with('entrepreneur', $entrepreneur);
	}
}
