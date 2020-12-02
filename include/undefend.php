<?php
if(isset($_SESSION['name'])){
  header("location: school.php");
  die();
}
