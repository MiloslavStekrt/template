<?php
session_start();

if ($_SESSION['role'] < 1 || !empty($_SESSION)) {
  header("location: /");
  die();
}
