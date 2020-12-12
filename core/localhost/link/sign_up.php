<?php
  session_start();

  require_once 'db.php';
  $login = $_POST['login'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password_2 = $_POST['password_2'];
  $checkRule = $_POST['forumRule'];
  /*$avatar = array();
  $avatar['fileName'] = $_FILES['avatar']['name'];
  $avatar['fileSize'] = $_FILES['avatar']['size'];
  $avatar['fileTmp'] = $_FILES['avatar']['tmp_name'];
  $avatar['fileType'] = $_FILES['avatar']['type'];
  $avatar['fileExt'] = strtolower(end(explode('.',$_FILES['avatar']['name'] )));
  $avatar['expensions'] = array('.jpg','.JPG','.jpeg','.gif','.bmp','.png');*/
  $_SESSION['reg']['login'] = $login;
  $_SESSION['reg']['username'] = $username;
  $_SESSION['reg']['email'] = $email;

  if( !preg_match("/^[a-zA-Z0-9]+$/",$login) ) {
    $_SESSION['message'] = 'Логин введенн неверно 22';
    header ('location: ../reg.php');
  }
  else {
    if ( strlen($login) < 3 or strlen($login) > 30 ) {
      $_SESSION['message'] = 'Логин введенн неверно 11';
      header ('location: ../reg.php');
    }
    else {
      if( R::count('users', "login = ?", array($login) ) > 0 ) {
        $_SESSION['message'] = 'Пользователь с таким Логином уже существует';
        header ('location: ../reg.php');
      }
        else{
          if ( !preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/",$username) ) {
            $_SESSION['message'] = 'Имя пользователя введено неверно 11';
            header ('location: ../reg.php');
          }
          else {
            if ( strlen($username) < 3 or strlen($username) > 30 ) {
              $_SESSION['message'] = 'Имя пользователя введено неверно 22';
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
                  if ( !preg_match("/^[a-zA-Z0-9]+$/",$password) ) {
                    $_SESSION['message'] = 'Пароль введён неверно 11';
                    header ('location: ../reg.php');
                  }
                  else {
                    if ( strlen($password) < 3 or strlen($password) > 50 ) {
                      $_SESSION['message'] = 'Пароль введён неверно 22';
                      header ('location: ../reg.php');
                    }
                    else {
                      if ( $password != $password_2 ) {
                        $_SESSION['message'] = 'Пароли не совпадают';
                        header ('location: ../reg.php');
                      }
                      else{
                        if ( $checkRule != '' ) {

                          //Регистрация
                          //move_uploaded_file($avatar['fileTmp'], "../avatars/full" . $avatar['fileName']);
                          $user = R::dispense('users');
                          $user->login = $login;
                          $user->username = $username;
                          $user->email = $email;
                          $user->password = password_hash($password, PASSWORD_DEFAULT);

                          R::store($user);
                          unset($_SESSION['reg']['login']);
                          unset($_SESSION['reg']['username']);
                          unset($_SESSION['reg']['email']);
                          header('location: ../index.php');
                        }
                        else{
                          $_SESSION['message'] = 'Подтвердите согласие с правилами пользования форумом';
                          header ('location: ../reg.php');
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
?>
