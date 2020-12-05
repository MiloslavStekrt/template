<?php
session_start();
if(!isset($_POST['button'])){
  header("location: /");
  die();
}
include_once 'db-connect.php';

$name = $_POST['name'];
$time = $_POST['time'];
$teacher = $_POST['teachername'];
$id = $_POST['id'];

if(empty($name) || empty($time) || empty($teacher)){
  header("location: ../admin/lessons.php?teachername=".$teacher."&name=".$name."&time=".$time."&r=empty");
  die();
}elseif(isset($id)){
  $conn->prepare("UPDATE `classes` SET `name`=?,`teacher`=?,`time`=? WHERE `id`=?")->execute([$name, $teacher, $time, $id]);
}else{
  $conn->prepare("INSERT INTO `classes`(`name`, `teacher`, `time`) VALUES (?, ?, ?)")
        ->execute([$name, $teacher, $time]);
}

$conn = null;

header("location: /admin/lessons.php");
die();
