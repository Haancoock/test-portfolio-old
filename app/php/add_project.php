<?php 
$data = array();

$name = $_POST['projectName'];
$url = $_POST['projectURL'];
$descript = $_POST['projectDescr'];
$file = $_POST['img'];
print_r($_FILES);
// print_r($_POST);

if ($name === '' || $url === '' || $file === '' || $descript === '' ) {
		$data['mes'] = 'error';
}else{
	$data['mes'] ='Ok';
};


header("Content-Type", "application/JSON");
echo json_encode($data);
exit;
 ?>