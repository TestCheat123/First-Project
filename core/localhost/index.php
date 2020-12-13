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
  </head>
  <body>
    <header>
      <a class="name" href="index.php"><img class="imglogo" src="img/logo.png" alt="">КемГУ Форум</a>
      <div class="menu">
        <?php
          if( isset($_SESSION['logged_user'])) : ?>
        <p class="username">
          <?php
            echo $_SESSION['user']['username'];
          ?>
        </p>
        <a href="/link/logout.php">exit</a>
      <?php else : ?>
        <p><a href="auth.php">Вход</a> | <a href="reg.php">Регистрация</a></p>
      <?php endif; ?>
      </div>
    </header>
    <div class="adress">
      <a href="index.php">Главная</a> <a href="#"> <?php if ($_SESSION['status'] > 0 and $_SESSION['status'] < 15) { echo $instList['1']['name'];} ?></a>
    </div>
    <div class="institutions">
      <p>Выберите институт (или оффтоп)</p>
      <ul class="instList">
        <?php foreach ($instList as $insts): ?>
          <li> <a href="direction.php?inst=<?php echo $insts['id']; ?>"> <?php echo $insts['name']; ?> </a> </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <p><?php echo $_SESSION['user']['avatar']; ?></p>
    <img src="<?php echo $_SESSION['user']['avatar'] ?>" alt="">
  </body>
</html>
