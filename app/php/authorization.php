<?php 
session_start();
require_once('bd.php');
$data = array();
$login = $_POST['login'];
$password = $_POST['password'];

$userData = $DB->prepare('SELECT login, password FROM admins');
// $userData->bindParam(':login',$login);
// $userData->bindParam(':password', $password);
$userData->execute();
$userRes = $userData->fetch();

if (!$userRes) {
	$data['mess'] = 'error in PDO';
}else{
	if ($userRes['login'] === $login && $userRes['password'] === $password) {
		$data['mess'] = 'done';
		$_SESSION['login'] = $login;
		$_SESSION['password'] = $password;
	}else{
		$data['mess'] = 'error';
	}
	
}

header("Content-Type", "application/JSON");
echo json_encode($data);
 ?>