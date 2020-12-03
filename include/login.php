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
// $pwd = password_hash($pwd, PASSWORD_DEFAULT );
$sql = "SELECT * FROM `users` WHERE `email`='$uid'";

$res = $conn->query($sql);
$count = $res->rowCount();
$dates = $res->fetch(PDO::FETCH_ASSOC);

if(!empty($count) && password_verify($pwd, $dates['pwd'])){
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
