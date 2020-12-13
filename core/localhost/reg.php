<?php
  session_start();
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
    <form class="registr" action="link/sign_up.php" method="post" enctype="multipart/form-data">
        <p>Введите свой логин</p>
        <input type="text" name="login" placeholder="логин" value="<?php echo @$_SESSION['reg']['login'];?>">
        <p>Введите имя пользователя</p>
        <input type="text" name="username" placeholder="имя пользователя" value="<?php echo @$_SESSION['reg']['username'];?>">
        <p>Введите свой email</p>
        <input type="email" name="email" placeholder="email" value="<?php echo @$_SESSION['reg']['email'];?>">
        <p>Введите свой пароль</p>
        <input type="password" name="password" placeholder="пароль">
        <p>Для подтверждения пароля, введите его еще раз</p>
        <input type="password" name="password_2" placeholder="подтверждение пароля">
      <!--  <p>Добавьте свой автар (Не обязательно)</p>
            <input type="file" name="avatar">--><br>
        <input type="checkbox" name="forumRule" value="1"><span>нажимая на кнопку Зарегистрироваться, я соглашаюсь с </span><a href="#">Правила пользования форума</a>
        <p><button type="submit" name="do_signup">Зарегистрироваться</button></p>
        <p>У вас уже есть аккаунт? - <a href="auth.php">авторизируйтесь!</a> </p>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>
  </body>
</html>
