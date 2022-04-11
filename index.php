<?php
  include_once('functions.php');
  include_once('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson-18</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1>Список литературы.</h1>
  <div class="container">
    <?php
      show();
    ?>
  </div>
  <form action="/" method="POST" enctype="multipart/form-data">
    <input type="text" name="name"><label> Наименование книги</label><br>
    <input type="text" name="author"><label> Автор</label><br>
    <input type="text" name="year"><label> Год выпуска</label><br>
    <input type="submit" name='send' value="Показать">
  </form>
</body>
</html>

