<?php
  require 'link/db.php';
  require 'test/testing.php';
  if ($_SESSION['status'] < 110) {
    $_SESSION['status'] = $_SESSION['inst'] . $_SESSION['direction'] . $_GET['course'];
  }

  $topics = R::findAll('theme');
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
        <a class="adress" href="index.php">Главная</a>
    <div class="crTheme">
      <a href="CreateTheme.php">Создать статью</a>
    </div>

    <div class="main">
        <ul>
          <?php $topics = R::findAll('theme', 'status = ?', [$_SESSION['status']]) ?>
            <?php foreach ($topics as $theme): ?>
              <li>
                <p> <a href="theme.php"><?php echo $theme['name']; ?></a> </p>
                <p> <?php echo $theme['description']; ?> </p>
                <p>  </p>
              </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="test">
      <p><?php dump($_GET) ?></p>
      <p><?php dump($_SESSION) ?></p>
    </div>

  </body>
</html>
