<?php
if(!isset($stylefile)){
  $stylefile = "css/".basename($_SERVER['SCRIPT_NAME'], ".php").".css";
}
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <script src="../js/vue-3.js" charset="utf-8"></script>
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href=<?php echo $stylefile ?>>
</head>
<body>
  <header>
        <!-- <img src="" alt="logo"> -->
        <a href="/"><h1>BEAM MS</h1></a>
        <nav>
          <?php if ($_SESSION['role'] >= 2): ?>
            <a href="/school.php">My School</a>
            <a href="/homeworks.php">Homeworks</a>
            <a href="/exams.php">Exams</a>
            <a href="/elerning.php">Elearning</a>
            <?php
            if($_SESSION['role'] == 3){
              echo '<a href="/admin">admin</a>';
            }else{
              echo '<a href="">R</a>';
            } ?>
            <a href="/include/logout.php">left</a>
          <?php elseif($_SESSION['role'] == 1): ?>
            <a href="/school.php">My School</a>
            <a href="/mark.php">My Marks</a>
            <a href="">Elearning</a>
            <a href="">R</a>
            <a href="/include/logout.php">left</a>
          <?php else: ?>
            <a href="/login.php">Login</a><a href="/register.php">Register</a>
          <?php endif; ?>
        </nav>
    </header>
    <hr>
