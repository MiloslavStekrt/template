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
        <p class="mo"><strong>Monday</strong> </p>
        <p class="tu"><strong>Tuesday</strong> </p>
        <p class="we"><strong>Wensday</strong> </p>
      </article>
      <article class="schedule-time">
        <table>
          <tr>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>7</th>
            <th>8</th>
          </tr>
          <tr class="mo">
            <td></td>
            <td>AJ</td>
            <td>AJ</td>
            <td>AJ</td>
            <td>AJ</td>
            <td>AJ</td>
            <td>AJ</td>
          </tr>
          <tr class="tu">
            <td>AJ</td>
            <td>AJ</td>
            <td>AJ</td>
            <td>AJ</td>
            <td>AJ</td>
            <td>AJ</td>
            <td>AJ</td>
          </tr>
          <tr class="we">
            <td>AJ</td>
            <td>AJ</td>
            <td>AJ</td>
            <td>AJ</td>
            <td>AJ</td>
            <td></td>
            <td>AJ</td>
          </tr>
        </table>
      </article>
    </div>
    <!-- <article class="monday">
      <p class="tag">Monday</p>
      <p>M</p>
      <p>M</p>
      <p>AJ</p>
      <p>CJ</p>
      <p>AJ</p>
      <p>CJ</p>
      <p>L</p>
      <p> </p>
    </article>
    <article class="tuesday">
      <p class="tag">Tuesday</p>
      <p>M</p>
      <p>M</p>
      <p>AJ</p>
      <p>CJ</p>
      <p> </p>
      <p>L</p>
      <p>AJ</p>
      <p>CJ</p>
    </article>
    <article class="wensday">
      <p class="tag">Wensday</p>
      <p>M</p>
      <p>M</p>
      <p>AJ</p>
      <p> </p>
      <p>CJ</p>
      <p>AJ</p>
      <p>CJ</p>
      <p>L</p>
    </article>
    <article class="lessons">
      <h3>Monday</h3>
      <p>M</p>
      <p>M</p>
      <p>AJ</p>
      <p>CJ</p>
      <p>L</p>
      <p> </p>
    </article>
    <article class="lessons">
      <h3>Tuesday</h3>
      <p>M</p>
      <p>M</p>
      <p>AJ</p>
      <p>CJ</p>
      <p>L</p>
      <p> </p>
    </article>
    <article class="lessons">
      <h3>Wenday</h3>
      <p>M</p>
      <p>M</p>
      <p>AJ</p>
      <p>CJ</p>
      <p>L</p>
      <p> </p>
    </article> -->
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

<?php include_once 'clear/footer.php';?>
</body>
</html>
