<?php
if($_SERVER['REQUEST_METHOD'] == 'post'){
  header("location: /");
  die();
}
if(!isset($_SESSION['name']) && empty($user)){
  header("location: /login.php");
  die();
}
