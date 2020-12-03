<?php
session_start();
if(!isset($_POST['button'])){
  include_once 'defend.php';
}

$name = $_POST['nameOf'];
$pwd = $_POST['pwd'];
$pwdr = $_POST['pwd-r'];
$role = $_POST['role'];
$email = $_POST['email'];

// $backto = "";
// $goback = false;

if(empty($name) || empty($pwd) || empty($pwdr) || empty($role) || empty($email)){
  $backto = "location: ../register.php?nameOf=".$name."&email=".$email."&r=empty";
}

if($role == "teacher"){
  $role = 2;
}elseif($role == "student"){
  $role = 1;
}else{
  $backto = "location: ../register.php?nameOf=".$name."&email=".$email."&r=rolecorrect";
}

if($pwdr != $pwd ){
  $backto = "location: ../register?nameOf=".$name."&email=".$email."&r=pwdsame";
}

if(isset($backto)){
  header($backto);
  die();
}

include 'db-connect.php';

$pwd = password_hash($pwd, PASSWORD_DEFAULT);
$conn->prepare("INSERT INTO `users`(`name`, `pwd`, `email`, `role`) VALUES (? ,? ,? ,?  )")->execute([$name, $pwd, $email, $role]);
$conn=null;

$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
$_SESSION['role'] = $role;
$_SESSION['auth'] = false;

header("location: /school.php");
die();
