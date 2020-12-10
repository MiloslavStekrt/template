<?php
$id_class = $_POST["id_home"];
$student_avg = $_POST["student_avg"];

if(!isset($_POST['button'])){
  header("location: ../homeworks.php");
  die();
}

include_once 'db-connect.php';

// $conn->prepare("DELETE FROM `class_student` WHERE `id_class`=?")->execute([$id_class]);

foreach($student_avg as $student_mark){
  $student_info = explode('_', $student_mark);
  $conn->prepare("DELETE FROM `homeworks_user` WHERE `id_home`=? AND `id_user`=?")->execute([ $id_class, $student_info[0] ]);
  if((int)$student_mark[1] > 1){
    $stmt = $conn->prepare("UPDATE `homeworks_user` SET `mark`=? WHERE `id_home`=? AND `id_user`=?")->execute([ (int)$student_info[1], $id_class, $student_info[0] ]);
    if($stmt){
      $conn->prepare("INSERT INTO `homeworks_user`(`id_home`, `id_user`, `mark`) VALUES (?, ?, ?)")->execute([ $id_class, $student_info[0], (int)$student_info[1] ]);
    }
  }
}

// foreach($list_user as $user){
//   echo "insert items .... ".$id_class." and ".$user;
//   $conn->prepare("INSERT INTO `class_student`(`id_class`, `id_user`) VALUES (?, ?)")->execute([$id_class, $user]);
// }
header("location: ../homeworks.php");
die();
