<?php
  // teacher defend
  if(!$_SESSION['role']=2){
    header('location: school.php');
    die();
  }
  $title = "BMS - Homeworks";
  include_once 'clear/header.php';

  include_once 'include/db-connect.php';
  $user_id = $_SESSION['id'];
  $class_id = $_GET['id'];
  $classes = $conn->query("SELECT * FROM `classes` WHERE `teacher`=".$user_id)->fetchAll();
  if(isset($class_id) || $class_id != ""){
    $homeworks = $conn->query("SELECT * FROM `homeworks` WHERE `id_class`=".$class_id)->fetchAll();
    $students_in = $conn->query("SELECT * FROM `class_student` WHERE `id_class`=".$class_id)->fetchAll();

    if($_GET['home'] != ""){
      $homework_id = $_GET['home'];
      $homeworks_marks = $conn->query("SELECT `id_user`, `mark` FROM `homeworks_user` WHERE `id_home`=".$homework_id)->fetchAll();
      $students_info = array();
      foreach ($students_in as $student_in) {
        $user = $conn->query("SELECT `id`,`name` FROM `users` WHERE `id`=".$student_in['id_user'])->fetch(PDO::FETCH_ASSOC);
        array_push($students_info, array('id' => $user['id'], 'name' => $user['name']));
      }
      $home = $conn->query("SELECT * FROM `homeworks` WHERE `id`=".$homework_id)->fetch(PDO::FETCH_ASSOC);
    }
  }elseif($classes){
    header("location: homeworks.php?id=".$classes[0]['id']);
    die();
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
    <form action="/include/home_students.php" method="post">
      <article class="avg">
        <span>
          <?php
          if(isset($home) || $home != ""){
            echo '<h1>'.$home['name'].'</h1>';
          }else{
            echo "<h1>TEST name</h1>";
          } ?>
        </span>
        <h1>complete 8/12</h1>
      </article>
      <article class="setter">
        <span>
          <h3>name of student</h3>
          <p>mark <button type="submit" name="button">Grade</button> </p>
        </span>
        <input type="text" name="id_home" value="<?php echo $home['id'] ?>" hidden>
        <?php if ($homework_id): ?>
          <?php foreach ($students_info as $student_info): ?>
            <span>
              <label for="student_id"><?php echo $student_info["name"]; ?></label>
              <input type="text" id="student_id" name="student<?php echo $student_info['id'] ?>" value="<?php echo $student_info['id']; ?>" hidden>
              <select name="student_avg[]">
                <option value="<?php echo $student_info['id'] ?>_N">N</option>
                <option value="<?php echo $student_info['id'] ?>_1">1</option>
                <option value="<?php echo $student_info['id'] ?>_5">5</option>
              </select>
            </span>
          <?php endforeach; ?>
        <?php endif; ?>
      </form>
    </article>
  </section>
</main>
