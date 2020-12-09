<?php
require 'link/db.php';
?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/master.css">
    <title>Профиль</title>
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
    <div class="user profile">
      <div class="userImg">

      </div>
      <div class="userInfo">
        <p class="username2">
          <?php
          echo $_SESSION['username'];
          ?>
        </p>
        <p class="userDescription">Тута будет описание юзера, которое будут видеть другие, при переходе на его профиль</p>
        <div class="userData">
          <p>Тут будет его имя</p>
        </div>
      </div>
    </div>
  </body>
</html>
