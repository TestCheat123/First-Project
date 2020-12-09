<?php
  require 'link/db.php';
  require 'test/testing.php';
  if ($_SESSION['status'] < 110) {
    $_SESSION['status'] = $_SESSION['inst'] . $_SESSION['direction'] . $_GET['course'];
  }

  $topics = R::findAll('theme');
?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="crTheme">
      <a href="CreateTheme.php">Создать статью</a>
    </div>

    <div class="main">
        <ul>
          <?php $topics = R::findAll('theme', 'status = ?', [$_SESSION['status']]) ?>
            <?php foreach ($topics as $theme): ?>
              <li>
                <p> <a href="theme.php"><?php echo $theme['name']; ?></a> </p>
                <p> <?php echo $theme['description']; ?> </p>
                <p>  </p>
              </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="test">
      <p><?php dump($_GET) ?></p>
      <p><?php dump($_SESSION) ?></p>
    </div>

  </body>
</html>
