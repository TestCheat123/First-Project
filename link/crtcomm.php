<?php
  require 'db.php';
  $text = $_POST['text'];
  $username = $_SESSION['user']['username'];
  $theme = $_SESSION['id'];
  if (strlen($text) <1) {
    $_SESSION['massege'] = 'Ошибка';
    header ('location: ../theme.php');
  }
  else {
      $comm = R::dispense('comms');

      $comm->username = $username;
      $comm->text = $text;
      $comm->idtheme = $theme;

      R::store($comm);
      header ('location: ../theme.php');

  }

?>
