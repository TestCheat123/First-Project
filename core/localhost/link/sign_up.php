<?php
  session_start();

  require_once 'db.php';
  $login = $_POST['login'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password_2 = $_POST['password_2'];

  $_SESSION['reg']['login'] = $login;
  $_SESSION['reg']['username'] = $username;
  $_SESSION['reg']['email'] = $email;

  if ( trim($login) == '' ) {
    $_SESSION['message'] = 'Логин введенн неверно';
    header ('location: ../reg.php');
  }
  else {
    if( R::count('users', "login = ?", array($login) ) > 0 ) {
      $_SESSION['message'] = 'Пользователь с таким Логином уже существует';
      header ('location: ../reg.php');
    }
      else{
        if ( trim($username) == '' ) {
          $_SESSION['message'] = 'Имя пользователя введено неверно';
          header ('location: ../reg.php');
        }
        else {
          if( R::count('users', "email = ?", array($email) ) > 0 ) {
            $_SESSION['message'] = 'Пользователь с таким Email уже существует';
            header ('location: ../reg.php');
          }
          else {
            if ( trim($email) == '' ) {
              $_SESSION['message'] = 'Email введён неверно';
              header ('location: ../reg.php');
            }
            else {
              if ( trim($password) == '' ) {
                $_SESSION['message'] = 'Пароль введён неверно';
                header ('location: ../reg.php');
              }
              else{
                if ( $password == $password_2 ) {

                  //Регистрация

                  $user = R::dispense('users');
                  $user->login = $login;
                  $user->username = $username;
                  $user->email = $email;
                  $user->password = password_hash($password, PASSWORD_DEFAULT);
                  R::store($user);
                  header('location: ../index.php');
                }
              else{
                $_SESSION['message'] = 'Пароли не совпадают';
                header ('location: ../reg.php');
                }
              }
            }
          }
        }
      }
    }
?>
