<?php

function validateForm($data){
	require_once 'config.php';

	$v = new Valitron\Validator($data);
	$v->rule('required', ['name', 'email', 'message', 'code']);
	$v->rule('email', 'email');
	$v->rule('integer', 'code');
	if($v->validate()) {
    	echo "Yay! We're all good!";
	}else {
    	// Errors
    	print_r($v->errors());
	}
}