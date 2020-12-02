<?php
$stylefile = "css/".basename($_SERVER['SCRIPT_NAME'], ".php").".css";
session_start();
if($def){
  include_once 'include/defend.php';
}else if(!$def){
  include_once 'include/undefend.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href=<?php echo $stylefile ?>>
</head>
<body>
  <header>
        <!-- <img src="" alt="logo"> -->
        <a href="/"><h1>BEAM MS</h1></a>
        <!-- navigace -> My School, My marks, Elearn -->
        <!-- My School - view school statistic and your joined classes -->
        <!-- My marks - view your marks and statistic -->
        <!-- Elarning - uploaded file that is sheared with student and teacher in one or more classes -->
        <!-- ring - new activity, ... etc. -->
        <nav>
            <?php
              if($_SESSION['teacher']){
                echo '<a href="/school.php">My School</a>';
                echo '<a href="/homeworks.php">Homeworks</a>';
                echo '<a href="/exams.php">Exams</a>';
                echo '<a href="">Elearning</a>';
                echo '<a href="">R</a>';
                echo '<a href="include/unlogin.php">left</a>';
              }else if($_SESSION['student']){
                echo '<a href="/school.php">My School</a>';
                echo '<a href="/mark.php">My Marks</a>';
                echo '<a href="">Elearning</a>';
                echo '<a href="">R</a>';
              }else{
                echo '<a href="login.php">Login</a>';
                echo '<a href="register.php">Register</a>';

              }
            ?>
        </nav>
    </header>
    <hr>
