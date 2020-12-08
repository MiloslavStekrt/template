<?php
  // teacher defend
  if(!$_SESSION['role']=2){
    header('location: school.php');
    die();
  }
  $title = "BMS - Homeworks";
  include_once 'clear/header.php';

  include_once 'include/db-connect.php';
  $stmt = $conn->prepare("SELECT * FROM `classes` WHERE `teacher`=?")->execute([$_SESSION['id']]);
  if($data == true){
    $data = $stmt->fetchAll();
  }else {
    $data = ['name'=>'none'];
  }
  $stmt = null;
  $conn = null;

?>
<main>
  <section class="sidebar">
    <select class="" name="">
      <?php foreach ($data as $dat): ?>
        <a href="homeworks.php?class=<?php echo $dat['name'] ?>"></a>
      <?php endforeach; ?>
    </select>
    <h1>Homeworks</h1>
    <p><?php echo $_SESSION['id'] ?></p>
    <p><a href="">Ut - 192/12 c ucebnice</a></p>
    <p><a href="">Ut - 192/12 c ucebnice</a></p>
    <p><a href="">Ut - 192/12 c ucebnice</a></p>
    <p><a href="new_homework.php">new Homework</a></p>
  </section>
  <section class="control">
    <article class="avg">
      <span>
        <h1>Homework title</h1>
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
