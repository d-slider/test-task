<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Test task">
<meta name="author" content="d-slider">
<title>Отзывы и предложения</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php
$db_host = 'localhost'; // Хост
$db_name = 'cd79867_test'; // БД
$db_user = 'cd79867_test'; // пользователь БД
$db_pass = '7npBwdQB'; // пароль к БД
?>
	
<div class="container">
  <main>
    <div class="py-4">
      <h2>Отзывы и предложения</h2>
      <p class="lead">Ваши отзывы и предложения вы можете оставить заполнив данную веб-форму.</p>
    </div>
    <div class="row g-5">
      <div class="col-md-7 col-lg-8">
  
<?php		  
if(isset($_POST['fio'])) { // Если POST не пустой то делаем проверку данных
	
	if(trim($_POST['fio']) !== "") {
		$fio = $_POST['fio'];
	}
	else {
    	$errors[] = "Invalid fio.";
	}
	
	if(isset($_POST['email']) && trim($_POST['email']) !== ""){
		$email = $_POST['email'];
	}
	else {
    	$errors[] = "Invalid email.";
	}
	
	if(isset($_POST['category_id']) && trim($_POST['category_id']) !== ""){
	 	$category_id = $_POST['category_id'];
	}
	else {
    	$errors[] = "Invalid category.";
	}
	
	if(isset($_POST['feedback_text']) && trim($_POST['feedback_text']) !== ""){ 
		$feedback_text = $_POST['feedback_text'];
	}
	else {
    	$errors[] = "Invalid feedback text.";
	}

	if (!sizeof($errors)){ // Если нет ошибок в полях то пишем в базу.

		// Создаём соединение с БД
		$connection = new mysqli($db_host, $db_user, $db_pass, $db_name);
		// Проверяем соединение с БД
		if ($connection->connect_error) {
    		die("Connection failed: " . $connection->connect_error);
		}

		$sql = "INSERT INTO feedback (fio, email, category_id, feedback_text) VALUES ('$fio', '$email', '$category_id', '$feedback_text')";	
	
		if ($connection->query($sql) === TRUE) {
    		echo '<h4>Спасибо за ваш отзыв и проявленный интерес к нашей компании!</h4>
				  <p>Ваш отзыв принят и будет рассмотрен в ближайшее время.</p>	
				  <p><a href="/">Назад к форме</a></p>';
		} else {
    		echo "<p>Error: " . $sql . "<br>" . $connection->error . "</p>";
		}

		$connection->close();	
	}
	else {
		echo "<p>";
		foreach ($errors as $error) {
			echo $error . "<br>\r\n";
		}
		echo "</p>";
	}
}
else{	// Если POST пустой выводим форму.
		  
	echo '		  
        <form class="needs-validation" novalidate action="index.php" method="POST">
          <div class="row g-3">
            <div class="col-sm-12">
              <label for="fio" class="form-label">ФИО:</label>
              <input type="text" class="form-control" id="firstName" name="fio" placeholder="" value="" required>
              <div class="invalid-feedback">Пожалуйста введите ваше ФИО:</div>
            </div>
            <div class="col-12">
              <label for="email" class="form-label">Email:</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
              <div class="invalid-feedback"> Пожалуйста введите ваш email. </div>
            </div>
            <div cclass="col-12">
              <label for="category_id" class="form-label" >Категория отзыва:</label>
              <select class="form-select" id="category_id" name="category_id" required>';

	$connection = new mysqli( $db_host, $db_user, $db_pass, $db_name ); // коннект с сервером бд
	$connection->set_charset( "utf8mb4" ); // задаем кодировку
	$result = $connection->query( 'SELECT * FROM `category`' ); // делаем запрос на список категорий
	$connection->close();
	
	while ( $row = $result->fetch_assoc() ) // получаем все строки в цикле по одной
	{
  		echo '<option value="' . $row[ 'category_id' ] . '">' . $row[ 'category_name' ] . '</option>'; // динамически выводим категории в форме
	}
				  
	echo '</select>
              <div class="invalid-feedback">Выберите категорию:</div>
            </div>
            <div class="col-12">
              <label for="feedback_text" class="form-label">Текст отзыва:</label>
              <textarea class="form-control" id="feedback_text" name="feedback_text" rows="6" required placeholder="Ваш отзыв."></textarea>
              <div class="invalid-feedback">Пожалуйста напишите ваш отзыв.</div>
            </div>
          </div>
          <hr class="my-4">
          <button class="w-100 btn btn-primary btn-lg" type="submit">Отправить отзыв</button>
        </form>';
}
?>		  
      </div>
    </div>
  </main>	
<footer class="my-5 pt-5 text-muted text-small">
    <p class="mb-1">&copy; 2000–2022. Хорошая Компания.</p>
  </footer>
</div>
	
<script src="js/bootstrap.bundle.min.js"></script> 
<script src="js/form-validation.js"></script>
</body>
</html>