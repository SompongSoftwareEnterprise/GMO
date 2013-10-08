<?php

class Entrepreneur extends Eloquent {

	public static function save_edit_account($input){
		$user = Entrepreneur::find($input['id']);
		echo $input['first_name'];
	}

	public static function getValidationRules() {
        $rules = array(
        	'first_name' => 'required|min:3|max:80|alpha',
        	'last_name' => 'Required|min:3|Max:80|Alpha',
	        'email'     => 'Required|Between:3,64|Email|Unique:entrepreneurs',
	        // 'password'  =>'Required|AlphaNum|Between:4,8|Confirmed',
	        // 'password_confirmation'=>'Required|AlphaNum|Between:4,8'
        );
        return $rules;
    }

}

?>