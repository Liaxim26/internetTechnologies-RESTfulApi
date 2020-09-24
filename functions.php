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

function editingDishes($post, $id, $json) {
	$res = json_encode($json[$id]);
	if ($res == 'null') echo Error('400', 'Editing error');
	else {
		$taskList = $json;
		unset($json);
		foreach ($post as $key => $value) {
			$taskList[$id]->$key = $value; 
		}
		file_put_contents('users.json',json_encode($taskList));     
		unset($taskList); 	
	}
}

function delDishes($id, $json) {
   	$res = json_encode($json[$id]);
	if ($res == 'null') echo Error('404', 'Dish not found');
	else {
		$taskList = $json;
		unset($json);
		unset($taskList[$id]);
		file_put_contents('users.json',json_encode($taskList));     
		unset($taskList); 
	}
}


 ?>