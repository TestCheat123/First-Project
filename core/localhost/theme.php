<?php
  require 'link/db.php';
  require 'test/testing.php';
  if ($_GET['id'] > 0) {
    $_SESSION['id'] = $_GET['id'];
  }
  $theme = R::findOne('theme', 'id = ?', [$_SESSION['id']]);
  $comms = R::findAll('comms', 'idtheme = ?', [$_SESSION['id']],)

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
      <a href="article.php?course=<?php echo $_SESSION['course']; ?>"><?php if($_SESSION['course'] > 0 && $_SESSION['course'] < 5) { echo $courses[$_SESSION['course']]['name']; } ?></a>
    </div>
    <div class="theme">
      <div class="usernametheme">
        <p><?php echo $theme['username']; ?></p>
      </div>
      <div class="nameTheme">
        <p><?php echo $theme['name'] ?></p>
      </div>
      <div class="desTheme">
        <p><?php echo $theme['description']; ?></p>
      </div>
    </div>
    <div class="comms">
      <div class="crtcomm">
        <form class="formcomm" action="link/crtcomm.php?id=<?php echo $_SESSION['id']; ?>" method="post">
          <input type="text" name="text" value="">
          <button type="submit" name="button">Добавить комментарий</button>
        </form>
        <div class="comm">
          <?php foreach ($comms as $comm): ?>
            <ul>
              <li>
                <p><?php echo $comm['username'] ?></p>
                <p><?php echo $comm['text'] ?></p>
              </li>
            </ul>
          <?php endforeach; ?>
        </div>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
        <?php dump($_SESSION['username']) ?>
      </div>
    </div>
  </body>
</html>
