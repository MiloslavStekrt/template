<?php
session_start();
if(!isset($_POST['button'])){
  header("location: /admin/");
  die();
}

$role = $_POST['role'];

if($role == "principal"){
  $role = 3;
}

include_once 'newuser.php';

register($_POST['name'], $_POST['pwd'], $_POST['pwd'], $role, $_POST['email'], "/amdin");

header("location: /admin");
die();
