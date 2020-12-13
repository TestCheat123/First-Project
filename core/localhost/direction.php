<?php
  require 'link/db.php';
  require 'test/testing.php';

  $direction = R::findAll('direction', 'status = ?', [$_GET['inst']]);
  $_SESSION['inst'] = $_GET['inst'];
  $_SESSION['status'] = $_GET['inst'];
?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
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
    <div class="adress">
      <a href="index.php">Главная</a>
      <a href="direction.php?inst=<?php echo $_SESSION['inst']; ?>"> > <?php if ($_SESSION['inst'] > 0 && $_SESSION['inst'] < 15) { echo $instList[$_SESSION['inst']]['name'];} ?></a>
    </div>
    <?php if ( $_SESSION['status'] == $_GET['inst'] ) :  ?>
      <div class="direction">
          <ul>
            <?php foreach ($direction as $dir): ?>
              <li> <a href="section.php?direction=<?php echo $dir['id']; ?>"><?php echo $dir['name']; ?></a> </li>
            <?php endforeach; ?>
          </ul>
        </div>
    <?php  endif; ?>

  <?php if ( $_SESSION['status'] == 14 ) : ?>
    <div class="OFFTOP">
      <p><?php echo "12345566787"; ?></p>
    </div>
  <?php endif; ?>

    <div class="test">
      <p><?php //dump($direction); ?></p>
      <p><?php //dump($_SESSION); ?></p>
    </div>
  </body>
</html>
