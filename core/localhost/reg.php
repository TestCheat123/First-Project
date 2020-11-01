<?php
  require 'db.php';
?>

<form class="" action="/reg.php" method="POST">
    <p>Введите свой логин</p>
    <input type="text" name="username" value="">
    <p>Введите свой email</p>
    <input type="email" name="email" value="">
    <p>Введите свой пароль</p>
    <input type="password" name="password" value="">
    <p>Введите свой пароль еще раз</p>
    <input type="password" name="password_2" value="">
    <p><button type="submit" name="registr">Зарегистрироваться</button></p>
</form>
