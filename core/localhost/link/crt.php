<?php
  require 'db.php';
  $status = $_SESSION['status'];
  $name = $_POST['name'];
  $text = $_POST['text'];
  $username = $_SESSION['user']['username'];


  if (strlen($name) < 1 or strlen($name) > 100) {
    $_SESSION['message'] = "Название должно быть больше 0 и меньше 100 символов";
    header('Location: ../CreateTheme.php');
  }
  else {
    if (strlen($text) < 5 or strlen($text) > 5000) {
      $_SESSION['message'] = "Текст статьи должен содержать минимум 5 символов и максимум 5000";
      header('Location: ../CreateTheme.php');
    }
    else {
      $theme = R::dispense('theme');
      $theme->status = $status;
      $theme->name = $name;
      $theme->description = $text;
      $theme->username = $username;
      R::store($theme);

      header('location: ../article.php');
    }
  }
?>
