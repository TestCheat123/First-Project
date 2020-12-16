<?php
  require 'link/db.php';
  require 'test/testing.php';
  $_SESSION['url'] = 'CreateTheme.php';
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
          <a href="article.php?course=<?php echo $_SESSION['course']; ?>"> > <?php if($_SESSION['course'] > 0 && $_SESSION['course'] < 5) { echo $courses[$_SESSION['course']]['name']; } ?></a>
        </div>
         <div class="sections">
                <p>Создание статьи</p>
                <hr>
                <div class="auth_reg">
                   <?php if (isset($_SESSION['logged_user'])): ?>
                   <div class="log_pass"> <p> Названия статьи </p> <p> Текст статьи </p> </div>
                    <form action="link/crt.php" method="post">
                    <input class="input_name_them" type="text" name="name" id="name" value="<?= $_POST['name'] ?? '' ?>" size="50"><br>
                    <br>
                    <textarea class="input_text" name="text" id="text" rows="10" cols="80"><?= $_POST['text'] ?? '' ?></textarea>
                    <br>
                    <div class="auht_footer">
                    <input class="bottom_gen" type="submit" value="Создать">
                    </div>
                    </form>
                    <?php if ($_SESSION['message']) { echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>'; } unset($_SESSION['message']); ?>
                </div>
        </div>
        <?php if ($_SESSION['message']) { echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>'; } unset($_SESSION['message']);?>
        <?php else: ?>
        <div id="fixed"> Вы не имеете доступ к этой части
        <br><br>
        <a id="underline" href="auth.php">Авторизируйтесь!</a> </div>
        <?php endif; ?>

    <p><?php //dump($_SESSION['username']) ?></p>
    </div>
  </body>
</html>
