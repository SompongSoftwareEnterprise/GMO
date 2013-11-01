<?php

class Entrepreneur extends Eloquent {

	public static function save_edit_account($input){
		$user = Entrepreneur::find($input['id']);
		echo $input['first_name'];
	}

	public static function getValidationRules() {
        $rules = array(
        	'first_name' => 'required|min:3|max:80|Alpha',
        	'last_name' => 'Required|min:3|Max:80|Alpha',
	        'email'     => 'Required|Between:3,64|Email',
	        'address1' => 'required',
			'city' => 'required',
			'province' => 'required',
			'zip' => 'required',
			'phone' => 'required',
			'old_password' => 'required',
	        'password'  =>'Required|AlphaNum|Between:4,8',
	        'password_confirmation'=>'AlphaNum|Between:4,8'
        );
        return $rules;
    }
    
    public function fullName() {
		return $this->first_name . ' ' . $this->last_name;
	}

}

?>