<?php 
if(!isset($_SESSION['name']) && empty($user)){
  header("location: /login.php");
  die();
}
