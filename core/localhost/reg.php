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
                </div>
        </header>
        <div class="adress">
          <a href="index.php">Главная</a>
          <a href="direction.php?inst=<?php echo $_SESSION['inst']; ?>"> <?php if ($_SESSION['inst'] > 0 && $_SESSION['inst'] < 15) { echo $instList[$_SESSION['inst']]['name'];} ?></a>
          <a href="section.php?direction=<?php echo $_SESSION['direction']; ?>"><?php if($_SESSION['direction'] >0 && $_SESSION['direction'] < 10) { echo $direction[$_SESSION['direction']]['name'];} ?></a>
          <a href="article.php?course=<?php echo $_SESSION['course']; ?>"><?php if($_SESSION['course'] > 0 && $_SESSION['course'] < 5) { echo $courses[$_SESSION['course']]['name']; } ?></a>
        </div>
        <h1 id="auth_reg">Регистрация</h1>
        <div class="auth_reg">
            <div class="log_pass"> <p> Логин </p> <p> Имя </p> <p>email</p> <p>Пароль</p> <p>Повторите пароль</p> <p>Аватар</p></div>
        <form class="form_input" action="link/sign_up.php" method="post" enctype="multipart/form-data">
            <input class="input_login" type="text" name="login" placeholder="login" value="<?php echo @$_SESSION['reg']['login'];?>">
            <br>
            <br><input class="input_name" type="text" name="username" placeholder="name" value="<?php echo @$_SESSION['reg']['username'];?>">
            <br>
            <input class="input_email" type="email" name="email" placeholder="email" value="<?php echo @$_SESSION['reg']['email'];?>">
            <br>
            <input class="input_pass2" type="password" name="password" placeholder="pass">
            <br>
            <input class="input_pass3" type="password" name="password_2" placeholder="pass confirm">
            <br>
            <input class="form_file" type="file" name="avatar">
            <br>
            <?php if ($_SESSION['message']) { echo '<div class="msg"> ' . $_SESSION['message'] . ' </div>';} unset($_SESSION['message']);?>
        </div>
        <div class="auht_footer">
                <input class="form_input" type="checkbox" name="forumRule" value="1">
                <span> Нажимая на кнопку "Зарегистрироваться" я соглашаюсь с </span><a id="underline" href="#">правилами пользования форума</a>
                <br><br>
                <button class="bottom_auth"type="submit" name="do_signup">Зарегистрироваться</button>
                <br><br>
                <a id="underline" href="auth.php">У вас уже есть аккаунт? - Авторизируйтесь!</a>
        </div>
        </form>
  </body>
</html>
