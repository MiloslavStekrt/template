<?php
  session_start();
  $title = "BMS - My School";
  if($_SESSION['role'] <= 0 || empty($_SESSION['role']) || $_SESSION['role'] == ""){
    header("location: /");
    die();
  }
  include_once 'clear/header.php';
  include_once 'include/db-connect.php';
  if($_SESSION['role'] == 1){
    // is student setup schedule
    $myclasses_by_user = $conn->query("SELECT `id_class` FROM `class_student` WHERE `id_user`=".$_SESSION['id'])->fetchAll();
    $myclasses = [];
    foreach($myclasses_by_user as $myclass_by_user){
      $myclasses[] = $conn->query("SELECT * FROM `classes` WHERE `id_class`=".$myclass_by_user['id_class'])->fetch(FETCH_ASSOC);
    }
    $myclasses_by_user = null;
  }elseif ($_SESSION['role'] >= 2) {
    // if user is teacher them
    $myclasses = $conn->query("SELECT * FROM `classes` WHERE `teacher`=".$_SESSION['id'])->fetchAll();
  }
  $timer = [];
  foreach ($myclasses as $myclass) {
    //destroy to days and destroy to lessons
    $time = $myclass['time'];
    if(strpos($time, '.') !== false){
      $items = explode('.', str_replace(' ', '', $time));
    }else{
      $items = [$items];
    }
    $ans = [];
    foreach($items as $item){
      $ans[] = explode('-', $item);
    }
    foreach ($ans as $answer) {
      $timer[] = [
        'id_class' => $myclass['id'],
        'name' => $myclass['name'],
        'day' => mb_strtolower($answer[0]),
        'time' => (int)$answer[1],
      ];
    }
  }
  $schedule_days = [
    ["name" => "monday", "color" => "mo"],
    ["name" => "tuesday", "color" => "tu"],
    ["name" => "wensday", "color" => "we"],
    ["name" => "thursday", "color" => "th"],
    ["name" => "frieday", "color" => "fr"],
  ];
  $max_lessons = 8;
  $conn = null;
?>

<main>
  <section class="details">
    <h1>Ratanda serios corporation</h1>
    <span>
      <p> </p>
      <p class="allClasses">All classes</p>
    </span>
  </section>
  <section class="schedule">
    <h2>Schedule</h2>
    <div class="flexer">
      <article class="days">
        <?php foreach ($schedule_days as $schedule_day): ?>
          <p class="<?php echo $schedule_day['color'] ?>"><strong><?php echo ucfirst($schedule_day['name']) ?></strong> </p>
        <?php endforeach; ?>
      </article>
      <article class="schedule-time" id="schedule-time">
        <table>
          <tr>
            <?php for ($i=1; $i < $max_lessons+1; $i++) {
              echo '<th>'.$i.'</th>';
            } ?>
          </tr>
          <?php

            //pro kazdy den v poly skolni dny
            foreach ($schedule_days as $schedule_day) {
              echo "<tr class='".$schedule_day['color']."'>";

              //pro kazdou hodinu v tydnu
              for ($i=1; $i < $max_lessons+1; $i++) {
                $there_is_nothing = true;
                foreach ($timer as $timer_one) {
                  if($schedule_day['color'] == $timer_one['day'] && $timer_one['time'] == $i){
                    echo "<td>".$timer_one['name']."</td>";
                    $there_is_nothing = false;
                  }
                }
                if($there_is_nothing){
                  echo "<td></td>";
                }
              }
              echo "</tr>";
            }
          ?>
        </table>
      </article>
    </div>
  </section>
  <section class="activities">
    <article class="exams">
      <h1>Exams</h1>
      <p>St - <a href="#"><strong>CJ</strong> </a> - Opakovani</p>
      <p>next Pa - <a href="#"><strong>CJ</strong> </a> - oprava Opakovani</p>
    </article>
    <article class="homeworks">
      <h1>Homeworks</h1>
      <p>Ut - <a href="#"><strong>CJ</strong> </a> - 192/13 c</p>
      <p>Ct - <a href="#"><strong>M</strong> </a> - 28/31 ucebnice</p>
    </article>
  </section>
</main>
<!-- <script type="text/javascript">
  const app = {
    data() {
      return {
        <?php
        // foreach ($myclasses as $myclass) {
        //   echo `{time: `.$myclass['time'].`, name: `.$myclass['name'].`},`;
        // }
        ?>
      }
    }
  }
  Vue.createApp(app).mount('#schedule-time')
</script> -->

<?php include_once 'clear/footer.php';?>
</body>
</html>
