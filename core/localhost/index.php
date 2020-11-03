<?php
  require 'link/db.php';
?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <header>
      <a class="logo" href="#">КемГУ Форум</a>
      <div class="regauth">
        <?php
          if( isset($_SESSION['logged_user'])) : ?>
        <?php
          echo $_SESSION['username'];
        ?>
        <a href="link/logout.php">exit</a>
      <?php else : ?>
        <p><a href="auth.php">Вход</a> | <a href="reg.php">Регистрация</a></p>
      <?php endif; ?>
      </div>
    </header>
    <div class="adress">
      <a href="#">Главная</a>
    </div>
  </body>
</html>
