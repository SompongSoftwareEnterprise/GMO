<?php

use Mailgun\Mailgun;

class RegistrationController extends BaseController {

	protected $requireGMOStaff = true;
	
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
			'zip' => 'required|numeric',
			'email' => 'required|email',
			'phone' => 'required|phone',
			'fax' => 'phone',
			'mobile' => 'phone',
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

		$is_agency = Input::get('is_agency') == '1';

		// save data
		// we generate a nonsense username, and edit it later after we know its id
		$username = 'tmpuser' . time() . mt_rand();
		$password = PasswordGenerator::generate();
		
		$user = new User;
		$user->username = $username;
		$user->password_salt = Hasher::makeSalt();
		$user->password_hash = Hasher::makeHash($password, $user->password_salt);
		$user->role = $role = $is_agency ? 'Agency' : 'Customer';
		$user->save();

		$user->username = $username = sprintf("user%05d", $user->id);
		$user->save();
		
		$entrepreneur = new Entrepreneur;
		$entrepreneur->first_name = $first_name = Input::get('first_name');
		$entrepreneur->last_name  = $last_name  = Input::get('last_name', '');

		$user->name = trim($first_name . ' ' . $last_name);
		$user->save();

		$entrepreneur->is_agency  = $is_agency ? 1 : 0;
		$entrepreneur->email      = $email = Input::get('email');
		$entrepreneur->sex = Input::get('sex', '');
		$entrepreneur->date_of_birth = InputDate::parse('date_of_birth');
		$entrepreneur->nationality = Input::get('nationality');
		$entrepreneur->country = Input::get('country');
		$entrepreneur->address1 = Input::get('address1', '');
		$entrepreneur->address2 = Input::get('address2', '');
		$entrepreneur->city = Input::get('city');
		$entrepreneur->province = Input::get('province');
		$entrepreneur->zip = Input::get('zip');
		$entrepreneur->phone = Input::get('phone');
		$entrepreneur->fax = Input::get('fax');
		$entrepreneur->mobile = Input::get('mobile');
		$entrepreneur->user_id = $user->id;
		$entrepreneur->save();

		if ($entrepreneur->is_agency) {
			$agency_th = <<<EMAIL
Agency ID: {$user->id}
* ผู้ประกอบการจะต้องใช้ Agency ID เพื่ออนุญาตให้คุณสามารถดำเนินการแทนผู้ประกอบการ
EMAIL;
			$agency_en = <<<EMAIL
Agency ID: {$user->id}
* A customer will use your Agency ID to grant you permission to work on their behalf.
EMAIL;
		} else {
			$agency_th = $agency_en = '';
		}

		$message = <<<EMAIL
Welcome to Department of Agriculture, $first_name  $last_name

Your account information :
Username: $username
Password: $password
User Type: $role
$agency_en

Go to website click this link http://gmo.tsp.dt.in.th/

* If you have not registered for a GMO Entrepreneur account and you think that
  you received this email by mistake from the system, please inform us at admin@gmo.com
** If you have a question about using the website, feel free to ask us at http://gmo.tsp.dt.in.th/ or call 08976115334 
--------------------------------------------------------------------------------------

ยินดีต้อนรับสู่กรมวิชาการเกษตร คุณ $first_name  $last_name


รายละเอียด account ของคุณ:
Username: $username
Password: $password
ประเภทผู้ใช้งาน คือ $role
$agency_th

ไปยังหน้าเวปไซท์ คลิกที่ link นี้ http://gmo.tsp.dt.in.th/

* ถ้าคุณไม่ได้ขึ้นทะเบียนผู้ประกอบการกับระบบจีเอ็มโอและคิดว่านี่อาจจะเป็นข้อผิดพลาดของระบบ กรุณาแจ้งมาที่ admin@gmo.com
** หากมีคำถามใดๆ เกี่ยวกับการใช้งาน ขอเชิญติดต่อเราผ่านทาง หน้า FAQ ครับที่ http://gmo.tsp.dt.in.th/ หรือ โทร 084452356652334
EMAIL;
		
		// This API key is for use in TSP Project only
		// and will be reset after development has finished.
		$mg = new Mailgun("key-6v-ukw5th6q7j5fftodmgie2y1rxza-5");
		$mg->sendMessage("sandbox7761.mailgun.org", array(
			'from' => 'gmo@sandbox7761.mailgun.org',
			'to' => $email,
			'subject' => 'GMO Registration Completed',
			'text' => $message));
		
		return MessageView::make('The user has been successfully registered', 'RegistrationController@index', 'Finish')
			->with('back', false)
			->with('extraHtml', '<pre id="email-message" data-to="' . $email . '"><b>Email Sent To: </b>' . $email .
				'</pre>');
		
	}
	
}
