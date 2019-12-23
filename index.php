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
$role =[
				'admin' => ['post', 'comments', 'statistics'],
				'editor'=> ['post', 'comments']
			];

$includeGet = $_GET['include'];
$include =explode(',', $includeGet);

$includeUser = $_GET['role'];
$roleKeys = array_keys($role);

if (!isset($includeGet) || $includeGet == '') {
	echo 'Введите данные в поле INCLUDE';
	die();
}

if (!isset($includeUser) && $includeUser == '') {
	echo 'Введите данные в поле ROLE';
	die();
}

if (in_array($includeUser, $roleKeys)){
	echo 'Привет ' .$includeUser;
	echo '<br>'.'Вы запросили доступ к ';
	foreach ($include as $value){
		if (in_array($value, $role[$includeUser])){
			echo "$value ";
		}else echo '<br>'.'У вас нет доступа к '. $value;
	}
}else echo 'У вас нет прав ' . $includeUser . ' введите верное значение ROLE';


?>
</body>
</html>

