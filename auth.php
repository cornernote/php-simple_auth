<?php
include('db.php');
include('sess.php');

ini_set('session.cookie_path',dirname($_SERVER['SCRIPT_NAME']));

session_start();

if (!isset($allowed_groups)) {
  $allowed_groups = array(1);
}

if (!$_SESSION['user']['id']) {
  header('Location: login.php');
  exit;
}

if (!in_array($_SESSION['user']['group_id'],$allowed_groups)) {
  header('Location: forms2.php');
  exit;
}
?>