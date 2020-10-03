<?php

$json = json_decode(file_get_contents('users.json', true));
header('Content-type: json/application');
require 'functions.php';
$Url = $_GET['url_param'];
$params = explode('/', $Url);
$method = $_SERVER['REQUEST_METHOD'];

$Module = $params[0];
$id = $params[1];
$tag = $params[2];

if ($method == 'GET') {
	if ($Module == 'dishes') {
		if(isset($id)){
			if ($id == 'tag') {
				findDishes($tag, $json);
			} else {
			$res = json_encode($json[$id]);
			if ($res == 'null') echo Error('404', 'Dish not found');
			else echo $res;
			}
		} else echo json_encode($json);		
	}
} elseif ($method == 'POST') {
	if ($Module == 'dishes') {
		if(isset($id)){
			editingDishes($_POST, $id, $json);
			echo json_encode($json[$id]);
		} else addDishes($_POST, $json);
	}
} elseif ($method == 'DELETE') {
	if ($Module == 'dishes') {
		if(isset($id)){
			delDishes($id, $json);
		} else echo Error('404', 'Dish not found');
	}
}









?>