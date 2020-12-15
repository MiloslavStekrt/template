<?php
  $script_name = basename($_SERVER['SCRIPT_NAME'], ".php");
  if(!isset($stylefile)){
    $stylefile = "css/".$script_name.".css";
  }
  // $logolink = "BEAM MS";
  $logolink = mb_strtoupper("Leviathan dev.");
  $linkLocation = "/";
  session_start();
  $navteacher = [
    ['name' => 'My School', 'link' => 'school'],
    ['name' => 'Homeworks', 'link' => 'homeworks'],
    ['name' => 'Exams', 'link' => 'exams'],
    ['name' => 'E-learning', 'link' => 'elerning'],
  ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <script src="/js/vue3.js" charset="utf-8"></script>
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href=<?php echo $stylefile ?>>
</head>
<body>
  <header>
        <!-- <img src="" alt="logo"> -->
        <a href="<?php echo $linkLocation ?>"><h1><?php echo $logolink ?></h1></a>
        <nav>
          <?php
          if ($_SESSION['role'] >= 2):
            foreach ($navteacher as $nava){
              if($script_name == $nava['link']){
                echo '<a class="onpage" href="'.$nava['link'].'.php">'.$nava['name'].'</a>';
              }else{
                echo '<a class="" href="'.$nava['link'].'.php">'.$nava['name'].'</a>';
              }
            }
            if($_SESSION['role'] == 3){
              echo '<a href="/admin">admin</a>';
            }else{
              echo '<a href="">R</a>';
            }
           ?>
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
