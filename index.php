<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Test">
<meta name="author" content="d-slider">
<title>Отзывы и предложения</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
</head>
<body class="bg-light">
<?php
$db_host = 'localhost'; // хост
$db_name = 'cd79867_test'; // бд
$db_user = 'cd79867_test'; // пользователь бд
$db_pass = '7npBwdQB'; // пароль к бд

mysqli_report( MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT ); // включаем сообщения об ошибках
$mysqli = new mysqli( $db_host, $db_user, $db_pass, $db_name ); // коннект с сервером бд
$mysqli->set_charset( "utf8mb4" ); // задаем кодировку

$result = $mysqli->query( 'SELECT * FROM `client`' ); // запрос на выборку
while ( $row = $result->fetch_assoc() ) // получаем все строки в цикле по одной
{
  echo '<p>Запись id=' . $row[ 'id' ] . '. Имя: ' . $row[ 'fio' ] . '</p>'; // выводим данные
}
?>
<div class="container">
  <main>
    <div class="py-5 ">
      <h2>Отзывы и предложения</h2>
      <p class="lead">Ваши отзывы и предложения вы можете оставить заполнив данную веб-форму.</p>
    </div>
    <div class="row g-5">
      <div class="col-md-7 col-lg-8">
        <form class="needs-validation" novalidate action="success.php" method="POST">
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
              <select class="form-select" id="category_id" name="category_id" required>
                <option value="">Отзыв</option>
                <option>Предложение</option>
                <option>Жалоба</option>
                <option>Рекламация</option>
              </select>
              <div class="invalid-feedback">Выберите категорию:</div>
            </div>
            <div class="col-12">
              <label for="feedback" class="form-label">Текст отзыва:</label>
              <textarea class="form-control" id="feedback" name="feedback" rows="6" required placeholder="Ваш отзыв."></textarea>
              <div class="invalid-feedback">Пожалуйста напишите ваш отзыв.</div>
            </div>
          </div>
          <hr class="my-4">
          <button class="w-100 btn btn-primary btn-lg" type="submit">Отправить отзыв</button>
        </form>
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