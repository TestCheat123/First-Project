<?php
require 'link/db.php';
?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>КемГУ Форум</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
                <a class="header_name" href="index.php">
                <img class="header_logo" src="img/logo.png" alt=""></a>
                <a class="header_logo_text" href="index.php">КемГУ Форум</a>
                <div class="header_account">
                    <?php if( isset($_SESSION['logged_user'])) : ?>
                    <a class="exit" href="/link/logout.php">Выход</a>
                    <a class="username" href="profile.php"> <?php echo $_SESSION['user']['username']; ?> </a>
                    <?php else : ?>
                    <a class="reg" href="reg.php">Регистрация</a>
                    <a class="auth" href="auth.php">Вход</a>
                    <?php endif; ?>
                </div>
        </header>
        <a class="adress" href="index.php">Главная </a>
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
    <form class="" action="profile.php" method="post" enctype="multipart/form-data">
      <input type="file" name="avatar"><br>
      <p><button type="submit" name="do_avatar">Добавить автар</button></p>
      <?php
        if ($_POST['do_avatar']) {
          $_SESSION['1'] = "1234";
        }

      ?>
    </form>
    <p><?php echo $_SESSION['1'] ?></p>
  </body>
</html>
