<?php
declare(strict_types=1);
session_start(); //Стартуем session and add cookes [PHPSESSID]
include "./json-lib/logs.php";

	$_SESSION['name'] = $_POST['user_name']; 
	$_SESSION['login'] = $_POST['email']; // сохраняем логин и пароль
	$_SESSION['password'] = $_POST['password']; 
	// print_r($_ENV);// была идея сохранить в переменную _ENV но не понял как.
	$contlog = file_get_contents('./json-lib/logs.php');
	file_put_contents('./json-lib/logs.php', $contlog.'$E'."['${_POST['email']}'] = ['${_POST['password']}' , '${_POST['user_name']}'];" . PHP_EOL);
	setcookie("trello-clone", $_POST['user_name'], ['path'=>"/"]);

	echo $contlog;//контент перезаписывает файла logs.php
	// print_r($E);//но в переменную массива $E данные не поподают.
	echo "
	<!DOCTYPE html>
	<html>
		<head>
			<meta charset='utf-8'>
			<meta name='viewport' content='width=device-width'>
			<title>Trello clone</title>
			<link href='../css/style.css' rel='stylesheet' type='text/css' />
			<link href='../css/form.css' rel='stylesheet' type='text/css' />
			<link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,700&display=swap&subset=cyrillic-ext' rel='stylesheet'>
			<link rel='icon' type='image/png' href='../icon.png'/>
		</head>
		<body>
			<div class='container'>
				<div style='text-align:center; color:white; font-weight:bold'>
					<h1>Приветствую вас, ${_POST['user_name']}.</h1>
					<span>Вы зарегестрировались в планировщике задач. Для продолжения нажмите START</span>
					<a href='../trello-clone.html' style='width:60px; background-color:#0af15f; display:block; margin:10px auto; padding:5px; font-family:auto;'>START</a>
				</div>
			</div>
		</body>
	</html>";