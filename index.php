<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
<!--Данные надо воодить так http://localhost:3000/?role=admin&include=post-->
<?php
$role =
		[
				'admin', 'editor'
		];
$include =
		[
				'post', 'comments', 'statistics'
		];

$getRole = $_GET['role'];
$getInclude = $_GET['include'];
$setIncludeToArray = explode(',', $getInclude);

if (!isset($getRole) || $getRole == '') {
	echo 'Вы не ввели данные ROLE';
	die();
}

if (!isset($getInclude) || $getInclude == '') {
	echo 'Вы не ввели данные INCLUDE';
	die();
}

foreach ($setIncludeToArray as $value) {
	switch ($value) {
		case $include[0]:
			break;
		case $include[1]:
			break;
		case $include[2]:
			break;
		default:
			echo 'Значение INCLUDE введено неверно. Вы ввели ' . $value;
			die();
	}
}
if ($getRole == $role[0] || $getRole == $role[1]) {

	if ($getRole == $role[0]) {
		echo 'Привет Админ ты запросил - ' . $getInclude;
	}

	if ($getRole == $role[1]) {
		foreach ($setIncludeToArray as $value) {
			if ($value == 'statistics') {
				echo 'К разделу - ' . $value . ' Доступ запрещен';
				die('');
			}
		}
		echo 'Привет Редактор ты запросил - ' . $getInclude;

	}
} else {
	echo 'У вас нет прав доступа';
}
?>
</body>
</html>

