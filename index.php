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
        <a id="main" href="index.php">Главная</a>
            <a
                  href="#"> <?php if ($_SESSION['status'] > 0 and $_SESSION['status'] < 10) { echo $instList['1']['name'];} ?>
            </a>
           <div class="sections">
                <p>Выберите раздел</p>
                <hr>
                    <div class="option">
                        <a href="direction.php?inst=1"> <?php echo $instList['1']['name']; ?> </a>
                    </div>
                    <div class="option">
                          <a href="direction.php?inst=2"> <?php echo $instList['2']['name']; ?> </a>
                    </div>
                                        <div class="option">
                          <a href="direction.php?inst=3"> <?php echo $instList['3']['name']; ?> </a>
                    </div>
                                        <div class="option">
                          <a href="direction.php?inst=4"> <?php echo $instList['4']['name']; ?> </a>
                    </div>
                                        <div class="option">
                          <a href="direction.php?inst=5"> <?php echo $instList['5']['name']; ?> </a>
                    </div>
                                        <div class="option">
                          <a href="direction.php?inst=6"> <?php echo $instList['6']['name']; ?> </a>
                    </div>
                                        <div class="option">
                          <a href="direction.php?inst=7"> <?php echo $instList['7']['name']; ?> </a>
                    </div>
                                        <div class="option">
                          <a href="direction.php?inst=8"> <?php echo $instList['8']['name']; ?> </a>
                    </div>
                                        <div class="option">
                          <a href="direction.php?inst=9"> <?php echo $instList['9']['name']; ?> </a>
                    </div>
                                        <div class="option">
                          <a href="direction.php?inst=10"> <?php echo $instList['10']['name']; ?> </a>
                    </div>
                                   <div class="option">
                          <a href="direction.php?inst=11"> <?php echo $instList['11']['name']; ?> </a>
                    </div>
                                        <div class="option">
                          <a href="direction.php?inst=12"> <?php echo $instList['12']['name']; ?> </a>
                    </div>                    <div class="option">
                          <a href="direction.php?inst=13"> <?php echo $instList['13']['name']; ?> </a>
                    </div>
                    <div class="option">
                          <a href="direction.php?inst=14"> <?php echo $instList['14']['name']; ?> </a>
                    </div>

           </div>
    <p>
        <?php dump($_SESSION['status']) ?>
    </p>
    </body>
</html>
