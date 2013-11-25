<?php

Validator::extend('phone', function($attribute, $value, $parameters)
{
    return !!preg_match('~^[\d-\(\)\s\+]*$~', $value);
});

Validator::extend('old_password', function($attribute, $value, $parameters)
{
	list($salt, $hash) = $parameters;
	return Hasher::checkHash($value, $salt, $hash);
});
