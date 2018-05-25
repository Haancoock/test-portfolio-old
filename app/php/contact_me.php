<?php
require_once 'config.php';


$data = json_decode($_POST['data'], true);

if (empty($data)){
	exit('Misha...');
}else{
	validateForm($data);
	$body = '';
	foreach ($data as $key => $value) {
		$data[$key] = strip_tags(trim($value));
		$body .= '<p><strong>'.$key.': </strong> '. $value . '</p>';
	}

$result = sendEmail($data['name'], $data['email'], $sub = 'Theme', $body);

print_r($result);
return($result);
}
