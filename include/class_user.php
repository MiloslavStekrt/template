<?php

if(!isset($_POST['button'])){
  header("location: /admin/lessons.php");
  die();
}
$id_class = $_POST["id_class"];
$list_user[] = $_POST["list_user[]"];
include_once 'db-connect.php';
foreach($list_user as $user){
  echo "insert items .... ".$id_class." and ".$user;
  $conn->prepare("INSERT INTO `class_student`(`id_class`, `id_user`) VALUES (?, ?)")->execute([$id_class, $user]);
}
// header("location: /admin/lessons.php?id=".$id_class);
// die();
