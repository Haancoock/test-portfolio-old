<?php 
$data = array();

$name = $_POST['projectName'];
$url = $_POST['projectURL'];
$descript = $_POST['projectDescr'];
$file = $_POST['img'];
$fileD = $_FILES['file'];

if ($name === '' || $url === '' || $file === '' || $descript === '' || empty($fileD['name'])) {
		$data['mes'] = 'error';
}else{
	
	if (!file_exists('../files')) {
		mkdir('../files', 777);
	};

	if($fileD['type'] !== 'image/gif' && $fileD['type'] !== 'image/jpeg' && $fileD['type'] !== 'image/png'){
		$data['mes'] = 'error';
	}else{
		//создание имени для картинки, защита от перезаписи
		$type = strtolower(strrchr($fileD['name'], '.')); // взятие типа файла 
		$fileName = md5(uniqid(rand(10000, 99999)));
		$fileNameCopy = $fileName.'_copy';
		//указание пути сохранения файла
		$fileDist = $_SERVER['DOCUMENT_ROOT'].'/portf/test-portfolio-old/app/files/'.$fileName.$type;
		if($fileD['size'] == 0 || $fileD['size'] > 2097152){
			$data['mes'] = 'error';
		}else{
			if (!move_uploaded_file($fileD['tmp_name'], $fileDist)) {
				$data['mes'] = 'error';
			}else{
				$data['mes'] = 'Ok';
			};
		};
	};
};


header("Content-Type", "application/JSON");
echo json_encode($data);
exit;
 ?>