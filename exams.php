<?php
if(!$_SESSION['teacher']){
  header('location: school.php');
  die();
}
$teacher = true;
$def = true;
include_once 'clear/header.php';?>
<main>
  <section class="sidebar">
    <h1>Exams</h1>
    <p><a href="">First Test</a></p>
    <p><a href="">First Test</a></p>
    <p><a href="">First Test</a></p>
    <p><a href="">First Test</a></p>
    <p><a href="">First Test</a></p>
    <p><a href="">First Test</a></p>
  </section>
  <section class="control">
    <article class="avg">
      <span>
        <h1>Test name</h1>
        <a href="">Open testing</a>
        <p>difficulty: normal</p>
      </span>
      <span>
        <h1>AVG - 3.2</h1>
        <p>
          <button type="button" name="button">grade</button>
        </p>
      </span>
    </article>
    <article class="setter">
      <span>
        <h3>name of student</h3>
        <p>mark</p>
      </span>
      <span>
        <p>name student</p>
        <select class="" name="">
          <option value="">N</option>
          <option value="">1</option>
          <option value="">2</option>
          <option value="">3</option>
          <option value="">4</option>
          <option value="">5</option>
        </select>
      </span>
      <span>
        <p>name student</p>
        <select class="" name="">
          <option value="">N</option>
          <option value="">1</option>
          <option value="">2</option>
          <option value="">3</option>
          <option value="">4</option>
          <option value="">5</option>
        </select>
      </span>
      <span>
        <p>name student</p>
        <select class="" name="">
          <option value="">N</option>
          <option value="">1</option>
          <option value="">2</option>
          <option value="">3</option>
          <option value="">4</option>
          <option value="">5</option>
        </select>
      </span>
      <span>
        <p>name student</p>
        <select class="" name="">
          <option value="">N</option>
          <option value="">1</option>
          <option value="">2</option>
          <option value="">3</option>
          <option value="">4</option>
          <option value="">5</option>
        </select>
      </span>
      <span>
        <p>name student</p>
        <select class="" name="">
          <option value="">N</option>
          <option value="">1</option>
          <option value="">2</option>
          <option value="">3</option>
          <option value="">4</option>
          <option value="">5</option>
        </select>
      </span>
      <span>
        <p>name student</p>
        <select class="" name="">
          <option value="">N</option>
          <option value="">1</option>
          <option value="">2</option>
          <option value="">3</option>
          <option value="">4</option>
          <option value="">5</option>
        </select>
      </span>
    </article>
  </section>
</main>
