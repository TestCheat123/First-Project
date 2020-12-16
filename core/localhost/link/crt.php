<?php
  require 'db.php';
  $status = $_SESSION['status'];
  $name = $_POST['name'];
  $text = $_POST['text'];
  $username = $_SESSION['user']['username'];
  $file = array();
  $file['fileName'] = $_FILES['files']['name'];
  $file['fileSize'] = $_FILES['files']['size'];
  $file['fileTmp'] = $_FILES['files']['tmp_name'];
  $file['fileType'] = $_FILES['files']['type'];
  $file['fileExt'] = strtolower(end(explode('.',$_FILES['files']['name'] )));
  $file['expensions'] = array('jpg','JPG','jpeg','gif','bmp','png');

  if ( $file['fileSize'] > 167772160 ) {
    $_SESSION['message'] = 'Недопустимый размер файла, максимум 20 МБ';
    header('location: ../CreateTheme.php');
  }


  if (strlen($name) < 1 or strlen($name) > 50) {
    $_SESSION['message'] = "Название должно быть больше 0 и меньше 50 символов";
    header('Location: ../CreateTheme.php');
  }
  else {
    if (strlen($text) < 5 or strlen($text) > 5000) {
      $_SESSION['message'] = "Текст статьи должен содержать минимум 5 символов и максимум 5000";
      header('Location: ../CreateTheme.php');
    }
    else {
      if ( $file['fileSize'] > 167772160 ) {
        $_SESSION['message'] = 'Недопустимый размер файла, максимум 20 МБ';
        header('location: ../CreateTheme.php');
      } else {
          if (!in_array(substr(strrchr($file['fileName'], '.'), 1), $file['expensions'])) {
            $_SESSION['message'] = 'Не подходящий тип файла';
            header ('location: ../CreateTheme.php');
          } else {
            $folder = "../file" . "/" . time() . "_" . trim($name) . "/" ;
            mkdir($folder, 0777);
            $files = $folder . time() . "_" . basename($avatar['fileName']) . "." .$file['fileExt'];
            move_uploaded_file($_FILES['files']['tmp_name'],$files);

            $theme = R::dispense('theme');
            $theme->status = $status;
            $theme->name = $name;
            $theme->description = $text;
            $theme->username = $username;
            $theme->image = $files;
            R::store($theme);

            header('location: ../article.php');
          }

      }
    }
  }
?>
