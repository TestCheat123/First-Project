<?php
  require 'link/db.php';
  require 'test/testing.php';
  if ($_SESSION['status'] < 110) {
    $_SESSION['status'] = $_SESSION['inst'] . $_SESSION['direction'] . $_GET['course'];
  }
  if ($_GET['course'] > 0) {
    $_SESSION['course'] = $_GET['course'];
  }

  $topics = R::findAll('theme', 'status = ?', [$_SESSION['status']]);

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
                    <img class="ava" src="<?php echo $_SESSION['user']['avatar'] ?>" alt="">
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
          <a href="section.php?direction=<?php echo $_SESSION['direction']; ?>"> > <?php if($_SESSION['direction'] >0 && $_SESSION['direction'] < 10) { echo $direction[$_SESSION['direction']]['name'];} ?></a>
          <a href="article.php?course=<?php echo $_GET['course']; ?>"> > <?php if($_SESSION['course'] > 0 && $_SESSION['course'] < 5) { echo $courses[$_SESSION['course']]['name']; } ?></a>
        </div>
        <div class="Them">
            <a class="crTheme" href="CreateTheme.php">Создать статью!</a><br></br>
                    <?php foreach ($topics as $theme): ?> <div class="contentThem">
                    <h2> <a href="theme.php?id=<?php echo $theme['id']; ?>"><?php echo $theme['name']; ?></a></h2>
                    <a class="author" href="profile.php">Автор: <?php echo $theme['username'] ?> </a>
                    <div class="theme_text"> <?php echo $theme['description']; ?> </div> </div> <?php endforeach; ?>

        </div>

    <div class="test">
      <p><?php //dump($_GET) ?></p>
      <p><?php //dump($_SESSION) ?></p>
    </div>

  </body>
</html>
