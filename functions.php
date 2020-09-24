<?php 

function Error($p1, $p2) {
	http_response_code($p1);
	exit('{"status code;"'.$p1.', "ctatus text:"'.$p2.'"}');
}

function addDishes($post, $json) {
	$taskList = $json;
	unset($json);
	foreach ($post as $key => $value) {
		$taskLists[$key] = $value; 
	}
	$taskList[] = $taskLists;
	print_r($taskList);
	file_put_contents('users.json',json_encode($taskList));     
	unset($taskList); 
}



 ?>