<?php
session_start();
if(!isset($_POST['button'])){
  header("location: /admin/");
  die();
}

$name = $_POST['nameOf'];
$pwd = $_POST['pwd'];
$pwdr = $_POST['pwd-r'];
$role = $_POST['role'];
$email = $_POST['email'];

include_once 'newuser.php';
register($name, $pwd, $pwdr, $role, $email, "register.php", $conn);

header("location: /login.php");
die();
