<?php
if(isset($_POST['con']) && $_POST['iuser'] == "admin" && $_POST['icode'] == "root"){
  header("location: /admin/teacher.php");
  die();
}
header("location: /admin");
die();
