<?php
if($_SESSION['student']){
  header('location: exams.php');
  die();
}
$def = true;
$title = "BMS - My Marks";
include_once 'clear/header.php';?>

<main>
  <section class="sidebar">
    <h1>Classes</h1>
    <p><a href="">Cesky jazyk</a></p>
    <p><a href="">Matika</a></p>
  </section>
  <section class="statistic">
    <article class="student">
      <h1>Subject</h1><h1>3.54</h1>
    </article>
    <article class="exams">
      <span class="first-span">
        <p>Name of exam</p>
        <p>mark</p>
      </span>
      <span>
        <p>Po - Fast test</p>
        <p>3</p>
      </span>
      <span>
        <p>Po - Fast test</p>
        <p>3</p>
      </span>
      <span class="last-span">
        <p>Po - Fast test</p>
        <p>3</p>
      </span>
    </article>
  </sexction>
</main>
</body>
</html>
