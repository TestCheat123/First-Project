<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="registr" action="link/sign_up.php" method="post">
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
