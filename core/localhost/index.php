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
        <a class="adress" href="index.php">Главная</a>
        <a href="#"> <?php if ($_SESSION['status'] > 0 and $_SESSION['status'] < 10) { echo $instList['1']['name']; }?></a>
           <div class="sections">
                <p>Выберите раздел</p>
                <hr>
                <a class="option" href="direction.php?inst=1"> <?php echo $instList['1']['name']; ?> </a>
                <a class="option" href="direction.php?inst=2"> <?php echo $instList['2']['name']; ?> </a>
                <a class="option" href="direction.php?inst=3"> <?php echo $instList['3']['name']; ?> </a>
                <a class="option" href="direction.php?inst=4"> <?php echo $instList['4']['name']; ?> </a>
                <a class="option" href="direction.php?inst=5"> <?php echo $instList['5']['name']; ?> </a>
                <a class="option" href="direction.php?inst=6"> <?php echo $instList['6']['name']; ?> </a>
                <a class="option" href="direction.php?inst=7"> <?php echo $instList['7']['name']; ?> </a>
                <a class="option" href="direction.php?inst=8"> <?php echo $instList['8']['name']; ?> </a>
                <a class="option" href="direction.php?inst=9"> <?php echo $instList['9']['name']; ?> </a>
                <a class="option" href="direction.php?inst=10"> <?php echo $instList['10']['name']; ?> </a>
                <a class="option" href="direction.php?inst=11"> <?php echo $instList['11']['name']; ?> </a>
                <a class="option" href="direction.php?inst=12"> <?php echo $instList['12']['name']; ?> </a>
                <a class="option" href="direction.php?inst=13"> <?php echo $instList['13']['name']; ?> </a>
                <a class="option" href="direction.php?inst=14"> <?php echo $instList['14']['name']; ?> </a>
           </div>
        <p> <?php dump($_SESSION['status']) ?> </p>
    </body>
</html>
