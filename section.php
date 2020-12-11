<?php
  require 'link/db.php';
  require 'test/testing.php';

  $courses = R::loadAll('courses', array(1,2,3,4));

  $_SESSION['direction'] = $_GET['direction'];
  $_SESSION['status'] = $_SESSION['inst'] . $_GET['direction'];
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
                    <a class="username" href="profile.php"> <?php echo $_SESSION['username']; ?> </a>
                    <?php else : ?>
                    <a class="reg" href="reg.php">Регистрация</a>
                    <a class="auth" href="auth.php">Вход</a>
                    <?php endif; ?>
                </div>
        </header>
    <div class="adress">
      <a id="main" href="index.php">Главная </a>
      <a href="direction.php?inst=<?php echo $_SESSION['inst']; ?>"> > <?php if ($_SESSION['inst'] > 0 && $_SESSION['inst'] < 10) { echo $instList[$_SESSION['inst']]['name'];} ?></a>
      <a href="section.php?direction=<?php echo $_SESSION['direction']; ?>"> > <?php if($_SESSION['direction'] >0 && $_SESSION['direction'] < 10) { echo $direction[$_SESSION['direction']]['name'];} ?></a>
    </div>
    <div class="IFN">
      <ul>
        <li> <a href="article.php?course=1"> <?php echo $courses['1']['name']; ?> </a> </li>
        <li> <a href="article.php?course=2"> <?php echo $courses['2']['name']; ?> </a> </li>
        <li> <a href="article.php?course=3"> <?php echo $courses['3']['name']; ?> </a> </li>
        <li> <a href="article.php?course=4"> <?php echo $courses['4']['name']; ?> </a> </li>
      </ul>
    </div>
<div class="test">
  <p><?php dump($_GET); ?></p>
  <p><?php dump($_SESSION); ?></p>
</div>
  </body>
</html>
