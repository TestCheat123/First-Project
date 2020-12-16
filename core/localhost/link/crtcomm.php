<?php
  require 'db.php';
  $text = $_POST['text'];
  $username = $_SESSION['user']['username'];
  $theme = $_SESSION['id'];
  $file['fileName'] = $_FILES['filescomm']['name'];
  $file['fileSize'] = $_FILES['filescomm']['size'];
  $file['fileTmp'] = $_FILES['filescomm']['tmp_name'];
  $file['fileType'] = $_FILES['filescomm']['type'];
  $file['fileExt'] = strtolower(end(explode('.',$_FILES['filescomm']['name'] )));
  $file['expensions'] = array('jpg','JPG','jpeg','gif','bmp','png');

  if (strlen($text) <1) {
    $_SESSION['massege'] = 'Ошибка';
    header ('location: ../theme.php');
  }
  else {
      if ( $file['fileSize'] > 167772160 ) {
        $_SESSION['message'] = 'Недопустимый размер файла, максимум 20 МБ';
        header('location: ../Theme.php');
      } else {
          if (!in_array(substr(strrchr($file['fileName'], '.'), 1), $file['expensions'])) {
            $_SESSION['message'] = 'Не подходящий тип файла';
            header ('location: ../Theme.php');
            } else {
              $folder = "../file" . "/" . time() . "_" . trim($name) . "/" ;
              mkdir($folder, 0777);
              $files = $folder . time() . "_" . basename($avatar['fileName']) . "." .$file['fileExt'];
              move_uploaded_file($_FILES['filescomm']['tmp_name'],$files);
            }
          }
      $comm = R::dispense('comms');

      $comm->username = $username;
      $comm->text = $text;
      $comm->idtheme = $theme;
      $comm->image = $files;

      R::store($comm);

      header ('location: ../theme.php');
    }



?>
