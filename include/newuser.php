<?php
session_start();
if(!isset($_POST['button'])){
  header("location: /");
  die();
}

function register($name, $pwd, $pwdr, $role, $email, $last, $conn){
  if(!isset($conn)){
    include_once 'db-connect.php';
  }
    if(empty($name) || empty($pwd) || empty($pwdr) || empty($role) || empty($email)){
    $backto = "nameOf=".$name."&email=".$email."&r=empty";
  }

  if(empty($pwdr)){
    if($pwdr != $pwd ){
      $backto = "nameOf=".$name."&email=".$email."&r=pwdsame";
    }
  }

  if($role == "teacher"){
    $role = 2;
  }elseif($role == "student"){
    $role = 1;
  }elseif($role == 3){
    $role = 3;
  }else{
    $backto = "nameOf=".$name."&email=".$email."&r=rolecorrect";
  }

  if(isset($backto)){
    header("location: ../".$last."?".$backto);
    die();
  }
  $pwd = password_hash($pwd, PASSWORD_DEFAULT);
  $conn->prepare("INSERT INTO `users`(`name`, `pwd`, `email`, `role`) VALUES (? ,? ,? ,?  )")->execute([$name, $pwd, $email, $role]);
  $conn = null;
}
