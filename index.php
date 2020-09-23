<?php


$json = json_decode(file_get_contents('users.json', true));
header('Content-type: json/application');
require 'functions.php';
$Module = $_GET['url_param'];



if ($Module === 'dishes') {
		
}






?>