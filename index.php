<?php


$json = json_decode(file_get_contents('users.json', true));
header('Content-type: json/application');
require 'functions.php';
$Url = $_GET['url_param'];
$params = explode('/', $Url);

$Module = $params[0];
$id = $params[1];

if ($Module == 'dishes') {
	if(isset($id)){
		echo json_encode($json[$id]);
	} else {
		echo json_encode($json);
	}
		
}






?>