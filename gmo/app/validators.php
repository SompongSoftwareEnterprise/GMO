<?php

Validator::extend('phone', function($attribute, $value, $parameters)
{
    return !!preg_match('~^[\d-\(\)\s\+]*$~', $value);
});
