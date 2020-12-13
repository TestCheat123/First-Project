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
                    <a class="exit" href="/link/logout.php">Выход</a>
                    <a class="username" href="profile.php"> <?php echo $_SESSION['username']; ?> </a>
                    <?php else : ?>
                    <a class="reg" href="reg.php">Регистрация</a>
                    <a class="auth" href="auth.php">Вход</a>
                    <?php endif; ?>
                </div>
        </header>
        <a id="main" href="index.php">Главная </a>
    <?php if (isset($_SESSION['logged_user'])): ?>
      <form action="link/crt.php" method="post">
          <label for="name">Название статьи</label><br>
          <input type="text" name="name" id="name" value="<?= $_POST['name'] ?? '' ?>" size="50"><br>
          <br>
          <label for="text">Текст статьи</label><br>
          <textarea name="text" id="text" rows="10" cols="80"><?= $_POST['text'] ?? '' ?></textarea><br>
          <br>
          <input type="submit" value="Создать">
      </form>
      <?php
          if ($_SESSION['message']) {
              echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
          }
          unset($_SESSION['message']);
      ?>
    <?php else: ?>
      <p>Вы не имеете доступ к этой части</p>
      <p> <a href="auth.php">Авторизируйтесь!</a> </p>
    <?php endif; ?>

    <p><?php dump($_SESSION['status']) ?></p>
    </div>
  </body>
</html>
