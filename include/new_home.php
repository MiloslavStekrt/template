<?php
if(!isset($_POST['button'])){
  header("location: /");
  die();
}
$datetime = $_POST['date'].$_POST['time'];

$datetime = date("Y-m-d h:i:s", strtotime($datetime));

$data = [
  $_POST['title'],
  $_POST['question'],
  $_POST['corect'],
  $datetime,
  $_POST['id'],
];
foreach ($data as $dat) {
  if(empty($dat) || !isset($dat) || $dat != ""){
    header("location: /homeworks.php?id=".$data[4]);
    die();
  }
}
include_once 'db-connect.php';
$conn->prepare("INSERT INTO `homeworks`(`time`, `name`, `question`, `correct_answer`, `id_class`) VALUES (?, ?, ?, ?, ?)")->execute([$data[3], $data[0], $data[1], $data[2], $date[4]]);
$conn = null;

header("location: /homeworks.php");
die();
