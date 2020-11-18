<?php
  require 'link/db.php';
?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>КемГУ Форум</title>
    <link rel="stylesheet" href="css/master.css">
  </head>
  <body>
    <header>
      <a class="name" href="#"><img class="imglogo" src="img/logo.png" alt="">КемГУ Форум</a>
      <div class="menu">
        <?php
          if( isset($_SESSION['logged_user'])) : ?>
        <p class="username">
          <?php
            echo $_SESSION['username'];
          ?>
        </p>
        <a href="/link/logout.php">exit</a>
      <?php else : ?>
        <p><a href="auth.php">Вход</a> | <a href="reg.php">Регистрация</a></p>
      <?php endif; ?>
      </div>
    </header>
    <div class="adress">
      <a href="#">Главная</a>
    </div>
    <div class="institutions">
      <p>Выберите институт (или оффтоп)</p>
      <ul class="instList">
        <?php


        ?>
      </ul>
    </div>
  </body>
</html>
