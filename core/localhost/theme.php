<?php
  require 'link/db.php';
  require 'test/testing.php';
  if ($_GET['id'] > 0) {
    $_SESSION['id'] = $_GET['id'];
  }
  $theme = R::findOne('theme', 'id = ?', [$_SESSION['id']]);
  $comms = R::findAll('comms', 'idtheme = ?', [$_SESSION['id']]);
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
        <a href="article.php?course=<?php echo $_SESSION['course']; ?>"> > <?php if($_SESSION['course'] > 0 && $_SESSION['course'] < 5) { echo $courses[$_SESSION['course']]['name']; } ?></a>
    </div>
    <div class="theme">
        <div class="usernametheme">  <?php echo $theme['username']; ?> </div>
        <div class="nameTheme"> <?php echo $theme['name'] ?></div>
        <div class="desTheme"> <?php echo $theme['description']; ?> </div>
        <div class="files"> <img src="<?php echo $theme['image']; ?>" alt=""> </div>
    </div>
    <div class="comms">

          <?php foreach ($comms as $comm): ?>
              <div class="comments">
                  <div class="usernametheme"> <?php echo $comm['username'] ?> </div>
                  <div class="desTheme"> <?php echo $comm['text'] ?> </div>
                  <div class=""> <img src="<?php echo $comm['image']; ?>" alt=""></div>
              </div>
          <?php endforeach; ?>

                <div class="comm_add">
            <form class="formcomm" action="link/crtcomm.php?id=<?php echo $_SESSION['id']; ?>" method="post" enctype="multipart/form-data">
            <input class="input_comm" type="text" name="text" value="">
            <input type="file" name="filescomm" value="">
            <button class="bottom_kom" type="submit" name="button">Добавить комментарий</button>
            </form>
        </div>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
        <?php //dump($_FILES['filetheme']) ?>
      </div>
    </div>
  </body>
</html>
