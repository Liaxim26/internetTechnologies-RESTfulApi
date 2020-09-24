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

function delDishes() {

	$file = file_get_contents('php/data.json');         // Открыть файл data.json
	$taskList=json_decode($file,TRUE);                  // Декодировать в массив 
   	foreach ( $taskList  as $key => $value){        // Найти в массиве  
      if (in_array( $current, $value)) {           // Переменную $current
                unset($taskList[$key]);             // после обнаружения удалить
          }
      } 
	file_put_contents('php/data.json',json_encode($taskList)); // Перекодировать в формат и записать в файл.
	unset($taskList);                           // Очистить переменную $taskList 
	file_put_contents('php/data.json',json_encode($taskList)); // Перекодировать в формат и записать в файл.
	unset($taskList); 

}


 ?>