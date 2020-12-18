<?php
  $script_name = basename($_SERVER['SCRIPT_NAME'], ".php");
  if(!isset($stylefile)){
    $stylefile = "css/".$script_name.".css";
  }
  // $logolink = "BEAM MS";
  $logolink = mb_strtoupper("Leviathan dev.");
  $linkLocation = "/";
  if(!isset($_SESSION)){
    session_start();
  }
  $navteacher = [
    ['name' => 'My School', 'link' => 'school'],
    ['name' => 'Homeworks', 'link' => 'homeworks'],
    ['name' => 'Exams', 'link' => 'exams'],
    ['name' => 'E-learning', 'link' => 'elerning'],
  ];
  $navstudent = [
    ['name' => 'My School', 'link' => 'school'],
    ['name' => 'My Marks', 'link' => 'homeworks'],
    ['name' => 'E-learning', 'link' => 'elerning'],
  ];
  $someAnonymous = [
    ['name' => 'Login', 'link' => 'login'],
    ['name' => 'Register', 'link' => 'register'],
  ]
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
          if ($_SESSION['role'] >= 2){
            $navlinks = $navteacher;
          }elseif($_SESSION['role'] == 1){
            $navlinks = $navstudent;
          }else{
            $navlinks = $someAnonymous;
          }
          foreach ($navlinks as $nava){
            if($script_name == $nava['link']){
              echo '<a class="onpage" href="'.$nava['link'].'.php">'.$nava['name'].'</a>';
            }else{
              echo '<a class="" href="'.$nava['link'].'.php">'.$nava['name'].'</a>';
            }
          }
          if(isset($_SESSION['role']) != ""){
            if($_SESSION['role'] == 3){
              echo '<a href="/admin">admin</a>';
            }else{
              echo '<a href="">R</a>';
            }
            echo '<a href="include/logout.php">Left</a>';
          }
         ?>
      </nav>
    </header>
    <hr>
