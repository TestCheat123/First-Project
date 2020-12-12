<?php
  session_start();
  require 'rb.php';
  R::setup( 'mysql:host=localhost;dbname=forum', 'root', 'root' );
  $instList = R::findAll('institutions');
  $direction = R::findAll('direction');
  $courses = R::loadAll('courses', array(1,2,3,4));
?>
