<?php

if (empty($data)) {
	exit('Misha...');


$data = json_decode($_POST['data'], true);

if(empty($data['name']) && empty($data['email']) && empty($data['message']) && empty($data['code']))
	exit('Нет обязательных данных');

foreach ($data as $key => $value) {
	$data[$key] = strip_tags(trim($value));
}

exit('Very good');
?>