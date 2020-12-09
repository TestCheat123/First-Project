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
    <form class="registr" action="link/sign_in.php" method="post">
        <p>Введите свой логин</p>
        <input type="text" name="login" placeholder="логин" value="<?php echo @$_SESSION['auth']['login'];?>">
        <p>Введите свой пароль</p>
        <input type="password" name="password" placeholder="пароль">
        <p><button type="submit" name="do_login">Вход</button></p>
        <p>У вас еще нет аккаунта? - <a href="reg.php">зарегистрируйтесь</a> </p>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>
  </body>
</html>
