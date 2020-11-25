<?php
  require 'link/db.php';
  require 'test/testing.php';

  $courses = R::loadAll('courses', array(1,2,3,4));
  if ( $_GET['inst'] == 1 ) {
    $_SESSION['inst'] = 1;
  }
  if ( $_GET['inst'] == 2 ) {
    $_SESSION['inst'] = 2;
  }
?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>КемГУ Форум</title>
  </head>
  <body>
    <?php if ( $_GET['inst'] == 1 ) :  ?>
    <div class="IFN">
      <ul>
        <li> <a href="theme.php?course=1"> <?php echo $courses['1']['name']; ?> </a> </li>
        <li> <a href="theme.php?course=2"> <?php echo $courses['2']['name']; ?> </a> </li>
        <li> <a href="theme.php?course=3"> <?php echo $courses['3']['name']; ?> </a> </li>
        <li> <a href="theme.php?course=4"> <?php echo $courses['4']['name']; ?> </a> </li>
      </ul>
    </div>
    <?php  endif; ?>
    <?php if ( $_GET['inst'] == 2 ) : ?>
    <div class="OFFTOP">
      <p><?php echo "12345566787"; ?></p>
      <p><?php ?></p>
    </div>
    <?php endif; ?>

<div class="test">
  <p><?php dump($_GET) ?></p>
  <p><?php dump($_SESSION); ?></p>
</div>
  </body>
</html>
