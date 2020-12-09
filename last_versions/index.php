<?php
  require 'link/db.php';
  require 'test/testing.php';

  unset($_SESSION['auth']);
  unset($_SESSION['reg']);
  unset($_SESSION['status']);
  $_SESSION['url'] = 'index.php';

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
            <img class="header_logo" src="img/logo.png" alt="">
            <a class="header_name" href="#">КемГУ Форум</a>
            <div class="header_menu">
                <?php
                    if( isset($_SESSION['logged_user'])) : ?>
                <a class="username" href="profile.php">
                    <?php echo $_SESSION['username']; ?>
                </a>
                <a class="exit" href="/link/logout.php">Выход</a>
                    <?php else : ?>
                <p>
                    <a href="auth.php">Вход</a> | <a href="reg.php">Регистрация</a>
                </p>
                <?php endif; ?>
            </div>
        </header>
    <div class="menu">
        <a href="index.php">Главная</a>
            <a
                  href="#"> <?php if ($_SESSION['status'] > 0 and $_SESSION['status'] < 10) { echo $instList['1']['name'];} ?>
            </a>
    </div>
    <div class="institutions">
        <p>Выберите институт (или оффтоп)</p>
            <ul class="instList">
                <li> <a href="direction.php?inst=1"> <?php echo $instList['1']['name']; ?> </a> </li>
                <li> <a href="direction.php?inst=2"> <?php echo $instList['2']['name']; ?> </a> </li>
                <li> <a href="#"> <?php  ?> </a> </li>
            </ul>
    </div>
    <p>
        <?php dump($_SESSION['status']) ?>
    </p>
    </body>
</html>
