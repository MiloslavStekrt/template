<?php

// <input type="text" name="title" placeholder="Name your homework">
// <input type="text" name="question" placeholder="Question">
// <input type="text" name="corect" placeholder="Correct Answer">
// <input type="date" name="date">
// <input type="time" name="time">

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
  $datetime
];

include_once 'db-connect.php';
$conn->prepare("INSERT INTO `homeworks`(`time`, `name`, `question`, `correct_answer`) VALUES (?, ?, ?, ?)")->execute([$data[3], $data[0], $data[1], $data[2]]);
$conn = null;

header("location: /homeworks.php");
die();
