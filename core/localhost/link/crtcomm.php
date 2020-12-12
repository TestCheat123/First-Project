<?php
  require 'db.php';
  $text = $_POST['text'];
  $username = $_SESSION['username'];
  $theme = $_SESSION['id'];
  if (strlen($text) <1) {
    header ('location: ../theme.php');
    $_SESSION['massege'] = 'Ошибка';
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
