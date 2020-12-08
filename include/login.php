<?php
session_start();
if(!isset($_POST['button'])){
  include_once 'defend.php';
}

$uid = $_POST['nameOf'];
$pwd = $_POST['pwd'];

if(empty($uid) || empty($pwd)){
  header("location: ../login.php?r=none");
  die();
}

include_once 'db-connect.php';

$res = $conn->query("SELECT * FROM `users` WHERE `email`='$uid'");
$count = $res->rowCount();
$dates = $res->fetch(PDO::FETCH_ASSOC);

if(password_verify($pwd, $dates['pwd'])){
  $_SESSION['id'] = $dates['id'];
  $_SESSION['email'] = $_POST['uid'];
  $_SESSION['name'] = $dates['name'];
  $_SESSION['role'] = $dates['role'];
  $_SESSION['auth'] = $dates['auth'];
  header("location: ../");
  die();
}
else {
  header("location: ../login.php");
  die();
}
$conn = null;
