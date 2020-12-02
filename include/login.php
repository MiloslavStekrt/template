<?php
session_start();
$user = true;
include_once 'defend.php';

$_SESSION['name'] = $_POST['nameOf'];
$_SESSION['teacher'] = false;
$_SESSION['student'] = !$_SESSION['teacher'];

header("location: /school.php");
die();
