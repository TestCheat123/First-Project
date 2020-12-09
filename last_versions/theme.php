<?php
  require 'link/db.php';
  require 'test/testing.php';
  for ($i=0; $i <= 2 ; $i++) {
    if ( $_SESSION['status'] == $i ) {
      $status = $_SESSION['status'];
    }
  }
  for ($i=0; $i <= 4; $i++) {
    if ( $_GET['course'] == $i ) {
      $status = $status . $_GET['course'];
    }
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
    <div class="main">
      <?php if ($status == 11): ?>
        <ul>
          <?php $topics = R::findAll('theme', 'status = ?', [$status]) ?>
            <?php foreach ($topics as $theme): ?>
              <li>
                <p> <?php echo $theme['name']; ?> </p>
                <p> <?php echo $theme['description']; ?> </p>
                <p>  </p>
              </li>
            <?php endforeach; ?>
        </ul>
      <?php endif; ?>
      <?php if ($status == 12): ?>
        <ul>
          <?php $topics = R::find('theme', 'status = ?', [$status]) ?>
          <?php foreach ($topics as $theme): ?>
            <li>
              <p> <?php echo $theme['name']; ?> </p>
              <p> <?php echo $theme['description']; ?> </p>
              <p>  </p>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>
    <div class="test">
      <p><?php echo $status; ?></p>
      <p><?php dump($_GET) ?></p>
      <p><?php dump($_SESSION) ?></p>
    </div>
  </body>
</html>
