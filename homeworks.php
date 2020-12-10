<?php
  // teacher defend
  if(!$_SESSION['role']=2){
    header('location: school.php');
    die();
  }
  $title = "BMS - Homeworks";
  include_once 'clear/header.php';

  include_once 'include/db-connect.php';
  $classes = $conn->query("SELECT * FROM `classes` WHERE `teacher`=".$_SESSION['id'].";")->fetchAll();
  if(isset($_GET['id']) || $_GET['id'] != ""){
    $homeworks = $conn->query("SELECT * FROM `homeworks` WHERE `id_class`=".$_GET['id']."")->fetchAll();
    if(isset($_GET['home']) || $_GET['home'] != ""){
      // get homework where $_GET['home'] = id
      $home = $conn->query("SELECT * FROM `homeworks` WHERE `id`=".$_GET['home'])->fetch(PDO::FETCH_ASSOC);
    }
  }
  $conn = null;

?>
<main>
  <section class="sidebar">
    <select class="" name="">
      <?php foreach ($classes as $class){
        echo '<option onclick="window.location.href=`homeworks.php?id='.$class['id'].'`">'.$class['name'].'</option>';
      } ?>
    </select>
    <h1>Homeworks</h1>
    <?php foreach ($homeworks as $homework){
      $date = date("d.m", strtotime($homework['time']));

      echo '<p><a href="homeworks.php?'.$_SERVER['QUERY_STRING'].'&home='.$homework['id'].'">'.$date.' - '.$homework['name'].'</a> </p>';
    } ?>
    <p><a href="new_homework.php">new Homework</a></p>
  </section>
  <section class="control">
    <article class="avg">
      <span>
        <h1><?php echo $home['name']; ?></h1>
      </span>
      <h1>complete 8/12</h1>
    </article>
    <article class="setter">
      <span>
        <h3>name of student</h3>
        <p>mark</p>
      </span>
      <span>
        <p>name student</p>
        <div class="">
          <select class="" name="">
            <option value="">N</option>
            <option value="">1</option>
            <option value="">5</option>
          </select>
          <a href="" target="_blank">Open</a>
        </div>
      </span>
      <span>
        <p>name student</p>
        <div class="">
          <select class="" name="">
            <option value="">N</option>
            <option value="">1</option>
            <option value="">5</option>
          </select>
          <a href="" target="_blank">Open</a>
        </div>
      </span>
      <span>
        <p>name student</p>
        <div class="">
          <select class="" name="">
            <option value="">N</option>
            <option value="">1</option>
            <option value="">5</option>
          </select>
          <a href="" target="_blank">Open</a>
        </div>
      </span>
      <span>
        <p>name student</p>
        <div class="">
          <select class="" name="">
            <option value="">N</option>
            <option value="">1</option>
            <option value="">5</option>
          </select>
          <a href="" target="_blank">Open</a>
        </div>
      </span>
      <span>
        <p>name student</p>
        <div class="">
          <select class="" name="">
            <option value="">N</option>
            <option value="">1</option>
            <option value="">5</option>
          </select>
          <a href="" target="_blank">Open</a>
        </div>
      </span>
      <span>
        <p>name student</p>
        <div class="">
          <select class="" name="">
            <option value="">N</option>
            <option value="">1</option>
            <option value="">5</option>
          </select>
          <a href="" target="_blank">Open</a>
        </div>
      </span>
      <span>
        <p>name student</p>
        <div class="">
          <select class="" name="">
            <option value="">N</option>
            <option value="">1</option>
            <option value="">5</option>
          </select>
          <a href="" target="_blank">Open</a>
        </div>
      </span>
      <span>
        <p>name student</p>
        <div class="">
          <select class="" name="">
            <option value="">N</option>
            <option value="">1</option>
            <option value="">5</option>
          </select>
          <a href="" target="_blank">Open</a>
        </div>
      </span>
      <span>
        <p>name student</p>
        <div class="">
          <select class="" name="">
            <option value="">N</option>
            <option value="">1</option>
            <option value="">5</option>
          </select>
          <a href="" target="_blank">Open</a>
        </div>
      </span>
      <span>
        <p>name student</p>
        <div class="">
          <select class="" name="">
            <option value="">N</option>
            <option value="">1</option>
            <option value="">5</option>
          </select>
          <a href="" target="_blank">Open</a>
        </div>
      </span>
    </article>
  </section>
</main>
