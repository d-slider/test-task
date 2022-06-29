<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>TEST</title>
</head>

<body>
<?php
$db_host='localhost'; // ваш хост
$db_name='cd79867_test'; // ваша бд
$db_user='cd79867_test'; // пользователь бд
$db_pass='7npBwdQB'; // пароль к бд
	
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// включаем сообщения об ошибках
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); // коннект с сервером бд
$mysqli->set_charset("utf8mb4"); // задаем кодировку

$result = $mysqli->query('SELECT * FROM `test`'); // запрос на выборку
while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
{
    echo '<p>Запись id='.$row['id'].'. Имя: '.$row['name'].'</p>';// выводим данные
}
	?>	
</body>
</html>