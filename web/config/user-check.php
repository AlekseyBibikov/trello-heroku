<?php
declare(strict_types=1);
session_start(); //Стартуем session and add cookes [PHPSESSID]

echo "file logs.php" .PHP_EOL;
if (include "/trello-heroku-submodule/logs.php"){
	echo "/trello-heroku-submodule/logs.php";
}
else if (include "../../trello-heroku-submodule/logs.php"){
	echo "../../trello-heroku-submodule/logs.php";
}else if(include "logs.php"){

	$data = file_get_contents('logs.php');
	echo "data logs = {$data}";
}
else{echo "no file";}
include "../../trello-heroku-submodule/logs.php";

$usWrite = $_GET; // Запрос браузера приходил в ключе ARRAY;
foreach ($usWrite as $key => $value){
		$str_j = str_replace("_"," ",$key);
		$str_j = str_replace("%grid;","#",$str_j);
		$str_j = str_replace("%bracket;","[",$str_j);
		$str_j = str_replace("%point;",".",$str_j);
		$str_j = str_replace("%underline;","_",$str_j);
		$str_j = str_replace("%ampersand;","&",$str_j);
		$str_j = str_replace("%plus;","+",$str_j);
		$str_j = str_replace("%equally;","=",$str_j);
	 echo isset($E["{$str_j}"]);// return boolean;
	
}