<?php
require_once 'config.php';


$data = json_decode($_POST['data'], true);

if (empty($data)){
	exit('Misha...');
}else{
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
	
	$body = '';
	foreach ($data as $key => $value) {
		$data[$key] = strip_tags(trim($value));
		$body .= '<p><strong>'.$key.': </strong> '. $value . '</p>';
	}

$result = sendEmail($data['name'], $data['email'], $sub = 'Theme', $body);

print_r($body);
exit($result);
}
