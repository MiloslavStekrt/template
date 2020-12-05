<?php
session_start();
if(!isset($_POST['button'])){
  header("location: /admin/");
  die();
}

include_once 'db-connect.php';

$role = $_POST['role'];

if($role == "principal"){
  $role = 3;
}

if(isset($_POST['id'])){
  if(isset($_POST['pwd'])){
    $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
    $conn->prepare("UPDATE `users` SET `name` = ?,`pwd` = ?, `email` = ?, `role` = ? WHERE `users`.`id` = ?")->execute([$_POST['name'], $pwd, $_POST['email'], $role, $id]);
  }else{
    $conn->prepare("UPDATE `users` SET `name` = ?, `email` = ?, `role` = ? WHERE `users`.`id` = ?")->execute([$_POST['name'], $_POST['email'], $role, $id]);
  }
}else{
  include_once 'newuser.php';
  register($_POST['name'], $_POST['pwd'], $_POST['pwd'], $role, $_POST['email'], "/admin", $conn);
}

header("location: /admin");
die();
