<?php
  session_start();
  require 'rb.php';
  R::setup( 'mysql:host=localhost;dbname=forum', 'root', 'root' );
  $instList = R::findAll('institutions');
  $direction = R::findAll('direction');

?>
