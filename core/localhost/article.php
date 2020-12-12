<?php
  require 'link/db.php';
  require 'test/testing.php';
  if ($_SESSION['status'] < 110) {
    $_SESSION['status'] = $_SESSION['inst'] . $_SESSION['direction'] . $_GET['course'];
  }
  if ($_GET['course'] > 0) {
    $_SESSION['course'] = $_GET['course'];
  }

  $topics = R::findAll('theme', 'status = ?', [$_SESSION['status']]);

?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="adress">
      <a href="index.php">Главная</a>
      <a href="direction.php?inst=<?php echo $_SESSION['inst']; ?>"> <?php if ($_SESSION['inst'] > 0 && $_SESSION['inst'] < 15) { echo $instList[$_SESSION['inst']]['name'];} ?></a>
      <a href="section.php?direction=<?php echo $_SESSION['direction']; ?>"><?php if($_SESSION['direction'] >0 && $_SESSION['direction'] < 10) { echo $direction[$_SESSION['direction']]['name'];} ?></a>
      <a href="article.php?course=<?php echo $_GET['course']; ?>"><?php if($_SESSION['course'] > 0 && $_SESSION['course'] < 5) { echo $courses[$_SESSION['course']]['name']; } ?></a>
    </div>
    <div class="crTheme">
      <a href="CreateTheme.php">Создать статью</a>
    </div>

    <div class="main">
        <ul>
            <?php foreach ($topics as $theme): ?>
              <li>
                <p> <a href="theme.php?id=<?php echo $theme['id']; ?>"><?php echo $theme['name']; ?></a> </p>
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
