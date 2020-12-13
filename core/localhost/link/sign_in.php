<?php
  session_start();

  require_once 'db.php';
  $login = $_POST['login'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $url = $_SESSION['url'];
  $_SESSION['auth']['login'] = $login;

  $errors = array();
  $user = R::findOne('users', 'login = ?', array($login));
  if( $user ) {
    if( password_verify($password, $user->password) ) {
      $_SESSION['logged_user'] = $user;
      $_SESSION['user']['username'] = $user->username;
      $_SESSION['user']['avatar'] = $user->avatar;
      unset($_SESSION['auth']['login']);
      header("Location: /$url");
    }
    else {
      $_SESSION['message'] = 'Пароль ввеsдён неверно';
      header ('location: ../auth.php');
    }
  }
  else {
    $_SESSION['message'] = 'Логин введён неверно';
    header ('location: ../auth.php');  }
?>
