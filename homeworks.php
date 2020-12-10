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

    if(isset($_GET['home']) || $_GET['home'] != ""){
      $homework = $_GET['home'];
      $home_marks = $conn->query("SELECT `id_user`, `mark` FROM `homeworks_user` WHERE `id_home`=".$homework)->fetchAll();
      $students_names = [];
      foreach ($students_in as $student_in) {
        $stmt = $conn->query("SELECT `id`,`name` FROM `users` WHERE `id`=".$student_in['id_user'])->fetch(PDO::FETCH_ASSOC);
        $students_names[] = ['id' => $stmt['id'], 'name' => $stmt['name']];
      }
      $home = $conn->query("SELECT * FROM `homeworks` WHERE `id`=".$homework)->fetch(PDO::FETCH_ASSOC);
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
        <?php if ($homeworks): ?>
          <?php foreach ($students_names as $student_name): ?>
            <span>
              <label for="student_id"><?php echo $student_name["name"]; ?></label>
              <input type="text" id="student_id" name="student<?php echo $student_name['id'] ?>" value="<?php echo $student_name['id']; ?>" hidden>
              <div class="">
                  <select name="student_avg[]">
                    <?php if( (int)$home_mark['mark'] == 0 && $home_mark['id_user'] == $student_name['id']): ?>
                      <option value="<?php echo $student_name['id'] ?>_0" selected>N</option>
                      <option value="<?php echo $student_name['id'] ?>_1">1</option>
                      <option value="<?php echo $student_name['id'] ?>_5">5</option>
                    <?php elseif( (int)$home_mark['mark'] == 1 && $home_mark['id_user'] == $student_name['id']): ?>
                      <option value="<?php echo $student_name['id'] ?>_0">N</option>
                      <option value="<?php echo $student_name['id'] ?>_1" selected>1</option>
                      <option value="<?php echo $student_name['id'] ?>_5">5</option>
                      <!-- ( (int)$home_mark['mark'] == 5 && $home_mark['id_user'] == $student_name['id']): -->
                    <?php else: ?>
                      <option value="<?php echo $student_name['id'] ?>_0">N</option>
                      <option value="<?php echo $student_name['id'] ?>_1">1</option>
                      <option value="<?php echo $student_name['id'] ?>_5" selected>5</option>
                    <?php endif; ?>

                  <!-- 
                    <option value="<?php echo $student_name['id'] ?>_0">N</option>
                    <option value="<?php echo $student_name['id'] ?>_1">1</option>
                    <option value="<?php echo $student_name['id'] ?>_5">5</option> -->
                  </select>
                <!-- <?php echo "student: ".$student_name['id']." mark_user: ".$home_marks['id_user'] ?> -->
                <a href="" target="_blank">Open</a>
              </div>
            </span>
          <?php endforeach; ?>
        <?php endif; ?>
      </form>
    </article>
  </section>
</main>
