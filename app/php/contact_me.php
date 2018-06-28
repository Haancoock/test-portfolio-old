<?php
require_once 'config.php';
$dataAns = array();
$data = json_decode($_POST['data'], true);
$gCaptcha = $data['g-recaptcha-response'];
$captchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
$captchaKey = '6LfeYV4UAAAAAP6Y8SMAlEnNTi6wNijpW1OtgOld';
$captchaQuery = $captchaUrl.'?secret='.$captchaKey.'&response='.$gCaptcha.'&remoteip='.$_SERVER['REMOTE_ADDR'];
$gData = json_decode(file_get_contents($captchaQuery));

if (empty($data) && $gData->success == false){
	exit('Misha...');
}else{
	validateForm($data);
	$body = '';
	$dataAns['mess'] = 'done';
	foreach ($data as $key => $value) {
		$data[$key] = strip_tags(trim($value));
		$body .= '<p><strong>'.$key.': </strong> '. $value . '</p>';
	}

$result = sendEmail($data['name'], $data['email'], $sub = 'Theme', $body);


}
header("Content-Type", "application/JSON");
echo json_encode($dataAns);