<?php 
function Error($p1, $p2) {
	exit('{"error;"'.$p1.', "text:"'.$p2.'"}');
}


echo '<pre>';
$json = json_decode(file_get_contents('users.json', true));



if ($Module == 'auth') {
if (!$Param['login']) Error(1, 'не указан логин пользователя');
if (!$Param['password']) Error(2, 'не указан пароль пользователя');

foreach ($json as $key => $value) {
	for ($i=0; $i <= count($key); $i++) { 
		if ($Param['login'] == ($value[$i]->login) and $Param['password'] == ($value[$i]->password)) echo ($value[$i]->role);	
	}
}
/*$Param['login'] = FormChars($Param['login']);
$Array = array('password','role');
$Exp = explode('.', $Param['param']);
foreach ($Exp as $key) if ($Param != 'all' and !in_array($key, $Array)) Error(3, 'параметр указан не верно')
if ($Param == 'all') $Select = $Array;
else $Select = $Exp;*/

} else if ($Module == 'dishes') {

if (!$Param['param']) Error(3, 'не передан параметр');	

$Parametrs = array('title', 'description', 'composition', 'cost', 'tags', 'image');
$Exp = explode('.', $Param['param']);

if (!$Exp[5]) Error(3, "Параметр указан не верно");
else {
	$taskList = $json;
	unset($json);
	foreach ($Exp as $key => $value) {
		//var_dump($json->Dishes);
		//$json->Dishes[0]->title = 'qwe';	
		$taskList[]->Dishes[] = array("$Parametrs[$key]"=>$value);
	}
	file_put_contents('users.json',json_encode($taskList));     
	unset($taskList); 
	var_dump($json->Dishes);
}

/*$file = file_get_contents('users.json');  // Открыть файл data.json          
		$taskList = json_decode($file,TRUE);        // Декодировать в массив                    
		unset($file);                               // Очистить переменную $file           
		$taskList[] = '$Parametrs[$key]'=>$value);   // Представить новую переменную как элемент массива, в формате 'ключ'=>'имя переменной'
		file_put_contents('users.json',json_encode($taskList));  // Перекодировать в формат и записать в файл.          
		unset($taskList); 
		echo $value;*/



/*
$file = file_get_contents('users.json');  // Открыть файл data.json          
$taskList = json_decode($file,TRUE);        // Декодировать в массив                    
unset($file);                               // Очистить переменную $file           
$taskList[] = array('name'=>$name);        // Представить новую переменную как элемент массива, в формате 'ключ'=>'имя переменной'
file_put_contents('users.json',json_encode($taskList));  // Перекодировать в формат и записать в файл.          
unset($taskList);    
*/

} else {
	Error(0, 'не указан Метод');
}
?>