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
                    <img class="ava" src="<?php echo $_SESSION['user']['avatar'] ?>" alt="">
                    <a class="exit" href="/link/logout.php">Выход</a>
                    <a class="username" href="profile.php"> <?php echo $_SESSION['user']['username']; ?> </a>
                    <?php else : ?>
                    <a class="reg" href="reg.php">Регистрация</a>
                    <a class="auth" href="auth.php">Вход</a>
                    <?php endif; ?>

        </header>
        <div class="adress"><a href="index.php">Главная</a></div>
            <h1 id="auth_reg">Авторизация</h1>
               <div class="auth_reg">
                   <div class="log_pass"> <p> Логин </p> <p> Пароль </p> </div>
                <form class="form_input" action="link/sign_in.php" method="post">
                    <input class="input_login" type="text" name="login" placeholder="login" value="<?php echo @$_SESSION['auth']['login'];?>">
                    <br>
                    <input class="input_pass" type="password" name="password" placeholder="pass">
                    <?php if ($_SESSION['message']) { echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>'; } unset($_SESSION['message']); ?>
                </div>
                <div class="auht_footer">
                    <button id="bottom_auth"type="submit" name="do_login">Войти</button>
                    <br><br>
                    <a id="underline" href="reg.php">У вас еще нет аккаунта? - Зарегистрируйте!</a>
                </div>
                </form>
  </body>
</html>
